<?php
include'../healthFinal/navBar/master.php'

?>

<html>

<link href="bootstrap.min.css" rel="stylesheet" />
<link href="/healthFinal/CSS/half-slider.css" rel="stylesheet" />
<link href="/CoreCSS/master.css" rel="stylesheet" />
<link href="/healthFinal/CSS/healthPage.css">
<head>

<title>GoPortlethen</title>
<style>
    @import url('https://fonts.googleapis.com/css?family=Roboto');
</style>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#twitter" ).draggable();
        } );
    </script>



<script type="text/javascript">
    function initMap() {
        map = new google.maps.Map(document.getElementById('initmap'), {
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

<header id="myCarousel" class="carousel slide">
    <div class="carousel-inner">
        <div class="item active">
            <div class="fill" style="background-image: url('gold.jpg')"></div>
        </div>
        <div class="item">
            <div class="fill" style="background-image: url('ASPC_ABERDEEN-IN-SNOW.jpg')"></div>

        </div>
        <div class="item">
            <div class="fill" style="background-image: url('rem.jpg')"></div>

        </div>
    </div>
</header>

<script src="/healthFinal/js/jquery.js"></script>
<script src="/healthFinal/js/bootstrap.min.js"></script>

<script>
    $('.carousel').carousel({
        interval: 5000
    })
</script>


<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>Local Map</h1>
            <i>This page will show points of interest on an interactive map!</i>
        </div>


    <hr class="type_3" />
        <br>
        <br>
        <br>
        <br>
        <div class="col-lg-12" style="width: 350px">
        <div id="top" style="float:left position:absolute;">

            <div id="initmap" style="height:700px;width:1250px; float:left;">
            </div>
    </div>
</div>

            <div class="col-lg-12" style="width: 350px">

            <div id="twitter">
                <a class="twitter-timeline" data-width="400" data-height="800" d href="https://twitter.com/PortlethenGC">Tweets by PortlethenGC</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </div>

        <div class="col-lg-12" style="width: 350px">
            <br>
            Is this the text you are looking for Jamie???
            <br>
            <h4>NKPAG USER</h4>
            <br>
            <a href="MarkerAdmin.php">Edit Markers</a>
        </div>

    </div>
</div>



<meta charset="UTF-8">
<title></title>
</head>
<body onload="initMap">

<br>
<br>




<br>
<br>
<br>
<br>
<br>


</html>