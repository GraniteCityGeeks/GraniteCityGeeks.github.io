<?php
$userID = $params['userID'];
include("scripts/dbconnect.php");

if (isset($params['userID']))

{

    $sql = "DELETE FROM port_users WHERE userID=$userID";
    $result = $db->query($sql);

    header("Location: /ClubWeb/View");

}

else

{
    header("Location: /ClubWeb/View");
}



?>