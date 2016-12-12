<?php
include("scripts/dbconnect.php");

//get variables from the form first by using GET
$name = $_POST['name'];
$address = $_POST['address'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];
$type = $_POST['type'];
$desc = $_POST['markerdesc'];

//now insert into database.

$query = "INSERT INTO port_markers(name, address, lat, lng, type, description) values ('$name', '$address', '$lat', '$lng', '$type', '$desc')";

$result= $db->query($query);

if (!$result) {
    die("Error: " . $query . "<br>" . $db->errno);

}

echo("data entry successful");

header("Location: mapsindex");
die();