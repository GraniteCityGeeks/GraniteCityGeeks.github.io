<?php

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
            <strong>First Name: *</strong> <input type="text" name="username" value="<?php echo $username; ?>" /><br/>
            <strong>Last Name: *</strong> <input type="text" name="password" value="<?php echo $password; ?>" /><br/>
            <p>* required</p>
            <input type="submit" name="Add" value="Add">
        </div>
    </form>

    </body>

    </html>

    <?php

}

// connect to the database

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

// generate error message

        $error = 'ERROR: Please fill in all required fields!';



// if either field is blank, display the form again

        renderForm($username, $password, $error);

    }

    else

    {

// save the data to the database

        mysqli_query("INSERT INTO port_users SET username='$username', password='$password'")

        or die(mysqli_error());



// once saved, redirect back to the view page

        header("location:./view");

    }

}

else

// if the form hasn't been submitted, display the form

{

    renderForm('','','');

}

?>