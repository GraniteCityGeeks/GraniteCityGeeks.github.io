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
      <!-- Bootstrap Core CSS -->
      <link rel="stylesheet" href="HTML/assets/css/bootstrap.css" rel="stylesheet">
      <!-- Template CSS -->
      <link rel="stylesheet" href="HTML/assets/css/animate.css" rel="stylesheet">
      <link rel="stylesheet" href="HTML/assets/css/font-awesome.css" rel="stylesheet">
      <link rel="stylesheet" href="HTML/assets/css/nexus.css" rel="stylesheet">
      <link rel="stylesheet" href="HTML/assets/css/responsive.css" rel="stylesheet">
      <link rel="stylesheet" href="HTML/assets/css/custom.css" rel="stylesheet">
      <link rel="stylesheet" href="HTML/assets/css/map.css" rel="stylesheet">
      <!-- Google Fonts-->
      <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300" rel="stylesheet" type="text/css">
  </head>
  <body>
    <!-- Top Menu -->
    <!-- end header -->
    <!--begin content -->
    <div class="container-fluid">
      <div class="row">
        <!--Marker-->
        <div class="col-md-4">
          <h1>Add a marker </h1>
          <div class="form-group">
            <label for="txtboxMarkerName">Marker Name </label>
            <input type="text" id="txtboxMarkerName" class="form-control" placeholder="Enter marker name here">

            <label>Description</label>
            <textarea class="form-control" name="description"></textarea>

            <label for="txtboxLat"> Latitude </label>
            <input type="text" id="txtboxLat" class="form-control" placeholder="Latitude">

            <label for="txtboxLng"> Longitude </label>
            <input type="text" id="txtboxLng" class="form-control" placeholder="Longitude">

            <label>Route</label>
            <select name="route" class="form-control">
              <option value="Cycling">Bike Route </option>
              <option value="Running">Running Route </option>
              <option value="walking">Walking Route </option>
            </select>
            <label>Type</label>
            <select name="environemnt" class="form-control">
              <option value="Urban">Urban</option>
              <option value="Country">Countryside/Rural</option>
            </select>

            <input type="submit" class="form-control" value="add to map" name="marker">

          </div>
        </div>
        <!--end marker -->
        <!--Route type -->
        <div class="col-md-4">
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

        <!--Map-->
        <div class="col-md-4">
          <div id="map"></div>
        </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div id="marker-management" style="color:darkblue;font-family: 'Titillium Web', sans-serif;">
            <h1>Markers</h1>
            <table border="1" class="table">

                <tr>
                    <th>Id No</th>
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
                    include("scripts/dbconnect.php");

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

    <!-- JS -->
    <!--Map src -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC8HwZx1Aknt-BHgT2vYtcgeBBvokVzWU&callback=initMap"
      async defer></script>
    <script type="text/javascript" src="HTML/assets/js/map.js" type="text/javascript"></script>
    <!--jquery -->
    <script type="text/javascript" src="HTML/assets/js/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="HTML/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="HTML/assets/js/scripts.js"></script>
    <!-- Isotope - Portfolio Sorting -->
    <script type="text/javascript" src="HTML/assets/js/jquery.isotope.js" type="text/javascript"></script>
    <!-- Mobile Menu - Slicknav -->
    <script type="text/javascript" src="HTML/assets/js/jquery.slicknav.js" type="text/javascript"></script>
    <!-- Animate on Scroll-->
    <script type="text/javascript" src="HTML/assets/js/jquery.visible.js" charset="utf-8"></script>
    <!-- Sticky Div -->
    <script type="text/javascript" src="HTML/assets/js/jquery.sticky.js" charset="utf-8"></script>
    <!-- Slimbox2-->
    <script type="text/javascript" src="HTML/assets/js/slimbox2.js" charset="utf-8"></script>
    <!-- Modernizr -->
    <script src="HTML/assets/js/modernizr.custom.js" type="text/javascript"></script>
    <!-- End JS -->
  </body>
</html>
