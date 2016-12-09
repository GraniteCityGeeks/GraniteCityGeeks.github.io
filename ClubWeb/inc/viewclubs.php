<?php
include("scripts/dbconnect.php");
include("scripts/header.php");

$query = "SELECT * From port_club as C, port_photo as P WHERE clubid IS NOT NULL AND C.photoid = P.photoid";

$result = $db->query($query);


echo "<main>";

//echo some basic stuff

$total = $result->num_rows;

echo "<h1> Portlethen clubs </h1>";

echo "<h4> Displaying ". $total . " active clubs </h4>";



while($row = $result->fetch_array()) {
    $pictureURL = $row['URL'];
    $clubID = $row['clubid'];
    $clubTitle = $row['clubTitle'];

    echo "
    <img src='{$pictureURL}'height='300', width='300'>
    <h1><a href='Clubs/{$clubID}' name='linkref' id='link'>{$clubTitle}</a></h1>
    ";




    /*//echo all clubs
    echo "<form action='Clubs' name='clubs_submission' method='get' id='form'>";
    echo "<img src='" . $row['URL'] . "'height='300', width='300'>";
    echo "<h1><a href='Clubs' name='linkref' id='link' value='" . $row['clubid'] . "'>" . $row['clubTitle'] . "</a></h1>";
    echo "<br>";
    echo "</form>";*/

}


echo "</main>";

include("scripts/footer.php");
?>

