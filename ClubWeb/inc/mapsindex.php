


<!-- Michael, i brought back an older version because the map kept breaking. This map doesn't break. PLEASE DO NOT CHANGE
THE NAME OF ANYTHING IN THE JAVASCRIPT AND PLEASE PLEAAAASE DON'T CHANGE THE DIV TAGS WITHOUT MY PERMISSION. Whatever you/jamie
did broke the map's loading functions. -->

<?php


if(file_exists("markers.php")) { echo "markers file found"; } else { echo "markers file missing"; }
?>

<html>
<head>
    <link href="/basicstyle.css" rel="stylesheet" type="text/css">

    <title>GoPortlethen</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto');
    </style>

    <div id="main">
    <script type="text/javascript">
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 57.061681, lng: -2.129468},
                zoom: 12,
                MapTypeId: "satellite"
            });
        }
    </script>
        </div>
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
        downloadUrl("markers.php", function (data) {
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

<ul id="nav">
    <li><a href="page1.html">Page 1</a></li>
    <li><a href="page2.html">Page 2</a></li>
    <li><a href="page3.html">Page 3</a></li>
    <li><a href="page4.html">Page 4</a></li>
    <li><a href="page5.html">Page 5</a></li>
</ul>

<div id="container">

<br>
<br>

<div id="top" style="float:left position:absolute;">

    <div id="map" style="height:700px;width:60%; float:left;">

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


<div class="textD" style="background-color: lightgray float:left;">
    <br>
    Is this the text you are looking for Jamie???
    <br>
    <h4>NKPAG USER</h4>
    <br>
    <a href="scripts/MarkerAdmin.php">Edit Markers</a>
</div>
</div>
</body>

</html>