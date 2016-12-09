<?php
include('../webPages/dbconnect.php');

$type = $_POST['type'];


if($type=="insert") {
    $sql = "INSERT INTO port_newsfeed (title, text) VALUES ('" .htmlspecialchars($_POST['title']). "', '" .htmlspecialchars($_POST['desc']). "')";
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
    $sql = "UPDATE port_newsfeed SET title='".htmlspecialchars($_POST['title'])."',text='".htmlspecialchars($_POST['desc'])."'WHERE title='".htmlspecialchars($_POST['oldTitle'])."'";

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
    $sql = "DELETE from port_newsfeed WHERE title='".htmlspecialchars($_POST['toDelete'])."'";

    if ($db->query($sql) === TRUE)
    {
        echo " Article deleted, thank you";
    }
    else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}




?>


