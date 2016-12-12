
<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    include("scripts/dbconnect.php");
    include("scripts/header_l2.php");
    echo "
<main>
";
    $club = $params['linkref'];
    $query = "SELECT clubTitle, clubcalendar, URL, C.description as clubDescription, G.description as Genre FROM port_club as C, port_genre as G, port_photo as P WHERE clubid =" . $club . " AND G.genreid = C.genreid AND P.photoid = C.photoid";

//query to load up all articles
    $queryarticles = "SELECT * from port_club as C, port_club_article as A, port_photo as P WHERE C.clubid = A.clubid AND C.clubid = '" . $club . "' AND A.photoid = P.photoid";


    $result = $db->query($query);

    while ($row = $result->fetch_array()) {
        //Paste the club
        $title = $row['clubTitle'];
        $desc = $row['clubDescription'];
        $calender = $row['clubcalendar'];
        $photo = $row['URL'];
        $genre = $row['Genre'];
    }
    $queryusers = "SELECT * from port_users as A, port_usersinclubs as B WHERE A.userID = B.userid AND B.clubid ='" . $club . "'";

    $userresult = $db->query($queryusers);


    //add the title
    echo "<img src= '" . $photo . "' height='300' width='300'>";

    echo "<h1>" . $title . "</h1> <br>";

    echo "<h5> Genre: " . $genre . "</h5> <br>";

    echo "<h3> Description </h3> <br>";

    echo "<p>" . nl2br($desc, false) . "</p> <br>";

    echo "<h3> Upcoming events </h3> <br>";

    echo "<p>" . $calender . "</p> <br>";


    echo "<h3> Club Users </h3>";
    echo "<br><br>";

    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Profile picture</th>";
    echo "<th>username</th>";
    echo "</tr>";
    while ($row = $userresult->fetch_array()) {
        $username = $row['username'];
        $photo = $row['photoID'];
        echo "<tr>";
        echo "<td><img src='$photo' height='80' width='80'></td>";
        echo "<td>$username</td>";
        echo "</tr>";

    }
    echo "</table>";

    if ($_SESSION['accessLevelID'] > 3) {
        echo "<form action='../joinclub' method = 'POST'>";
        echo "<button type='submit' name='clubid' height='100' width='150' value='$club'>Join this club!</button>";
        echo "</form>";
    }


//renew the query for the articles

    $result = $db->query($queryarticles);
    $total = $result->num_rows;

// tell the user how many articles are displayed.
    echo "<h3> Articles </h3>";
    echo "<h5>" . $total . " articles have been found" . "</h5> <br> <br>";

    while ($row = $result->fetch_array()) {
        $title = $row['title'];
        $content = $row['content'];
        $photo = $row['URL'];

        echo "<h2>" . $title . "</h2>";
        echo "<img src= ' " . $photo . "height='300' width='300'>";
        echo "<p>" . nl2br($content, false) . "</p>";
        echo "<br><br>";
        //add button to allow user to join club. and make sure to check if they are in the club already!
    }
    echo "
</main>
";
    include("scripts/footer.php");
} ELSE IF($_SERVER['REQUEST_METHOD'] === 'POST') {
    include('dbconnect.php');
    session_start();

    //before we continue, check that there IS a username
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];

        $clubid = $params['clubid'];

//find the username's id via query

        $queryuserid = ("SELECT userID from port_users where username = '$username'");

        $resultuserid = $db->query($queryuserid);

        while ($row = $resultuserid->fetch_array()) {
            $id = $row['userID'];
        }

//before inserting check if id is already in club.

        $checkquery = ("SELECT userid, clubid from port_usersinclubs WHERE userid = '$id' AND clubid = ''$clubid'");

        $checkresult = $db->query($checkquery);

        if ($checkresult->num_rows > 0) {
            echo '<script language="javascript">';
            echo 'alert("user is already in club!")';
            echo '</script>';
            header("Location: viewclubs");

        }
        $insertquery = ("INSERT INTO port_usersinclub(userid, clubid) VALUES($id, $clubid)");

        if (mysqli_query($db, $insertquery)) {
            header("Location: viewclubs");
        }
    } else {
        header('Location: login');
    }
}
    ?>




