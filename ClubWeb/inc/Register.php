<?php
/**
 * Created by PhpStorm.
 * User: 1611267
 * Date: 29/11/2016
 * Time: 12:44
 */

include('dbconnect.php');

$username = 'username';
$password = 'password';

$sql = "INSERT INTO port_users (username, password) VALUES ('". $username ."','" . $password . "')";

if(mysqli_query($db, $sql)) {
} else {
    echo "error" . $sql . "<br>" . mysqli_error($db);
}

?>