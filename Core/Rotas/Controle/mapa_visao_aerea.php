<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.51.0/mapbox-gl.js'></script>
<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.51.0/mapbox-gl.css' rel='stylesheet' />
<style>
    #map {
        width: 100%;
        height: 100%;
        border-radius: 10px;
    }
    .m-wrapper{
        padding: 10px!important;
    }
</style>

<div id='map' class='contain'></div>

<script>
    $(document).ready(function () {
        var meuLocal = [-49.2888624, -25.4533106];
        mapboxgl.accessToken = 'pk.eyJ1IjoiY3VsdHVyYWRvY2FtcG8iLCJhIjoiY2pwcGs2aG9lMDMyNjQyb2FjODQ2eWZpZCJ9.JQ-68S-fzbaFlKTXMgLEJQ';
        // Initialize a map
        var map = new mapboxgl.Map({
            container: 'map', // container id
            style: 'mapbox://styles/culturadocampo/cjppxm4xb3vzk2souxq1e5peu', // Scenic
            center: meuLocal, // starting position
            zoom: 12 // starting zoom
        });

        map.on('load', function () {
//            var marker = document.createElement('div');
//            marker.classList = 'truck';

            // Create a circle layer
            map.addLayer({
                id: 'warehouse',
                type: 'circle',
                source: {
                    data: turf.featureCollection([turf.point(meuLocal)]),
                    type: 'geojson'
                },
                paint: {
                    'circle-radius': 10,
                    'circle-color': 'white',
                    'circle-stroke-color': '#4885ed',
                    'circle-stroke-width': 3
                }
            });

// Create a symbol layer on top of circle layer
//            map.addLayer({
//                id: 'warehouse-symbol',
//                type: 'symbol',
//                source: {
//                    data: turf.featureCollection([turf.point(meuLocal)]),
//                    type: 'geojson'
//                },
////                layout: {
////                    'icon-image': 'fas fa-user',
////                    'icon-size': 1
////                },
//                paint: {
//                    'text-color': '#3887be'
//                }
//            });


        });



        $(".mapboxgl-ctrl").remove();
    });
</script>