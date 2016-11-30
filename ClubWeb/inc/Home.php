<?php
include ("scripts/header.php");
session_start();
//$username_cookie = $_COOKIE['username_cookie'];
$_SESSION['$username'] = $myusername;

echo "
<main>
<p>Welcome {$myusername}! In this blog you will see all of my insights and wonderful things</p>
</main>
";
include ("scripts/footer.php");
?>