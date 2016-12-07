<?php
include ("scripts/header.php");
session_start();

$photo = $_SESSION['photoID'];
echo "
<main>
<p>Welcome {$_SESSION['username']}! In this blog you will {$_SESSION['accessLevelID']} see all of my insights and wonderful things yo</p>
<p><img src=[$photo} alt=\"Mountain View\" style=\"width:304px;height:228px;\"></p>
</main>
";
include ("scripts/footer.php");
?>