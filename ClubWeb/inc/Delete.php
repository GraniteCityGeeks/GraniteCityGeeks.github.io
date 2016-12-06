<?php

include("scripts/dbconnect.php");

$userID = $params['userID'];

if (isset($_GET['userID']) && is_numeric($_GET['userID']))

{

    $id = $_GET['userID'];

    $sql = "DELETE FROM port_users WHERE userID=$id";
    $result = $db->query($sql);

    header("Location: view");

}

else

{
    header("Location: view");
}



?>