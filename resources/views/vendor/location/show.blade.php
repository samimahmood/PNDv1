
<style>
    #map-canvas{
        height: 300px;
        width: 500px;
        margin: 0 auto;
    }
</style>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" >

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBBysyURjTF7KVkElNF8e_ZVKW1oQ65Tq8&libraries=places"
        async defer></script>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>



<div class="container">
    <h1>Name: {{$location->name}}</h1>
    <h2>Vendor: {{$location->user->name}}</h2>
    <div id="map-canvas">

    </div>
</div>


<script>

    var lat = {{$location->lat}};
    var lng = {{$location->lng}};


    var map = new google.maps.Map(document.getElementById('map-canvas'), {
        center: {lat:lat , lng:lng},
        zoom: 18
    });

    var marker = new google.maps.Marker({
        position: {lat:lat , lng:lng},
        map: map
    });
</script>

