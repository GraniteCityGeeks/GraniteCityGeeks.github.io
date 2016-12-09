<?php
/**
 * Created by PhpStorm.
 * User: Mr_Law
 * Date: 12/1/2016
 * Time: 4:32 PM
 */

include("../scripts/dbconnect.php");
$ID =
$query = "DELETE FROM port_markers WHERE id = formid";
$result = $db->query($query);

