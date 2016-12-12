<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$clubarticleid = $params['clubarticleid'];
include("scripts/dbconnect.php");

if (isset($params['clubarticleid']))

{

    $sql = "DELETE FROM port_club_article WHERE clubarticleid=$clubarticleid";
    $result = $db->query($sql);

    header("Location: /ClubWeb/ViewArticles");

}

else

{
    header("Location: /ClubWeb/ViewArticles");
}



?>