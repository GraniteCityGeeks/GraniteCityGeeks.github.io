<?php
include("scripts/header_l2.php");


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function renderForm($id, $username, $password,$bio,$photoID,$accessLevelID, $db){

    ?>
    <main>
    <form action="edit" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
            <p><strong>ID:</strong> <?php echo $id; ?></p>
            <strong>Username: *</strong> <input type="text" name="username" value="<?php echo $username; ?>"/><br/>
            <strong>Password: *</strong> <input type="text" name="password" value="<?php echo $password; ?>"/><br/>
            <strong>Bio:</strong>  <input type="text" name="bio" value="<?php echo $bio; ?>"></br>
            <input type="radio" name="accessLevelID" <?php if (isset($accessLevelID) && $accessLevelID=="2") echo "checked";?> value="2">Contributor<br>
            <input type="radio" name="accessLevelID" <?php if (isset($accessLevelID) && $accessLevelID=="3") echo "checked";?> value="3">NKPAG<br>
            <input type="radio" name="accessLevelID" <?php if (isset($accessLevelID) && $accessLevelID=="4") echo "checked";?> value="4">Club Administrator<br>
            <input type="radio" name="accessLevelID" <?php if (isset($accessLevelID) && $accessLevelID=="5") echo "checked";?> value="5">Site Administrator<br>
            <strong>PhotoID:</strong>  <input type="text" name="photoID" value="<?php echo $photoID; ?>"></br>
            <p><input type="submit" value="Submit"></p>
            </form>
        </main>
    </main>

    <?php

}

include('scripts/dbconnect.php');

$id = $params['userID'];

// Check if userID has a value
if (isset($params['userID'])) {

    // Get all attributes for that user
    $sql = "SELECT * FROM port_users WHERE userID='$id'";
    $result = mysqli_query($db, $sql);

//    if (!$result) {
//        printf("Error: %s\n", mysqli_error($db));
//        echo 'didnt work :(';
//        exit();
//    }

    $row = mysqli_fetch_array($result);


    // Check row has values
    if ($row) {
        // Assign values in row to variables
        $username = $row['username'];
        $password = $row['password'];
        $bio = $row['bio'];
        $photoID = $row['photoID'];
        $accessLevelID = $row['accessLevelID'];

        // Display the form with the user's current values
        renderForm($id, $username, $password, $bio, $photoID, $accessLevelID, $db);
    }
}

// Wait for submit button press
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo 'submit pressed';
    // Assign values from form to variables
    $newUsername = $_POST['username'];
    $newPassword = $_POST['password'];
    $newBio = $_POST['bio'];
    $newPhotoID = $_POST['photoID'];
    $newAccessLevelID = $_POST['accessLevelID'];
    $id = $_POST['id'];

    // Check if username or password is empty
    if ($newUsername == '' || $newPassword == '') {
        // Re-display form with existing values and inform user (no changes made)
        //renderForm($id, $username, $password,$bio,$photoID,$accessLevelID,$db);
        echo "Please make sure the user has a username and password";
    } else {
        // Update user's details in database
        echo 'updateUser called!';
        updateUser($id, $newUsername, $newPassword, $newBio, $newPhotoID, $newAccessLevelID, $db);
    }
}

function updateUser($id, $username, $password, $bio, $photoID, $accessLevelID, $db) {
    // Create query with new values
    $sql = "UPDATE port_users SET username='$username', password='$password', bio='$bio', accessLevelID='$accessLevelID', photoID='$photoID' WHERE userID='$id'";
    // Query database.
    var_dump($sql);
    if (mysqli_query($db, $sql)) {
        echo "User updated!";
    } else {
        // Report error if unsuccessful
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }

    mysqli_close($db);
}

    
//    if (isset($_POST['submit'])) {
//
//        if (isset($_POST['id'])) {
//
//            $id = $_POST['id'];
//            $username = $_POST['username'];
//            $password = $_POST['password'];
//            $bio = $_POST['bio'];
//            $photoID = $_POST['photoID'];
//            $accessLevelID = $_POST['accessLevelID'];
//
//
//        if ($username == '' || $password == '') {
//
//            renderForm($id, $username, $password,$bio,$photoID,$accessLevelID,$db);
//            echo "Please make sure they have a username and password";
//
//
//        } else {
//
//            mysqli_query($db,"UPDATE port_users SET username ='$username', password ='$password', bio ='$bio',photoID ='$photoID', accessLevelID ='$accessLevelID' WHERE userID='$id'");
//            header("Location: /ClubWeb/View");
//        }
//
//        } else {
//
//            echo 'Error!';
//
//        }
//
//    } else {
//
//
//        echo 'Whit!';
//
//
//    }

?>