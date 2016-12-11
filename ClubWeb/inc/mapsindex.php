<!-- Michael, i brought back an older version because the map kept breaking. This map doesn't break. PLEASE DO NOT CHANGE
THE NAME OF ANYTHING IN THE JAVASCRIPT AND PLEASE PLEAAAASE DON'T CHANGE THE DIV TAGS WITHOUT MY PERMISSION. Whatever you/jamie
did broke the map's loading functions. -->

<?php
include("scripts/dbconnect.php");
include("scripts/Header.php")
?>

<html>
<head>
    <link href="/basicstyle.css" rel="stylesheet" type="text/css">

    <title>GoPortlethen - Maps</title>
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
        downloadUrl("markers", function (data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('markers');
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
</head>

<body>
<div id="container">
    <div id="main">
        <br>
        <br>



        <div id="map" style="height:400px;width:60%; float:left;">
            <h2>Map ^^^^^^</h2>
        </div>

        <div id="sidebar">
            <a class="twitter-timeline" data-width="400" data-height="800" d href="https://twitter.com/PortlethenGC">Tweets by PortlethenGC</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>

    </div>
    <br>
    <br>
    <br>
    <br>
    <br>



    <br>


</div>
<footer>
    <B>Copyright Granite City Geeks © 2016 All Rights Reserved</B>
</footer>
</div>
</body>

</html>