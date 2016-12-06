<?php

include("scripts/dbconnect.php");

if (isset($_POST['userID']) && is_numeric($_POST['userID']))

{

    $id = $_POST['userID'];

    $sql = "DELETE FROM port_users WHERE userID=$id";
    $result = $db->query($sql);

    header("Location: view");

}

else

{
    header("Location: view");
}



?>