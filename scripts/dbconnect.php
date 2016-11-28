<?php

$db = new mysqli("eu-cdbr-azure-north-e.cloudapp.net","baa0a9a8051f1c","a6f9898c","dbjamielaw");

if ($db->connect_errno) {
    die ('Connection Failed :'.$db->connect_error );
}


?>

