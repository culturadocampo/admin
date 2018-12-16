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
        var truckLocation = [-49.2888624, -25.4533106];
        mapboxgl.accessToken = 'pk.eyJ1IjoiY3VsdHVyYWRvY2FtcG8iLCJhIjoiY2pwcGs2aG9lMDMyNjQyb2FjODQ2eWZpZCJ9.JQ-68S-fzbaFlKTXMgLEJQ';
        // Initialize a map
        var map = new mapboxgl.Map({
            container: 'map', // container id
            style: 'mapbox://styles/culturadocampo/cjppxm4xb3vzk2souxq1e5peu', // Scenic
            center: truckLocation, // starting position
            zoom: 10 // starting zoom
        });
        $(".mapboxgl-ctrl").remove();
    });
</script>