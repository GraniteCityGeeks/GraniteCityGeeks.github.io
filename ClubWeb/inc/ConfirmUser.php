<?php
$userID = $params['userID'];
include("scripts/dbconnect.php");

if (isset($params['userID']))

{

    $sql = "UPDATE port_users SET confirmed = '1' WHERE userID='$userID'";
    $result = $db->query($sql);

    header("Location: /ClubWeb/View");

}

else

{
    header("Location: /ClubWeb/View");
}



?>