<?php
include("scripts/header.php");
function renderForm($id, $username, $password, $error){

    if ($error != '')

    {

        echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';

    }

    ?>
    <main>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
        <div>
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

            renderForm($id, $username, $password, $error);

        } else {

            $sql = "UPDATE port_users SET username='$username', password='$password' WHERE id='$id'";
            $result = query($sql);

            header("Location: /ClubWeb/View");
        }

    } else {

        echo 'Error!';

    }

} else {



    $id = $params['userID'];

    if (isset($params['userID']) && is_numeric($params['userID']) && ($params['userID']) > 0)

    {

// query db

        $id = ($params['userID']);

        $result = "SELECT * FROM port_users WHERE id=$id";

        $row = $result->fetch_array();

        if($row) {

            $username = $row['username'];

            $password = $row['password'];

            renderForm($id, $username, $password, '');

        } else {

            echo "No results!";

        }

    } else {

        echo 'Error!';

    }

}

?>