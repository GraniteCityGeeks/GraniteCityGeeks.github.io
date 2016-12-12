<?php
include("scripts/dbconnect.php");

$id = $_POST['delete'];

$query = "DELETE FROM port_markers WHERE id =$id";

$result = $db->query($query);

if (!$result) {
    die("THIS ISN'T WORKING");
}

else {
    header("Location: MarkerAdmin");
    die();
}
