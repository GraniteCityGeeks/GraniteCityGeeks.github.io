<?php
include ("scripts/header.php");
session_start();

echo "
<main>
<p>Welcome {$_SESSION['username']}! You have an access level of: {$_SESSION['accessLevelID']} your userID is: {$_SESSION['userID']} and Profile pic is: <img src={$_SESSION['photoID']} alt=\"Mountain View\" style=\"width:304px;height:228px;\"></p>
</main>
";
include ("scripts/footer.php");
?>