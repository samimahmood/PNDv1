
$(document).ready(function () {

    //var myLatLng = {lat: 31.5204, lng: 74.3587};
    var myLatLng = new google.maps.LatLng( 31.2551 , 74.2143);


    var map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        zoom: 14
    });

    function createMarker(latlng , icn , name) {

        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            icon:icn,
            title: name
        });
    }

    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: 'Hello World!',
        draggable: true
    });

    var request = {
        location: myLatLng,
        radius: '1500'
        // type: ['restaurant' , 'shopping_mall' , 'supermarket']
    };

    var icon = {
        url: 'http://www.mainstreetcorinth.com/wp-content/uploads/2012/06/DINING-MARKER-01-150x150.png', // url
        scaledSize: new google.maps.Size(50, 50), // scaled size
        origin: new google.maps.Point(0,0), // origin
        anchor: new google.maps.Point(0, 0) // anchor
    };

    var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));

    google.maps.event.addListener(searchBox, 'places_changed' ,function () {


        var places = searchBox.getPlaces();
        var bounds = new google.maps.LatLngBounds();
        var i , place ;

        for (i=0; place = places[i]; i++)
        {
            bounds.extend(place.geometry.location);
            marker.setPosition(place.geometry.location);
        }

        map.fitBounds(bounds);
        map.setZoom(17);

    });

    google.maps.event.addListener(marker, 'position_changed',  function () {

        var lat = marker.getPosition().lat();
        var lng = marker.getPosition().lng();

        $('#lat').val(lat);
        $('#lng').val(lng);



    });


    service = new google.maps.places.PlacesService(map);
    service.nearbySearch(request, callback);

    function callback(results, status) {

        if (status == google.maps.places.PlacesServiceStatus.OK) {
            for (var i = 0; i < results.length; i++) {
                var place = results[i];
                latlng = place.geometry.location;
                icn= icon;
                name = place.name;
                createMarker(latlng , icn ,  name);
            }
        }

    }
});

