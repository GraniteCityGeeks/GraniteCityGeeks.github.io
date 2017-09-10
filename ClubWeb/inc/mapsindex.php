<?php
include 'scripts/header.php';
include("dbconnect.php");
session_start();
?>
<html>

<head>
  <!-- Title -->
  <title>Go Portlethen!</title>
  <!-- Meta -->
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="description" content="Portlethen (and surrounding communities) Information Resource">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />


  <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300" rel="stylesheet" type="text/css">
</head>

<body>



<!-- sidebar -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-2 col-sm-4">
        <div class="heading">
          <h4><strong> Portlethen map </strong> </h4>
        </div>
        <br>
        <div class="left-navigation">
          <ul class="control-list" id="searchControls">
            <label for="txtboxSearch">Look up routes </label>
            <li> <input type="textbox" class="form-control" placeholder="search here" id="txtboxSearch"> </li>
            <li> <label class="radio-inline"> <input type="radio" name="radioRouteFilter"> Cycling routes  </label>  </li>
            <li> <label class="radio-inline"> <input type="radio" name="radioRouteFilter"> Running routes </label> </li>
            <li> <label class="radio-inline"> <input type="radio" name="radioRouteFilter"> Walking routes </label> </li>
            <li> <label class="radio-inline"> <input type="radio" name="radioRouteFilter"> N/A </label> </li>
            <br>
            <h5> Route Location </h5>
            <li>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="" id="chkboxUrbanOnly"> Urban only
                </label>
              </div>
            </li>
            <li>
            <div class="checkbox">
                <label>
                  <input type="checkbox" value="" id="chkboxRuralOnly"> Rural only
                </label>
            </div>
            </li>
            <div class="checkbox">
                <label>
                  <input type="checkbox" value="" id="chkboxHybrid"> Hybrid
                </label>
            </div>
            </li>
          </ul>

          <br>

          <ul class="control-list" id="displayOptions">
            <h5><strong>display options</strong></h5>
            <li>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="">Markers
                </label>
              </div>
            </li>
            <li>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="">Routes
                </label>
              </div>
            </li>

            <br>

            <li>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="">Restrict range
                </label>
              </div>
            </li>

            <li>
              <label for="rangeRestrict">Range of search (1-100 Miles from specified marker)</label>
              <input type="range" min="0" max="100" id="rangeRestrict">
            </li>

          </ul>
        </div>
      </div>
      <div class="col-lg-2 col-sm-3">
        <h5>Route Info </h5>
        <div class="form-inline">
          <label>Total Miles: </label>
          <label id="lblDistance"></label>
        </div>

        <div class="form-inline">
          <label>Average Time: </label>
          <label id="lblTime"></label>
        </div>


      </div>
      <!-- map -->
      <div class="col-lg-8 col-sm-7">
        <div id="map"></div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <div id="footer" class="background-grey">
      <div class="container">
          <div class="row">
              <!-- Footer Menu -->
              <div id="footermenu" class="col-md-8">



              <!-- End Footer Menu -->
              <!-- Copyright -->
              <div id="copyright" class="col-md-4">
                  <p class="pull-right">(c) 2017 Vanilla Latte</p>
              </div>
              <!-- End Copyright -->
          </div>
      </div>
  </div>
  <!-- End Footer -->


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
  <!-- Map -->
  <script href="/js/map.js" type="text/javascript"></script>
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
              var description = markers[i].getAttribute('description');
              var point = new google.maps.LatLng(
                  parseFloat(markers[i].getAttribute('lat')),
                    parseFloat(markers[i].getAttribute('lng')));
              var infowindow = new google.maps.InfoWindow({
                content: "<h1>" + name + "</h1>" + "<h4>" + type + "</h4>" + "<p>" + description + "</p>"
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
