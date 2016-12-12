<?php
/**
 * Created by PhpStorm.
 * User: 1608354
 * Date: 17/10/2016
 * Time: 15:58
 */

$db = new mysqli(
    "eu-cdbr-azure-west-a.cloudapp.net",
    "b169b5e27239e9",
    "a6f9898c",
    "dbjamielaw");

if ($db->connect_errno){
    die('Connectfailed['.$db->connect_error.']');
}

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


