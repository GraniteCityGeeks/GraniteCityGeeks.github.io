
<?php
include("scripts/dbconnect.php");
include ("scripts/header.php");
echo "
<main>
";
$club = $params['linkref'];
$query = "SELECT clubTitle, clubcalendar, URL, C.description as clubDescription, G.description as Genre FROM port_club as C, port_genre as G, port_photo as P WHERE clubid =".$club. " AND G.genreid = C.genreid AND P.photoid = C.photoid";

//query to load up all articles
$queryarticles = "SELECT * from port_club as C, port_club_article as A, port_photo as P WHERE C.clubid = A.clubid AND C.clubid = '".$club."' AND A.photoid = P.photoid";



$result = $db->query($query);

while($row = $result->fetch_array()) {
    //Paste the club
    $title = $row['clubTitle'];
    $desc = $row['clubDescription'];
    $calender = $row['clubcalendar'];
    $photo = $row['URL'];
    $genre = $row['Genre'];
}
$queryusers = "SELECT * from port_users as A, port_usersinclubs as C WHERE A.userID = B.userid AND B.clubid ='" .$club. "'";

$userresult = $db->query($queryusers);


    //add the title
echo"<img src= '". $photo . "' height='300' width='300'>";

echo"<h1>". $title . "</h1>";

echo"<h5> Genre: ".$genre."</h5>";

echo"<h3> Description </h3>";

echo"<p>".nl2br($desc, false). "</p>";

echo "<h3> Upcoming events </h3>";

echo"<p>".$calender."</p>";



echo "<form action='scripts/joinclub.php' method = 'POST'>";
echo "<button value=''>Join this club!</button>";
echo "</form>";

echo "<h3> Clubs </h3>";

echo "<table border='1'>";
echo "<tr>";
echo "<th>Profile picture</th>";
echo "<th>username</th>";
echo "</tr>";
while ($row = $userresult->fetch_array()) {
    $username = $row['username'];
    $photo = $row['photoID'];
    echo "<tr>";
    echo "<td><img src='$username'></td>";
    echo "<td>$username</td>";
    echo "</tr>";

}
echo "</table>";


//renew the query for the articles

$result = $db->query($queryarticles);
$total = $result->num_rows;

// tell the user how many articles are displayed.
echo"<h3> Articles </h3>";
echo"<h5>" .$total. " articles have been found". "</h5>";

while ($row = $result->fetch_array()) {
    $title = $row['title'];
    $content = $row['content'];
    $photo = $row['URL'];

    echo "<h2>". $title. "</h2>";
    echo "<img src= ' ". $photo. "height='300' width='300'>";
    echo "<p>". nl2br($content, false). "</p>";
    echo "<br><br>";
    //add button to allow user to join club. and make sure to check if they are in the club already!
}
echo "
</main>
";
    include("scripts/footer.php");

    ?>




