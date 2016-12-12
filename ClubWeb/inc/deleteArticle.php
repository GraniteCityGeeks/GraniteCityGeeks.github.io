<?php
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