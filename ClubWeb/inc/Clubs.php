
<?php
include("scripts/dbconnect.php");
include ("scripts/header.php");
echo "
<main>
";
$query = "SELECT *, C.description as clubDescription FROM port_club as C, port_articles as A, port_genre as G, port_photo as P WHERE clubid = '1' AND G.genreid = C.genreid AND P.photoid = C.photoid AND A.articleid = C.articleid";

//query to load up all articles
$queryarticles ="SELECT * from port_club as C, port_club_article as A, port_photo as P WHERE C.clubid = A.clubid";

$result = $db->query($query);

while($row = $result->fetch_array()) {
    //Paste the club
    $title = $row['clubTitle'];
    $desc = $row['clubDescription'];
    $calender = $row['clubcalendar'];
    $photo = $row['URL'];
    $article = $row['text'];
}
    //add the title
    echo"<img src= '". $photo . "' height='300' width='300'>";
    echo"<h1>". $title . "</h1>";
    echo"<h3> Description </h3>";
    echo"<p>".$desc. "</p>";
    echo "<br>";
    echo "<h3> Upcoming events </h3>";
    echo"<p>".$calender."</p>";
    echo"<h3> Article </h3>";

$result = $db->query($queryarticles);

while ($row = $result->fetch_array()) {
    $title = $row['title'];
    $content = $row['content'];
    $photo = $row['URL'];

    echo "<h2>". $title. "</h2>";
    echo "<img src= ' ". $photo. "height='300' width='300'>";
    echo "<p>". nl2br($content, false). "</p>";
    echo "<br>";
}
echo "
</main>
";
    include("scripts/footer.php");

    ?>




