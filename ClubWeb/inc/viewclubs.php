<?php
include("scripts/dbconnect.php");
include("scripts/header.php");

$query = "SELECT * From port_club, port_photo WHERE clubid IS NOT NULL";

$result = $db->query($query);


echo "<main>";

//echo some basic stuff

$total = $result->num_rows;

echo "<h1> Portlethen clubs </h1>";

echo "<h4> Displaying ". $total . " active clubs </h4>";

while($row = $result->fetch_array()) {
    //echo all clubs
    echo"<img src='".$row['URL']. "height='300', width='300'>";
    echo"<br>";
    echo"<h1><a href='Clubs'>".$row['clubTitle']. "</a></h1>";

}

echo "</main>";
include("scripts/footer.php");