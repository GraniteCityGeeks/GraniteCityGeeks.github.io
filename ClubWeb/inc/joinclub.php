<?php
include('dbconnect.php');
session_start();
$username = $_SESSION['username'];
$clubid = $_POST['clubid'];

//find the username's id via query

$queryuserid = ("SELECT userID from port_users where username = '$username'");

$resultuserid = $db->query($queryuserid);

while($row = $resultuserid->fetch_array()) {
    $id = $row['userID'];
}

//before inserting check if id is already in club.

$checkquery = ("SELECT userid, clubid from port_usersinclubs WHERE userid = '$id' AND clubid = ''$clubid'");

$checkresult = $db->query($checkquery);

if ($checkresult->num_rows>0) {
    echo '<script language="javascript">';
    echo 'alert("user is already in club!")';
    echo '</script>';
    header("Location: viewclubs");

}
$insertquery = ("INSERT INTO port_usersinclub(userid, clubid) VALUES($id, $clubid)");

if (mysqli_query($db, $insertquery)) {
    header("Location: viewclubs");
}


//insert the query



