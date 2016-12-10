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
        $query ="select ownerid FROM port_club as C, port_users as P WHERE C.ownerid = P.userid AND username = '$id'";

        $result = $db->query($query);

        if (!$result) {
            header('Location: Clubs');

        } else {
            //if a club has been found, continue.


        }

        //echo "<input type='text' name='clubdesc'> value=''";
    }
}