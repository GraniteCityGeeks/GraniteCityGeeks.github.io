<?php

include("scripts/dbconnect.php");

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "INSERT INTO port_users (username, password) VALUES ('$username','$password')";

if (mysqli_query($db, $sql)) {
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

header("location:login");
?>