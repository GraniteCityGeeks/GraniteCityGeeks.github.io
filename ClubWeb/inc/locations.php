<?php
/**
 * Created by PhpStorm.
 * User: 1608354
 * Date: 07/11/2016
 * Time: 14:22
 */

// Start XML file, create parent node
include("dbconnect.php");


$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);


// Select all the rows in the markers table

$query = "SELECT * FROM markers WHERE 1";
$result = $db->query($query);
if (!$result) {
    die('Nothing in result: ');
}
//AIzaSyDvJrab9q1MPlJ4yCuv_Br5BGyP9xP5J80 
header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each

while ($row = $result->fetch_array()){
    // ADD TO XML DOCUMENT NODE
    $node = $dom->createElement("marker");
    $newnode = $parnode->appendChild($node);
    $newnode->setAttribute("name",$row['name']);
    $newnode->setAttribute("address", $row['address']);
    $newnode->setAttribute("lat", $row['lat']);
    $newnode->setAttribute("lng", $row['lng']);
    $newnode->setAttribute("type", $row['type']);
}


$result->close();
$db->close();

echo $dom->saveXML();

?>
