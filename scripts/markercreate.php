<?php
include("dbconnect.php");

//get variables from the form first by using GET
$name = $_GET['name'];
$address = $_GET['address'];
$lat = $_GET['lat'];
$lng = $_GET['lng'];
$type = $_GET['type'];
$desc = $_GET['markerdesc'];

//now insert into database.

$query = "INSERT INTO port_markers(name, address, lat, lng, type, description) values ($name, $address, $lat, $lng, $type, $desc)";

$result= $db->query($query);

if (!$result) {
    die(mysqli_error());
    
}

echo("data entry successful");