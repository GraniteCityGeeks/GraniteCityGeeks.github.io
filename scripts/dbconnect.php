<?php
$db = new mysqli("eu-cdbr-azure-west-a.cloudapp.net","b169b5e27239e9","a6f9898c","dbjamielaw");
if ($db->connect_errno) {
    die ('Connection Failed :'.$db->connect_error );
}
