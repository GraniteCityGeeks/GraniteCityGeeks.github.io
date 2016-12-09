
<?php
include("scripts/dbconnect.php");
include ("scripts/header.php");
echo "
<main>
";
$club = $params['linkref'];
echo $club;
$query = "SELECT clubTitle, clubcalendar, URL, text, Genre, C.description as clubDescription, G.description as Genre FROM port_club as C, port_genre as G, port_photo as P WHERE clubid = ".$club." AND G.genreid = C.genreid AND P.photoid = C.photoid";

//query to load up all articles
$queryarticles ="SELECT * from port_club as C, port_club_article as A, port_photo as P WHERE C.clubid = A.clubid AND C.clubid = '".$club."'";

$result = $db->query($query);

while($row = $result->fetch_array()) {
    //Paste the club
    $title = $row['clubTitle'];
    $desc = $row['clubDescription'];
    $calender = $row['clubcalendar'];
    $photo = $row['URL'];
    $article = $row['text'];
    $genre = $row['Genre'];
}
    //add the title
echo"<img src= '". $photo . "' height='300' width='300'>";

echo"<h1>". $title . "</h1>";

echo"<h5> Genre: ".$genre."</h5>";

echo"<h3> Description </h3>";

echo"<p>".nl2br($desc, false). "</p>";

echo "<h3> Upcoming events </h3>";

echo"<p>".$calender."</p>";

echo"<h3> Articles </h3>";

//renew the query for the articles

$result = $db->query($queryarticles);
$total = $result->num_rows;

// tell the user how many articles are displayed.

echo"<h5>" .$total. " articles have been found". "</h5>";

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




