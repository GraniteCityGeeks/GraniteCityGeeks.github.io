<?php
$clubarticleid = $params['clubarticleid'];
include("scripts/dbconnect.php");

if (isset($params['clubarticleid']))

{

    $sql = "UPDATE port_club_article SET confirmed = '1' WHERE clubarticleid='$clubarticleid'";
    $result = $db->query($sql);

    header("Location: /ClubWeb/ViewArticles");

}

else

{
    header("Location: /ClubWeb/ViewArticles");
}



?>