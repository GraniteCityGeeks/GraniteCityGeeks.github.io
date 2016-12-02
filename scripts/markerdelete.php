<?php
include("dbconnect.php");

$id = $_GET['delete'];

$query = "DELETE FROM port_markers WHERE id =$id";

$result = $db->query($query);

if (!$result) {
    die("THIS ISN'T WORKING");
}

else {
    header("Location: ../newcss/MarkerAdmin.php");
    die();
}
