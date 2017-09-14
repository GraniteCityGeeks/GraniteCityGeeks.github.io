<?php
$userID = $params['clubid'];
include("scripts/dbconnect.php");

if (isset($params['clubid']))

{

    $sql = "DELETE FROM port_club WHERE clubid=$clubid";
    $result = $db->query($sql);

    header("Location: /ClubWeb/editclubs");

}

else

{
    header("Location: /ClubWeb/editclubs");
}



?>
