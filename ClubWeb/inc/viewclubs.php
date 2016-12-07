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
    echo"<h1><a href='Clubs' name='linkref
' value='".$row['clubid']."'>".$row['clubTitle']."</a></h1>";
    echo"<br>";

}

echo "</main>";
include("scripts/footer.php");