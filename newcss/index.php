<?php
include 'master.php';
?>

<!DOCTYPE html>
<html lang="en">
<link href="master.css" rel="stylesheet" />

<title>GoPortlethen</title>
<style>
    @import url('https://fonts.googleapis.com/css?family=Roboto');
</style>


<script type="text/javascript">
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 57.061681, lng: -2.129468},
            zoom: 12,
            MapTypeId: "satellite"
        });
    }
</script>
<script type="text/javascript">
    //Get the markers from the XML document.

    function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function () {
            if (request.readyState == 4) {
                callback(request, request.status);
            }
        };

        request.open('GET', url, true);
        request.send(null);
    }

    //download the locations.

    downloadUrl("../scripts/markers.php", function (data) {
        var xml = data.responseXML;

        var markers = xml.documentElement.getElementsByTagName("markers");
        for (var i = 0; i < markers.length; i++) {

            var point = new google.maps.LatLng(

                parseFloat(markers[i].getAttribute("lat")),
                parseFloat(markers[i].getAttribute("lng")));

            addMarker(i, point);

        }
    });

    var markersArray = [];  //array for markers

    //this fucntion will add the markers.
    function addMarker(id,point) {
        id = new google.maps.Marker({
            map: map,
            draggable: false,
            animation: google.maps.Animation.DROP,
            position: point

        });
        id.addListener('click', function() {
            map.setZoom(15);
            map.setCenter(id.getPosition());

        });
        markersArray.push(id);
    }

</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC8HwZx1Aknt-BHgT2vYtcgeBBvokVzWU&callback=initMap">
</script>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<br>
<br>

<div id="top" style="float:left">

    <div id="map" style="height:700px;width:1250px; float:left;">

    </div>


   <div id="twitter" style="float:right;">
    <a class="twitter-timeline" data-width="400" data-height="800" d href="https://twitter.com/PortlethenGC">Tweets by PortlethenGC</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>

</div>


    <div id="content" style="background-color: #9d9d9d;font-family: 'Roboto', sans-serif;">

        <h1> Maps System</h1>
        <h2>Jamie Law</h2>
        <p> this is is a test on content</p>
    </div>
</body>
</html>