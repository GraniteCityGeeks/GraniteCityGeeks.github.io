<?php
include("..ClubWeb/inc/scripts/dbconnect.php");
include("../ClubWeb/inc/scripts/header.php");
$type = $_POST['type'];
if($type=="insert") {
    $sql = "INSERT INTO port_newsfeed (title, text) VALUES ('" .mysql_escape_string($_POST['title']). "', '" .mysql_escape_string($_POST['desc']). "')";
    if ($db->query($sql) === TRUE) {
        echo $_POST['title'];
        echo " Article Added, thank you";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}
if($type=="edit")
{
    echo $_POST['oldTitle'];
    $sql = "UPDATE port_newsfeed SET title='".mysql_escape_string($_POST['title'])."',text='".mysql_escape_string($_POST['desc'])."' WHERE title='".mysql_escape_string($_POST['oldTitle'])."'";
    if ($db->query($sql) === TRUE)
    {
        echo $_POST['title'];
        echo " Article Changed, thank you";
    }
    else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}
if($type=="delete")
{
    echo $_POST['toDelete'];
    $sql = "DELETE from port_newsfeed WHERE title='".mysql_escape_string($_POST['toDelete'])."'";
    if ($db->query($sql) === TRUE)
    {
        echo " Article deleted, thank you";
    }
    else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}
?>
