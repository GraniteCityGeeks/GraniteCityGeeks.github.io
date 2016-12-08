<?php
include("scripts/header.php");


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function renderForm($id, $username, $password){

    ?>
    <main>
    <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
            <p><strong>ID:</strong> <?php echo $id; ?></p>
            <strong>First Name: *</strong> <input type="text" name="username" value="<?php echo $username; ?>"/><br/>
            <strong>Last Name: *</strong> <input type="text" name="password" value="<?php echo $password; ?>"/><br/>
            <p>* Required</p>
            <input type="submit" name="submit" value="Submit">
    </main>

    <?php

}

include('scripts/dbconnect.php');

if (isset($_POST['submit']))
{

    if (is_numeric($_POST['id'])) {

        $id = $_POST['id'];

        $username = $_POST['username'];

        $password = $_POST['password'];


        if ($username == '' || $password == '') {
            $error = 'ERROR: Please fill in all required fields!';

            renderForm($id, $username, $password);

        } else {

            $sql = "UPDATE port_users SET username='$username', password='$password' WHERE userID='$id'";
            $result = query($sql);

            header("Location: /ClubWeb/View");
        }

    } else {

        echo 'Error!';

    }

} else {



    $id = $params['userID'];

    if (isset($params['userID']))

    {

        $result = mysqli_query("SELECT * FROM port_users WHERE userID=$id")
        or die(mysqli_error());

        $row = mysqli_fetch_array($result);

        if($row) {

            $username = $row['username'];

            $password = $row['password'];

            renderForm($id, $username, $password);

        } else {

            echo "No results!";

        }

    } else {

        echo 'Error!';

    }

}

?>