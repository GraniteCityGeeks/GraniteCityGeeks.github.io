<?php

include("scripts/Footer.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function renderForm($username, $password, $error)
{

    include("scripts/header.php");

    if ($error != '')
    {
        echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
    }

    ?>

    <form action="" method="post">
        <div>
            <strong>Username: *</strong> <input type="text" name="username" value="<?php echo $username; ?>" /><br/>
            <strong>Password: *</strong> <input type="text" name="password" value="<?php echo $password; ?>" /><br/>
            <p>* required</p>
            <input type="submit" name="submit" value="Submit">
        </div>
    </form>

    </body>

    </html>

    <?php

}

include("scripts/dbconnect.php");

// check if the form has been submitted. If it has, start to process the form and save it to the database

if (isset($_POST['submit']))

{
// get form data, making sure it is valid

    $username = $_POST["username"];

    $password = $_POST["password"];

// check to make sure both fields are entered

    if ($username == '' || $password == '')

    {
        $error = 'ERROR: Please fill in all required fields!';

        renderForm($username, $password, $error);
    } else {

        mysqli_query("INSERT INTO port_users (username, password) VALUES ('$username', '$password')");
    }

} else {
    renderForm('','','');
}

?>