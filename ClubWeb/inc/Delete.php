<?php

include("scripts/dbconnect.php");

if (isset($_GET['userID']) && is_numeric($_GET['userID']))

{

    $id = $_GET['userID'];

    $result = ("DELETE FROM port_users WHERE userID=$id");

    header("Location: view");

}

else

{
    header("Location: view");
}



?>