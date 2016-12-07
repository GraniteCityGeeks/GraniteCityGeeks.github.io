<?php
include ("scripts/header.php");
session_start();

echo "
<main>
<p>Welcome {$_SESSION['username']}! You have an access level of: {$_SESSION['accessLevelID']} your userID is: {$_SESSION['userID']} and Profile pic is: {$_SESSION['photoID']}</p>
</main>
";
include ("scripts/footer.php");
?>