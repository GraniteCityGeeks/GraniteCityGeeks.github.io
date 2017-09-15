<?php
include("scripts/header.php");


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function renderForm($id, $title, $description,$genreID,$photoID,$clubcalendar, $ownerID){

    ?>
    <main>
    <form action="editclub" method="post">
            <input type="hidden" name="clubid" value="<?php echo $id; ?>"/>
            <p><strong>ID:</strong> <?php echo $id; ?></p>
            <strong>Title: *</strong> <input type="text" name="clubTitle" value="<?php echo $title; ?>"/><br/>
            <strong>Description: *</strong> <input type="text" name="description" value="<?php echo $description; ?>"/><br/>
            <p><input type="submit" value="Submit"></p>
            </form>
        </main>
    </main>

    <?php

}

include('scripts/dbconnect.php');

$id = $params['clubid'];

// Check if userID has a value
if (isset($params['clubid'])) {

    // Get all attributes for that user
    $sql = "SELECT * FROM port_club WHERE clubid='$id'";
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
        $id = $row['clubid'];
        $title = $row['clubTitle'];
        $description = $row['description'];

        // Display the form with the user's current values
        renderForm($id, $title, $description);
    }
}

// Wait for submit button press
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo 'submit pressed';
    // Assign values from form to variables
    $newTitle = $_POST['clubTitle'];
    $newDescription = $_POST['description'];

    // Check if title or description is empty
    if ($newTitle == '' || $newDescription == '') {
        // Re-display form with existing values and inform user (no changes made)
        //renderForm($id, $username, $password,$bio,$photoID,$accessLevelID,$db);
        echo "Please make sure the club has a title and description";
    } else {
        // Update user's details in database
        echo 'updateClub called!';
        updateClub($newID, $newTitle, $newDescription, $db);
    }
}

function updateClub($id, $title, $description, $db) {
    // Create query with new values
    $sql = "UPDATE port_club SET clubid = '$id', clubTitle='$title', description='$description' WHERE clubid='$id'";
    // Query database.
    var_dump($sql);
    if (mysqli_query($db, $sql)) {
        echo "Club updated!";
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
