<?php

include("scripts/dbconnect.php");

if (isset($_GET['userID']) && is_numeric($_GET['userID']))

{

    $userID = $_GET['userID'];

    $sql = "DELETE FROM port_users WHERE userID=$userID";
    $result = $db->query($sql);

    header("Location: View.php");

}

else

{
    header("Location: View.php");
}



?>