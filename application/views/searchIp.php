<?php
?>
<div id="map" style="width: 100%;height: 100vh;top: 0;position: absolute;"></div>
<script>
    mapboxgl.accessToken = 'pk.eyJ1Ijoic2NvcnBpbzgzNzAwIiwiYSI6ImNqeXZqejdhZjBvZHEzZHJyZWpvd3RndDIifQ.dQsb3rifyRFjrmd6dbWDSg';

    var map = new mapboxgl.Map({
        container: 'map', // container id
        style: 'mapbox://styles/mapbox/streets-v11', // stylesheet location
        center: [<?php echo $long ;?>, <?php echo $lat ;?>], // starting position [lng, lat]
        zoom: 9 // starting zoom
    });

    function pointOnCircle() {
        return {
            "type": "Point",
            "coordinates": [
                <?php echo $long ;?>,
                <?php echo $lat ;?>
            ]
        };
    }

    map.on('load', function () {
// Add a source and layer displaying a point which will be animated in a circle.
        map.addSource('point', {
            "type": "geojson",
            "data": pointOnCircle()
        });
        map.addLayer({
            "id": "point",
            "source": "point",
            "type": "circle",
            "paint": {
                "circle-radius": 10,
                "circle-color": "#007cbf"
            }
        });
    });


</script>



