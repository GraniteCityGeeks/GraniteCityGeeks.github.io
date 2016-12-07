<?php
include ("scripts/header.php");
session_start();


echo "
<main>
<p>Welcome {$_SESSION['username']}! In this blog you will {$_SESSION['accessLevelID']} see all of my insights and wonderful things </p>
<p><img src={$_SESSION['photoID']} alt=\"Mountain View\" style=\"width:304px;height:228px;\"></p>
</main>
";
include ("scripts/footer.php");
?>