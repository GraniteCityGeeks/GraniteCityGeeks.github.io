
<?php
include("scripts/dbconnect.php");
include ("scripts/header_l2.php");
echo "
<main>
";
$query = "SELECT *, C.description as clubDescription FROM port_club as C, port_articles as A, port_genre as G, port_photo as P WHERE clubid = '1' AND G.genreid = C.genreid AND P.photoid = C.photoid AND A.articleid = C.articleid";

$result = $db->query($query);

while($row = $result->fetch_array()) {
    //Paste the club
    $title = $row['clubTitle'];
    $desc = $row['clubDescription'];
    $calender = $row['clubcalendar'];
    $photo = $row['URL'];
}
    //add the title
    echo"<img src= '". $photo . "' height='300' width='300'>";
    echo"<h1>". $title . "</h1>";
    echo"<p>".$desc. "</p>";
    echo"<p>".$calender."</p>";
echo "
</main>
";
    include("scripts/footer.php");

    ?>




