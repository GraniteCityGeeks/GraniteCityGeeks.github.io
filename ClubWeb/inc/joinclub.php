<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('scripts/dbconnect.php');
session_start();

//before we continue, check that there IS a username
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $clubid = $_POST['clubid'];

//find the username's id via query

    $queryuserid = ("SELECT userID from port_users where username = '$username'");

    $resultuserid = $db->query($queryuserid);

    while ($row = $resultuserid->fetch_array()) {
        $id = $row['userID'];
    }

//before inserting check if id is already in club.

    $checkquery = ("SELECT userid, clubid from port_usersinclubs WHERE userid = '$id' AND clubid = '$clubid'");

    $checkresult = $db->query($checkquery);
    $row_no = $checkresult->num_rows;
    if ($row_no > 0) {
        echo '<script language="javascript">';
        echo 'alert("user is already in club!")';
        echo '</script>';
        header("Location: viewclubs");

    }
    $insertquery = ("INSERT INTO port_usersinclubs(userid, clubid) VALUES('$id', '$clubid')");

    if (mysqli_query($db, $insertquery)) {
        header("Location: viewclubs");
    } else {
       echo "Error: " . $sql . "<br>Error Message:" . mysqli_error($db);
    }
} else {
    header('Location: login');
}


