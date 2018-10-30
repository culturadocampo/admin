
  <script src='https://api.mapbox.com/mapbox.js/v3.0.1/mapbox.js'></script>
  <link href='https://api.mapbox.com/mapbox.js/v3.0.1/mapbox.css' rel='stylesheet' />
  <style>

    .map {

      height: 500px;
      width: 500px;
    }
  </style>


<div id='map-leaflet' class='map rounded'> </div>
<script>
L.mapbox.accessToken = 'pk.eyJ1IjoiY3VsdHVyYS1kby1jYW1wbyIsImEiOiJjam50cXllYmswNGppM3FucnloNGo4aGI0In0._AJQpBK97KUVkVeVH56GaQ';
L.mapbox.map('map-leaflet', 'mapbox.streets');
</script>


