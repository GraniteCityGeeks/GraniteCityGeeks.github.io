
<?php
include("scripts/dbconnect.php");
$name = $_FILES['file']['name'];
$size = $_FILES['file']['size'];
$type = $_FILES['file']['type'];

$tmp_name = $_FILES['file']['tmp_name'];
$error = $_FILES['file']['error'];

if (isset($name)){
    if (!empty($name)){
        echo 'ok';
        $location = '/uploads/';

        move_uploaded_file($tmp_name)

    }
    else {
        echo 'Please choose a file';
    }
}

?>

<form action="upload.php" method="POST" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="file" <br> <br>
    <input type="submit" value="Upload Image" name="submit">
</form>
