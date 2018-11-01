<script src='https://npmcdn.com/@turf/turf/turf.min.js'></script>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.50.0/mapbox-gl.js'></script>
<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.50.0/mapbox-gl.css' rel='stylesheet' />
<style>

    body {
        margin: 0;
        padding: 0;
    }

    #map {
        width: 1800px;
        height: 1800px;
    }

    .truck {
        margin: -10px -10px;
        width: 20px;
        height: 20px;
        border: 2px solid #fff;
        border-radius: 50%;
        background: #3887be;
        pointer-events: none;
    }


</style>

<div id='map' class='contain'></div>


<script>

        var truckLocation = [-50.1468023,-25.1229000];
        var warehouseLocation = [-50.1464611,-25.1247000];
        var lastQueryTime = 0;
        var lastAtRestaurant =0;
        var keepTrack =[];
        var currentSchedule = [];
        var currentRoute = null;
        var pointHopper = {};
       // var pause = false;
        var speedFactor = 50;

        // Add your access token
        mapboxgl.accessToken = 'pk.eyJ1IjoiY3VsdHVyYS1kby1jYW1wbyIsImEiOiJjam50cXllYmswNGppM3FucnloNGo4aGI0In0._AJQpBK97KUVkVeVH56GaQ';

        // Initialize a map
        var map = new mapboxgl.Map({
          container: 'map', // container id
          style: 'mapbox://styles/mapbox/light-v9', // stylesheet location
          center: truckLocation, // starting position
          zoom: 12 // starting zoom
        });

        var warehouse = turf.featureCollection([turf.point(warehouseLocation)]);
        
        // Create an empty GeoJSON feature collection for drop off locations
        var dropoffs = turf.featureCollection([]);

        // Create an empty GeoJSON feature collection, which will be used as the data source for the route before users add any new data
        var nothing = turf.featureCollection([]);

        map.on('load', function() {
          var marker = document.createElement('div');
          marker.classList = 'truck';

          // Create a new marker
          truckMarker = new mapboxgl.Marker(marker)
            .setLngLat(truckLocation)
            .addTo(map);

          // Create a circle layer
//          map.addLayer({
//            id: 'warehouse',
//            type: 'circle',
//            source: {
//              data: warehouse,
//              type: 'geojson'
//            },
//            paint: {
//              'circle-radius': 20,
//              'circle-color': 'white',
//              'circle-stroke-color': '#3887be',
//              'circle-stroke-width': 3
//            }
//          });

          // Create a symbol layer on top of circle layer
          map.addLayer({
            id: 'warehouse-symbol',
            type: 'symbol',
            source: {
              data: warehouse,
              type: 'geojson'
            },
            layout: {
              'icon-image': 'grocery-15',
              'icon-size': 1
            },
            paint: {
              'text-color': '#3887be'
            }
          });

          map.addLayer({
            id: 'dropoffs-symbol',
            type: 'symbol',
            source: {
              data: dropoffs,
              type: 'geojson'
            },
            layout: {
              'icon-allow-overlap': true,
              'icon-ignore-placement': true,
              'icon-image': 'marker-15',
            }
          });

          map.addSource('route', {
            type: 'geojson',
            data: nothing
          });

          map.addLayer({
            id:'routeline-active',
            type:'line',
            source: 'route',
            layout:{
              'line-join': 'round',
              'line-cap': 'round'
            },
            paint:{
              'line-color': '#3887be',
              'line-width': {
                base:1,
                stops:[[12, 3], [22, 12]]
              }
            }
          }, 'waterway-label');

          map.addLayer({
            id: 'routearrows',
            type: 'symbol',
            source: 'route',
            layout: {
              'symbol-placement': 'line',
              'text-field': '▶',
              'text-size': {
                base: 1,
                stops: [[12, 24], [22, 60]]
              },
              'symbol-spacing': {
                base: 1,
                stops: [[12, 30], [22, 160]]
              },
              'text-keep-upright': false
            },
            paint: {
              'text-color': '#3887be',
              'text-halo-color': 'hsl(55, 11%, 96%)',
              'text-halo-width': 3
            }
          }, 'waterway-label');

          // Listen for a click on the map
          map.on('click', function(e) {
            // When the map is clicked, add a new drop off point
            // and update the `dropoffs-symbol` layer
            newDropoff(map.unproject(e.point));
            updateDropoffs(dropoffs);
          });
        });

        function newDropoff(coords) {
        // Store the clicked point as a new GeoJSON feature with
        // two properties: `orderTime` and `key`
        var pt = turf.point(
          [coords.lng, coords.lat],
          {
            orderTime: Date.now(),
            key: Math.random()
          }
        );
        dropoffs.features.push(pt);
        pointHopper[pt.properties.key] = pt;

        // Make a request to the Optimization API
        $.ajax({
          method: 'GET',
          url: assembleQueryURL(),
        }).done(function(data) {
          
          // Create a GeoJSON feature collection
          var routeGeoJSON = turf.featureCollection([turf.feature(data.trips[0].geometry)]);

          // If there is no route provided, reset
          if (!data.trips[0]) {
            routeGeoJSON = nothing;
          } else {
            // Update the `route` source by getting the route source 
            // and setting the data equal to routeGeoJSON
            map.getSource('route')
              .setData(routeGeoJSON);
          }

//          // 
//          if (data.waypoints.length === 12) {
//            window.alert('Maximum number of points reached. Read more at mapbox.com/api-documentation/#optimization.');
//          }
        });
      }

      function updateDropoffs(geojson) {
        map.getSource('dropoffs-symbol')
          .setData(geojson);
      }

      // Here you'll specify all the parameters necessary for requesting a response from the Optimization API
      function assembleQueryURL() {

        // Store the location of the truck in a variable called coordinates
        var coordinates = [truckLocation];
        var distributions = [];
        keepTrack = [truckLocation];

        // Create an array of GeoJSON feature collections for each point
        var restJobs = objectToArray(pointHopper);

        // If there are actually orders from this restaurant
        if (restJobs.length > 0) {

          // Check to see if the request was made after visiting the restaurant
          var needToPickUp = restJobs.filter(function(d, i) {
            return d.properties.orderTime > lastAtRestaurant;
          }).length > 0;

          // If the request was made after picking up from the restaurant,
          // Add the restaurant as an additional stop
          if (needToPickUp) {
            var restaurantIndex = coordinates.length;
            // Add the restaurant as a coordinate
            coordinates.push(warehouseLocation);
            // push the restaurant itself into the array
            keepTrack.push(pointHopper.warehouse);
          }

          restJobs.forEach(function(d, i) {
            // Add dropoff to list
            keepTrack.push(d);
            coordinates.push(d.geometry.coordinates);
            // if order not yet picked up, add a reroute
            if (needToPickUp && d.properties.orderTime > lastAtRestaurant) {
              distributions.push(restaurantIndex + ',' + (coordinates.length - 1));
            }
          });
        }

        // Set the profile to `driving`
        // Coordinates will include the current location of the truck,
        return 'https://api.mapbox.com/optimized-trips/v1/mapbox/driving/' + coordinates.join(';') + '?distributions=' + distributions.join(';') + '&overview=full&steps=true&geometries=geojson&source=first&access_token=' + mapboxgl.accessToken;
      }

      function objectToArray(obj) {
        var keys = Object.keys(obj);
        var routeGeoJSON = keys.map(function(key) {
          return obj[key];
        });
        return routeGeoJSON;
      }

    

</script>