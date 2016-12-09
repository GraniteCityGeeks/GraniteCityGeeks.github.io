<?php
include("scripts/header.php");


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function renderForm($id, $username, $password,$bio,$photoID,$accessLevelID, $db){

    ?>
    <main>
    <form action="" method="post">
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

if (isset($_POST['submit'])) {

    if (isset($_POST['id'])) {

        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $bio = $_POST['bio'];
        $photoID = $_POST['photoID'];
        $accessLevelID = $_POST['accessLevelID'];


        if ($username == '' || $password == '') {

            renderForm($id, $username, $password,$bio,$photoID,$accessLevelID,$db);
            echo "Please make sure they have a username and password";


        } else {

            mysqli_query($db,"UPDATE port_users SET username ='$username', password ='$password', bio ='$bio',photoID ='$photoID', accessLevelID ='$accessLevelID' WHERE userID='$id'");
            header("Location: /ClubWeb/View");
        }

    } else {

        echo 'Error!';

    }

} else {



    $id = $params['userID'];

    if (isset($params['userID'])) {

        $result = mysqli_query($db,"SELECT * FROM port_users WHERE userID=$id");

        $row = mysqli_fetch_array($result);

        if($row) {

            $username = $row['username'];
            $password = $row['password'];
            $bio = $row['bio'];
            $photoID = $row['photoID'];
            $accessLevelID = $row['accessLevelID'];
            renderForm($id, $username, $password,$bio,$photoID,$accessLevelID,$db);

        } else {

            echo "No results!";

        }

    } else {

        echo 'Error!';

    }

}

?>