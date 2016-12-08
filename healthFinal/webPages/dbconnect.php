<?php
$db = new mysqli("eu-cdbr-azure-west-a.cloudapp.net","eu-cdbr-azure-west-a.cloudapp.net","a6f9898c","dbjamielaw");
if ($db->connect_errno) {
    die ('Connection Failed :'.$db->connect_error );
}
