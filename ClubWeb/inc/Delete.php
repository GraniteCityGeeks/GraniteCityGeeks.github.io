<?php
$userID = $params['clubID'];
include("scripts/dbconnect.php");

if (isset($params['clubID']))

{

    $sql = "DELETE FROM port_club WHERE clubid=$clubID";
    $result = $db->query($sql);

    header("Location: /ClubWeb/editclubs");

}

else

{
    header("Location: /ClubWeb/editclubs");
}



?>
