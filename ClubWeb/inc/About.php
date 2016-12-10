<?php
include("scripts/header.php");
echo "
<main>
<p>Welcome {$_SESSION['username']}! <br>You have an access level of: {$_SESSION['accessLevelID']} <br>your userID is: {$_SESSION['userID']}
</main>
";
include("scripts/footer.php");
?>