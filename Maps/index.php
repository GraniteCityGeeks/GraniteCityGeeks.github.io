<?php
include 'master.php';

?>

<html>
<head>
<link href="/healthFinal/CSS/healthPage.css" rel="stylesheet" type="text/css">

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
            var desc = markers[i].getAttribute("description");
            var name = markers[i].getAttribute("name");
            var point = new google.maps.LatLng(

                parseFloat(markers[i].getAttribute("lat")),
                parseFloat(markers[i].getAttribute("lng"))
            );

            addMarker(i, point, desc, name);

        }
    });

    var markersArray = [];  //array for markers

    //this fucntion will add the markers.
    function addMarker(id,point,description,name) {
        id = new google.maps.Marker({
            map: map,
            draggable: false,
            animation: google.maps.Animation.DROP,
            position: point

        });
        var contentstring = '<div id="content">' +
            '<h1>'+ name +'</h1>'+
            '<p>'+ description +'</p>';
        var infowindow = new google.maps.InfoWindow({
            content:contentstring
        });

        id.addListener('click', function() {
            map.setZoom(15);
            map.setCenter(id.getPosition());
            infowindow.open(map, id);

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

<div id="top" style="float:left position:absolute;">

    <div id="map" style="height:700px;width:1250px; float:left;">

        <ul class="ulProducts" runat="server" id="newsFeed">
            <li class ="display2">
                <b>Healthy Body</b>
                <br>
                Excessive body fat can be caused by many factors: over eating due to stress, unbalanced diet and not enough exercise to name a few. It's really easy
                to gain weight and even easier not to do anything about it. This page will explain why you need to lose weight and methods on how to lose weight
                <hr>
            </li>

            <li class ="display2">
                <b>Healthy Mind</b>
                <br>
                The key to a healthy lifestyle is not just having a healthy body; but also having a healthy mental state. Stress, anxiety, depression can all cause negative
                impact on your day to day life and could even lead to self neglect. Confidence is also a big factor in a healthy lifestyle; having the courage to welcome new
                things into your life can lead to great opportunities
                <hr>
            </li>
</body>

</html>