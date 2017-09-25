
var latitude = document.getElementById("latitude");
var longitude = document.getElementById("longitude");
var info = document.getElementById("info");

var idMap = document.getElementById("idMap");
var provider = document.getElementById("idUser");

var locations = [];
var km = 20;
var Crcl ;
var map;
var mapOptions = {
    zoom: 11,
    center: {
        lat: -30.008775,
        lng: -51.190664
    }
};
var markers = [];
var infoWindow = new google.maps.InfoWindow();

function initialize() {

    if (document.getElementById('map')) {
        serviceMap()
    } else {
        serviceListMap()
    }

}

function serviceListMap() {

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            latitude.value  =  position.coords.latitude ;
            longitude.value  =  position.coords.longitude;

            var options = {
                latitude: latitude.value,
                longitude: longitude.value,
                type: "list"
            };

            $.post("./index.php/servicesMap/closestLocations", options)
                .done(function(data) {
                    add_professional(data);
                });

            //UserLocationAjax();
        });
    } else {
        handleLocationError(false, infoWindow, map.getCenter());

    }

}

function serviceMap() {

    map = new google.maps.Map(document.getElementById('map'), mapOptions);

    var infoWindow = new google.maps.InfoWindow({map: map});

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            latitude.value  =  position.coords.latitude ;
            longitude.value  =  position.coords.longitude;
            info.nodeValue =  position.coords.longitude;

            markerUser = new google.maps.Marker({
                position: pos,
                map: map,
                icon: 'http://maps.google.com/mapfiles/ms/icons/blue.png',
                address: pos,
                title: 'Sua localização'
            });

            map.setCenter(pos);

            DrowCircle(mapOptions, map, pos, km);

            RelatedLocationAjax();
        }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
        });
    } else {
        handleLocationError(false, infoWindow, map.getCenter());

    }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        'Error: Não detectamos a localização.' :
        'Error: Seu browser não suporta esse tipo de funcionalidade.');
}

function DrowCircle(mapOptions, map, pos, km ) {
    var populationOptions = {
        strokeColor: '#0000FF',
        strokeOpacity: 0.5,
        strokeWeight: 2,
        fillColor: '#0000FF',
        fillOpacity: 0.25,
        map: map,
        center: pos,
        radius: Math.sqrt(km*500) * 100
    };

    this.Crcl = new google.maps.Circle(populationOptions);
}

function RelatedLocationAjax() {
    $.ajax({
        type: "POST",
        url: "./servicesMap/closestLocations",
        dataType: "json",
        data:"data="+ '{ "latitude":"'+ latitude.value+'", "longitude": "'+longitude.value+'", "type": "map" }',

        success:function(data) {
            // quando retornar com sucesso o ajax, o mesmo irá adicionar os markers
            add_markers(data);
        }

    });
}

function UserLocationAjax() {
    $.ajax({
        type: "POST",
        url: "./index.php/servicesMap/closestLocations",
        dataType: "json",
        data:"data="+ '{ "latitude":"'+ latitude.value+'", "longitude": "'+longitude.value+'", "type": "list" }'
    });

}

function add_professional(data) {

    document.getElementById('info').innerHTML = " Encontrado:  " + JSON.parse(data).length + " profissionais próximos de você.<br>";
    $.each(JSON.parse(data), function(i, e) {
        const li = $("<li class=\"collection-item avatar\"></li>");
        const span = $("<span class=\"title\" id=\"nameProfessional\"></span>");
        const p = $("<p id=\"emailProfessional\"></p>");
        const img = $('<img />', { src:'public/images/default.jpg', alt:"", class:"left" });
        let certificate = e.certificate;
        if(certificate == true) {
            certificate = $("<a href=\"#!\" class=\"secondary-content\">" +
                "<i class=\"material-icons\">verified_user</i></a>");
        }
        console.log(e.certificate);
        span.text(e.name);
        p.text(e.email);

        li.append(img, span, p, certificate);
        li.appendTo($('.collection'));
    });

}

function add_markers(data) {
    var marker, i;
    var bounds = new google.maps.LatLngBounds();
    var infowindow = new google.maps.InfoWindow();

    document.getElementById('info').innerHTML = " Encontrado:" + data.length + " profissionais próximos de você.<br>";

    for (i = 0; i < data.length; i++) {
        var coordStr = data[i][1];
        var coords = coordStr.split(",");

        var pt = new google.maps.LatLng(parseFloat(coords[0]), parseFloat(coords[1]));
        bounds.extend(pt);
        marker = new google.maps.Marker({
            position: pt,
            map: map,
            icon: data[i][2],
            address: data[i][3],
            title: data[i][0],
            html: data[i][0] + "<br>" + data[i][1]
        });
        markers.push(marker);
        google.maps.event.addListener(marker, 'click', (function (marker, i) {
            return function () {
                infowindow.setContent(marker.html);
                prov.value = data[i][5];
                infowindow.open(map, marker);
            }
        })
        (marker, i));

    }

    map.fitBounds(this.Crcl.getBounds());
}

google.maps.event.addDomListener(window, 'load', initialize);