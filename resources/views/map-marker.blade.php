<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Map</title>
    <style>
        #map {
            height: 400px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div id="map"></div>

<div class="border">
    @foreach($markers as $marker)
        <h2> <span class="text-danger">Marker Title-</span> {{ $marker->title }}</h2>
        <span>Latidude {{ $marker->latitude }}</span>
        <span>Longitude {{ $marker->longitude }}</span>

    @endforeach
</div>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBU_fUP64qjD4PCIW98-tKkVAkbYLj30pc&callback=initMap" async defer></script>
<script>

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 40.409264, lng: 49.867092},
            zoom: 12
        });

        var markers = @json($markers);

        markers.forEach(marker => {
            new google.maps.Marker({
                position: {lat: Number(marker.latitude), lng: Number(marker.longitude)},
                map: map,
                title: marker.title,
            });
        });
    }
</script>
</body>
</html>
