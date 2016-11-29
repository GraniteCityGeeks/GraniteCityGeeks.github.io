<?php

include ("db_connect.php");

$username = $_POST["username"];
$lastname = $_POST["lastname"];
$superpower = $_POST["superpower"];

$sql = "INSERT INTO superheros (firstName, lastName,mainSuperpower) VALUES ('$firstname','$lastname','$superpower')";

if (mysqli_query($db, $sql)) {
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

header("location:index.php");
?>