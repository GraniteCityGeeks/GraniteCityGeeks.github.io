<?php
include('dbconnect.php');

/* this script inserts a new article into the database*/

$title = $_POST["title"];
$text = $_POST["text"];

$sql = "INSERT INTO port_articles (title, text)
VALUES ($title, $text)";

if ($db->query($sql) === TRUE) {
    echo "New record created successfully..";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

?>
