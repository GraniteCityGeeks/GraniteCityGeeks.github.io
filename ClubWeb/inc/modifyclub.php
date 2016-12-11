<?php
include('scripts/dbconnect.php');
session_start();
if (isset ($_SESSION['username'])) {

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        include("scripts/Header.php");
        ?>
        <main>
            <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <?
        //first check that the user is admin in club. Otherwise return the user back to viewclubs
        //query to check that the user manages a club.
        $id = $_SESSION['username'];
        $query ="select * FROM port_club as C, port_users as P WHERE C.ownerid = P.userid AND username = '$id'";

        $result = $db->query($query);

        if (!$result) {
            header('Location: Clubs');

        } else  {
            //if a club has been found, continue.
            //get results from the query.

            while($row = $result->fetch_array()) {
                $clubid = $row['clubid'];
                $clubname = $row['clubTitle'];
                $clubdesc = $row['description'];
                $clubcalendar = $row['clubcalendar'];


            }
            echo "<h1> Currently editing: $clubname </h1>";
            echo "<form name ='clubsubmit' method='POST'>";
            echo "<br>";
            echo "<input type='text' name='clubdesc' value='$clubdesc'>";
            echo "<br>";
            echo "<input type='text' name='clubcalendar' value='$clubcalendar'>";
            echo "<br> <br>";
            echo "<input type='submit' value='submit'>";
            echo "<h4>Users in club</h4>";
            echo "</form>";



        }


    } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cludesc = $_POST['clubdesc'];
        $clubcalendar = $_POST['clubcalendar'];
        $insert = ("UPDATE port_club SET description = '$clubdesc', clubcalendar = '$clubcalendar' WHERE clubid = $clubid");
        if (mysqli_query($db, $insert)) {
            echo "<p> edit successful! </p>";
        }
    }
}