$(function () {



    var RequestAddress = document.getElementById("RequestAddress");
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showLocation, showError,
            {
                enableHighAccuracy: true,
                timeout: 10000 // 10s
                //maximumAge : 0
            }
        );
    }

    function showLocation(position) {
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;
        $("input[name=latitude]").val(latitude);
        $("input[name=longitude]").val(longitude);
        getAddress(latitude, longitude);

        $("#geocomplete").geocomplete({
            map: ".map_canvas",
            details: "form ",
            location: [latitude, longitude]
            // location: [latLng.lat, latLng.ln]

        });

        $("#geocomplete").bind("geocode:click", function (event, latLng) {
            $("input[name=latitude]").val(latLng.latitude());
            $("input[name=longitude]").val(latLng.longitude());
            $("input[name=RequestAddress]").geocomplete("find", latLng.latitude() + "," + latLng.longitude()).val();
            $(this).geocomplete('marker')
                .setOptions({position:latLng,map:$(this).geocomplete("map")});
            $("#latitude,#longitude").show();
        });
    }
    function showError(error) {
        var x = document.getElementById("alert");

        switch (error.code) {
            case error.PERMISSION_DENIED:
                x.innerHTML = "User denied the request for Geolocation.";
                break;
            case error.POSITION_UNAVAILABLE:
                x.innerHTML = "Location information is unavailable.";
                break;
            case error.TIMEOUT:
                x.innerHTML = "The request to get user location timed out.";
                break;
            case error.UNKNOWN_ERROR:
                x.innerHTML = "An unknown error occurred.";
                break;
        }
        $(x).show();

        $("#geocomplete").geocomplete({
            map: ".map_canvas",
            details: "form ",
            location: [24.713551699,46.675295699]
        });

        $("#geocomplete").bind("geocode:click", function (event, latLng) {
            $("input[name=latitude]").val(latLng.latitude());
            $("input[name=longitude]").val(latLng.longitude());
            $("input[name=RequestAddress]").geocomplete("find", latLng.latitude() + "," + latLng.longitude()).val();
            $(this).geocomplete('marker')
                .setOptions({position:latLng,map:$(this).geocomplete("map")});
            $("#latitude,#longitude").show();
        });
    }


    function getAddress(myLatitude, myLongitude) {

        var geocoder = new google.maps.Geocoder();							// create a geocoder object
        var location = new google.maps.LatLng(myLatitude, myLongitude);		// turn coordinates into an object

        geocoder.geocode({'latLng': location}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {						// if geocode success
                var ad = results[0].formatted_address;
                $("input[name=RequestAddress]").val(ad);									// write address to field
            } else {
                alert("Geocode failure: " + status);								// alert any other error(s)
                return false;
            }
        });
    }

    $("#reset").click(function () {
        $("#geocomplete").geocomplete("resetMarker");
        $("#reset").hide();
        return false;
    });

});