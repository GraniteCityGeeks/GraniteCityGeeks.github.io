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
    <div class="row">
      <div class="col-md-12">
        <div id="marker-management" style="color:darkblue;font-family: 'Titillium Web', sans-serif;">
            <h1>Clubs</h1>
            <table border="1" class="table">

                <tr>
                    <th>Club Name</th>
                    <th>Description</th>
                    <th>Genre</th>
                    <th>Delete</th>
                </tr>

            <?php
            if (isset($_SESSION['username'])) {

                if ($_SESSION['accessLevelID'] >= 3) {
                    //connect to the database.
                    include("/scripts/dbconnect.php");

                    $query = "SELECT * FROM port_club";

                    $result = $db->query($query);

                    while ($row = $result->fetch_array()) {

                        echo "<tr>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["description"] . "</td>";
                        echo "<td>" . $row["genre"] . "</td>";
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
  </body>
</html>
