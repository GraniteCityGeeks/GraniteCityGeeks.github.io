<?php
$username = $_POST["username"];
include ("scripts/header.php");
echo "
<main>
<p>Welcome {$username}! In this blog you will see all of my insights and wonderful things</p>
</main>
";
include ("scripts/footer.php");
?>