<?php
include('../webPages/dbconnect.php');

$type = $_POST['type'];


if($type=="insert") {
    $sql = "INSERT INTO port_articles (title, text) VALUES ('" .mysqli_real_escape_string($_POST['title']). "', '" .mysqli_real_escape_string($_POST['desc']). "')";
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
    $sql = "UPDATE port_articles SET title='".mysqli_real_escape_string($_POST['title'])."',text='".mysqli_real_escape_string($_POST['desc'])."'WHERE title='".mysqli_real_escape_string($_POST['oldTitle'])."'";

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
    $sql = "DELETE from port_articles WHERE title='".mysqli_real_escape_string($_POST['toDelete'])."'";

    if ($db->query($sql) === TRUE)
    {
        echo " Article deleted, thank you";
    }
    else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}




?>


