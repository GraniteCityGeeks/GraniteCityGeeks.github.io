<?php
include 'master.php';
?>

<!DOCTYPE html>
<head>
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
<br>

<br>
<div id="editmap" style="float:left;">
<form action="../markercreate.php">
    Marker Name:<br>
    <input type="text" name="name" value="e.g Local Wood"><br>
    Address:<br>
    <input type="text" name="address" value="123 Example St."><br><br>
    Latitude:<br>
    <input type="text" name="lat" value=""><br><br>
    Longitude:<br>
    <input type="text" name="lng" value=""><br><br>
    Type:<br>
    <input type="text" name="type" value="e.g Playpark"><br><br>
    Marker Description :<br>
    <input type="text" name="address" value="123 Example St."><br><br>
    <input type="submit" value="Submit">
</form>
</div>

</body>

</html>