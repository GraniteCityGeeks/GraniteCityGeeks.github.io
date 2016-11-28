<?php

$db = new mysqli("eu-cdbr-azure-north-e.cloudapp.net","baa0a9a8051f1c","ea0c77dc","marvel");

if ($db->connect_errno) {
    die ('Connection Failed :'.$db->connect_error );
}


?>

