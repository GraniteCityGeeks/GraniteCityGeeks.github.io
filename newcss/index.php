<?php
include 'master.php';
?>

<!DOCTYPE html>
<html lang="en">
<link href="master.css" rel="stylesheet" />

<title>GoPortlethen</title>


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
<br>
<div id="map" style="height:700px;width:100%;"></div>


<a class="twitter-timeline"  href="https://twitter.com/hashtag/portlethen" data-widget-id="803334424075075584">#portlethen Tweets</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

</body>
</html>