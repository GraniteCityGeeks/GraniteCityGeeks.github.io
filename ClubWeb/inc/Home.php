<?php
include ("scripts/header.php");
session_start();

echo "
<main>
<p>Welcome {$_SESSION['username']}! In this blog you will {$_SESSION['accessLevelID']} see all of my insights and wonderful things yo {$_SESSION['photoID']}</p>
</main>
";
include ("scripts/footer.php");
?>