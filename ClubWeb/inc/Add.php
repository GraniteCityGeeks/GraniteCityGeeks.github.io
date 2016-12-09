<?php
include("scripts/header.php");
?>
    <main>
        <form action="add" method="post">
            <input type="text" name="username" placeholder="username"></br>
            <input type="password" name="password" placeholder="password"></br>
            <input type="text" name="bio" placeholder="bio"></br>
            <input type="text" name="photoID" placeholder="Insert URL of Image here"></br>
            <input type="radio" name="accessLevelID" value= "2" > Contributor<br>
            <input type="radio" name="accessLevelID" value="3"> NKPAG<br>
            <input type="radio" name="accessLevelID" value="4"> Club Administrator<br>
            <input type="radio" name="accessLevelID" value="5"> Site Administrator<br>
            <p><input type="submit" value="Submit"></p>
        </form>
    </main>

<?
include("scripts/Footer.php");

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

include("scripts/dbconnect.php");

$username = $_POST['username'];
$password = $_POST['password'];
$bio = $_POST['bio'];
$accessLevelID = $_POST['accessLevelID'];
$photoID = $_POST['photoID'];

if (checkUsers($username, $db)) {
    $sql = "INSERT INTO port_users (username, password,bio,photoID,accessLevelID) VALUES ('$username', '$password','$bio','$photoID', '$accessLevelID')";

    if (mysqli_query($db, $sql)) {
        echo "New record created succesfully";

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }

    mysqli_close($db);
} elseif ($username == '' || $password == ''){
    echo "Please enter a username and password";
}
else{
    echo "User already exists";
}

function checkUsers($username, $db){
    $sql = "SELECT username FROM port_users";
    $result = mysqli_query($db, $sql);

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        if ($row['username'] == $username) {
            return false;
        }
    }
    return true;
}