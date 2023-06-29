<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Map</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    #map{
       margin-left: 250px;
    }
</style>
<body>
<div class="container">
    <h2>Add Marker</h2>

    <form action="{{route('store')}}" method="post" id="map-form" class="form-control">
        @csrf
        <label for="fname">Title</label><br>
        <input class="form-control" type="text" id="fname" name="title" value="" placeholder="Title"><br><br>
        <label for="lname">Marker</label><br>
        <div  id="map" style="height: 300px; width: 600px;"></div>
        <br>
        <br>
        <input class="form-control" type="text" id="latitude" name="latitude" value="" placeholder="Latitude" >
        <br>
        <br>
        <input class="form-control" type="text" id="longitude" name="longitude" value="" placeholder="Longitude">
        <br><br>
        <input class="btn btn-primary" type="submit" value="Submit">
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 40.712776, lng: -74.005974},
            zoom: 16
        });

        map.addListener('click', function(event) {
            var latitude = event.latLng.lat();
            var longitude = event.latLng.lng();

            $('#latitude').val(latitude);
            $('#longitude').val(longitude);

        });

        $('#map-form').submit(function (e){
            e.preventDefault();

            console.log($(this).attr('action'));
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serializeArray(),
                success: function(response) {
                    console.log(response);
                },
            });
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBU_fUP64qjD4PCIW98-tKkVAkbYLj30pc&callback=initMap" async defer></script>
</body>
</html>
