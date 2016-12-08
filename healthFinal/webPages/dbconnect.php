<?php
/**
 * Created by PhpStorm.
 * User: 1608354
 * Date: 17/10/2016
 * Time: 15:58
 */

$db = new mysqli(
    "eu-cdbr-azure-west-a.cloudapp.net",
    "b169b5e27239e9",
    "a6f9898c",
    "dbjamielaw");

if ($db->connect_errno){
    die('Connectfailed['.$db->connect_error.']');
}