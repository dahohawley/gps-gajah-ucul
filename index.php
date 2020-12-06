<?php
session_start();
if (!$_SESSION) {
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/styles.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
    <style>
        #mapid {
            height: 500px;
        }
    </style>
</head>

<body>
    <div>
        <div class="header-dark">
            <nav class="navbar fixed-top navbar-dark navbar-expand-lg navbar-light bg-dark">
                <?php include './navbar.php' ?>
            </nav>
            <br><br>
            <div class="container hero">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <h1 class="text-center">Lokasi Gajah Saat ini</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div id="mapid"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h1>About</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="col">
                    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        var mymap = L.map('mapid').setView([51.505, -0.09], 13);
        var markerDevice;
        var markerGajah;
        var polyLine;
        var deviceGeoloc;
        var gajahGeoloc;
        var polyGeoloc;
        var distance;

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'your.mapbox.access.token'
        }).addTo(mymap);

        var myIcon = L.icon({
            iconUrl: 'my-icon.png',
            iconSize: [38, 95],
            iconAnchor: [22, 94],
            popupAnchor: [-3, -76],
            shadowUrl: 'my-icon-shadow.png',
            shadowSize: [68, 95],
            shadowAnchor: [22, 94]
        });

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }
        
        function showPosition(position) {
            var deviceLat = position.coords.latitude;
            var deviceLong = position.coords.longitude;
            deviceGeoloc = [deviceLat,deviceLong];
            mymap.setView(deviceGeoloc);
            markerDevice = L.marker(deviceGeoloc).addTo(mymap);
            markerDevice.bindTooltip("Lokasi anda").openTooltip();
        }

        markerGajah = L.marker([51,51]).addTo(mymap);

        function refreshMarker() {

            setTimeout(() => {
                $.get("gps.php", (data) => {
                    timestampFormatted = moment(data.timestamp).format("DD MMMM YYYY HH:mm:ss");
                    text = "Lokasi Gajah [ " + timestampFormatted + " ] "
                    gajahGeoloc = [data.latitude, data.longitude];
                    polyGeoloc = [
                        deviceGeoloc,
                        gajahGeoloc
                    ];

                    var latlng = L.latLng(data.latitude,data.longitude);
                    distance = latlng.distanceTo(deviceGeoloc);
                    markerDevice.bindTooltip("Lokasi anda <br> Jarak " + parseInt(distance) + " Meter");

                    polyLine = L.polyline(polyGeoloc,{color:'red'}).addTo(mymap);
                    markerGajah.setLatLng(gajahGeoloc)
                    markerGajah.bindTooltip(text).openTooltip();
                });
                refreshMarker();
            }, 1000);
        }

        getLocation()
        refreshMarker();
    </script>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>