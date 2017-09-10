<?php
include 'scripts/header.php';
session_start();
?>

<html>
  <head>
      <!-- Title -->
      <title>Map Editing</title>
      <!-- Meta -->
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <meta name="description" content="Portlethen (and surrounding communities) Information Resource">
      <meta name="author" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
      <!-- Favicon -->
      <link href="favicon.ico" rel="shortcut icon">

      <!-- Template CSS -->
      <link rel="stylesheet" href="/ClubWeb/inc/assets/css/map.css" rel="stylesheet">

      <!-- Google Fonts-->
      <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300" rel="stylesheet" type="text/css">
  </head>

  <body>
    <!-- Top Menu -->
    <!-- end header -->
    <!--begin content -->
    <div class="container-fluid">
      <div class="row">
        <!--Map-->
        <div class="col-md-12">
          <div id="map" style="width:100%; height:500px"></div>
        </div>
      </div>
      <div class="row">
        <!--Marker-->
        <div class="col-md-6">
          <h1>Add a marker </h1>
          <form class="form-group" action='markercreate' method='POST'>

            <label for="txtboxMarkerName">Marker Name </label>
            <input type="text" name='name' id="txtboxMarkerName" class="form-control" placeholder="Enter marker name here">

            <label>Description</label>
            <textarea class="form-control" name="markerdesc"></textarea>

            <label for="txtboxLat"> Latitude </label>
            <input type="text" name='lat' id="txtboxLat" class="form-control" placeholder="Latitude">

            <label for="txtboxLng"> Longitude </label>
            <input type="text" name='lng' id="txtboxLng" class="form-control" placeholder="Longitude">

            <label>Route</label>
            <select name="route" class="form-control" name='route'>
              <option value="Cycling">Bike Route</option>
              <option value="Running">Running Route</option>
              <option value="walking">Walking Route</option>
            </select>
            <label>Type</label>
            <select name="environemnt" class="form-control" name='type'>
              <option value="Urban">Urban</option>
              <option value="Country">Countryside/Rural</option>
            </select>

            <input type="submit" class="form-control" value="add to map" name="marker">

          </form>
        </div>
        <!--end marker -->
        <!--Route type -->
        <div class="col-md-6">
          <div class="form-group">
            <h1>Add a Route</h1>
            <label>Route Name</label>
            <input type="text" class="form-control" placeholder="name" id="txtboxRouteName" name="routename">

            <label class="checkbox">
              <input type="checkbox" id="chkMapRoute" name="chkMapRoute">Use map to define route?
            </label>

            <br>

            <label>Manual Starting Point</label>
            <input type="text" id="txtboxStart" name="Start" placeholder="latitude"class="form-control">

            <label>Manual End Point</label>
            <input type="text" id="txtboxEnd" name="End" placeholder="longitude" class="form-control">

            <label>Route type</label>
            <select name="route" class="form-control">
              <option value="Cycling">Bike Route </option>
              <option value="Running">Running Route </option>
              <option value="walking">Walking Route </option>
            </select>
            <input type="submit" name="routesubmit" class="form-control" value="add to map">
          </div>
        </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div id="marker-management" style="color:darkblue;font-family: 'Titillium Web', sans-serif;">
            <h1>Markers</h1>
            <table border="1" class="table">

                <tr>
                    <th>Marker ID</th>
                    <th>Marker</th>
                    <th>Lat</th>
                    <th>Lng</th>
                    <th>description</th>
                    <th>Delete</th>
                </tr>

            <?php
            if (isset($_SESSION['username'])) {

                if ($_SESSION['accessLevelID'] >= 3) {
                    //connect to the database.
                    include("/scripts/dbconnect.php");

                    $query = "SELECT * FROM port_markers";

                    $result = $db->query($query);

                    while ($row = $result->fetch_array()) {

                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["lat"] . "</td>";
                        echo "<td>" . $row["lng"] . "</td>";
                        echo "<td>" . $row["description"] . "</td>";
                        echo "<form action='markerdelete' method='POST'>";
                        echo "<td>" . "<button name='delete' type='submit' value='" . $row["id"] . "'>" . "delete" . "</button>" . "</td>";
                        echo "</form>";
                        echo "</tr>";

                    }


                    $db->close();


                    echo "</table>";
                }
            }
            ?>

        </div>
      </div>
    </div>
  </div>
        <!--<script type="text/javascript" href="/ClubWeb/inc/assets/js/map.js" type="text/javascript"></script> -->
        <!--jquery -->
        <script type="text/javascript" href="/ClubWeb/inc/assets/js/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript" href="/ClubWeb/inc/assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script type="text/javascript" href="/ClubWeb/inc/assets/js/scripts.js"></script>
        <!-- Isotope - Portfolio Sorting -->
        <script type="text/javascript" href="/ClubWeb/inc/scripts/Style/assets/js/jquery.isotope.js" type="text/javascript"></script>
        <!-- Mobile Menu - Slicknav -->
        <script type="text/javascript" href="/ClubWeb/inc/assets/js/jquery.slicknav.js" type="text/javascript"></script>
        <!-- Animate on Scroll-->
        <script type="text/javascript" href="/ClubWeb/inc/assets/js/jquery.visible.js" charset="utf-8"></script>
        <!-- Sticky Div -->
        <script type="text/javascript" href="/ClubWeb/inc/assets/js/jquery.sticky.js" charset="utf-8"></script>
        <!-- Slimbox2-->
        <script type="text/javascript" href="/ClubWeb/inc/assets/js/slimbox2.js" charset="utf-8"></script>
        <!-- Modernizr -->
        <script href="/ClubWeb/inc/scripts/Style/modernizr.custom.js" type="text/javascript"></script>
        <!-- End JS -->
        <script type="text/javascript">
          function initMap() {
            var map;
            map = new google.maps.Map(document.getElementById('map'), {
              center: {lat:57.05474, lng:-2.13066},
              zoom: 8
            });


            function renderRoute(origin, destination, service, display) {
              service.route({
                origin: origin,
                destination: destination,
                travelMode: 'DRIVING',
                avoidTolls: true
              }, function(response, status) {
                if (status === "OK") {
                  display.setDirections(response);
                } else {
                  alert("Murray's an idiot, here's an error code so you can correct him: " +
                   status);
                }
              });
            }

            //getting the distance of the route.

            function getDistance(origin, destination) {
              distancematrix.getDistanceMatrix( {
                origins: origin,
                destinations: destination,
                travelMode:"BICYCLING",
                drivingOptions: {
                  trafficModel: "optimistic"
                },
                unitSystem: "IMPERIAL",
                avoidHighways: false,
                avoidTolls: true,
              }, function(response, status) {
                var results = response.rows[0].elements

                var element = results[0];
                var distance = element.distance.text;
                var duration = element.duration.text;
              });
            }

            function addMarker(LatLng, title, InfoWindow) {
              var marker = new google.maps.Marker({
                position: LatLng,
                map:map,
                title, title
                });

                marker.addListener("click", function() {
                  InfoWindow.open(map, marker);
                });
              }

              function downloadUrl(url, callback) {
                  var request = window.ActiveXObject ?
                  new ActiveXObject('Microsoft.XMLHTTP') :
                  new XMLHttpRequest;

                  request.onreadystatechange = function() {
                    if (request.readyState == 4) {
                      request.onreadystatechange = doNothing;
                      callback(request, request.status);
                    }
                  };

                  request.open('GET', url, true);
                  request.send(null);
                }
                function doNothing() {}

         //marker

            downloadUrl("http://gcg.azurewebsites.net/ClubWeb/markers", function(data) {
              var xml = data.responseXML;
              var markers = xml.documentElement.getElementsByTagName('markers');
              for(var i=0; i < markers.length; i++) {
                    var name = markers[i].getAttribute('name');
                    var address = markers[i].getAttribute('address');
                    var type = markers[i].getAttribute('type');
                    var route = markers[i].getAttribute('route');
                    var description = markers[i].getAttribute('description');
                    var point = new google.maps.LatLng(
                        parseFloat(markers[i].getAttribute('lat')),
                          parseFloat(markers[i].getAttribute('lng')));
                    var infowindow = new google.maps.InfoWindow({
                      content: "<h1>" + name + "</h1>" + "<h4>" + type + + " " + route + "</h4>" + "<p>" + description + "</p>"
                    });

                    addMarker(point, name, infowindow);

                    };
                  });

                }
          </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC8HwZx1Aknt-BHgT2vYtcgeBBvokVzWU&callback=initMap"
          async defer></script>
  </body>
</html>
