<?php
include("scripts/dbconnect.php");
include ("scripts/header_l2.php");
$query = "SELECT * FROM port_club as C, port_articles as A, port_genre as G, port_photo as P WHERE clubid = '1' AND G.genreid = C.genreid AND P.photoid = C.photoid AND A.articleid = C.articleid";

$result = $db->query($query);

while($row = $result->fetch_array()) {
    //Paste the club
    $title = $row['clubTitle'];
    $desc = $row['description'];
    $calender = $row['clubcalander'];
    $photo = $row['URL'];

    //add the title
    echo"<h1>". $title . "</h1>";


}