<?php
include ("scripts/header.php");
session_start();


echo "
<main>
<p>Welcome {$_SESSION['username']}! In this blog you will {$accessID} see all of my insights and wonderful things</p>
</main>
";
include ("scripts/footer.php");
?>