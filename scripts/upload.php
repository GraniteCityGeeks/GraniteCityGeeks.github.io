
<?php
include("scripts/dbconnect.php");
$name = $_FILES['file']['name'];
$size = $_FILES['file']['size'];
$type = $_FILES['file']['type'];

$tmp_name = $_FILES['file']['tmp_name'];
$error = $_FILES['file']['error'];


if (isset($name)){
    if (!empty($name)){
        echo 'File Uploaded!';
        $location = '/uploads/';

       if( move_uploaded_file($tmp_name,$location.$name)){
           echo 'Uploaded!';
       }

    }
    else {
        echo 'Please choose a file';
    }
}

?>


