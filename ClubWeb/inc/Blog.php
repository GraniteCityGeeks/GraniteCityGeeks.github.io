<?php
include("scripts/dbconnect.php");
include("scripts/Header.php");
echo "
<main>
<h2>Blog Articles</h2>
<p>Below is a list of all blog articles</p>
<ul>
";
$sql = "SELECT * FROM blogArticles ";
$result = $db->query($sql);
while($row = $result->fetch_array())
{
    $articleID = $row['articleID'];
    $articleName = $row['articleName'];
    $articleAuthor = $row['articleAuthor'];
    echo "<li><a href='blog/{$articleID}'>{$articleName}</a> by {$articleAuthor}</
li>";
}
echo "
</main>
";
include("scripts/Footer.php");
?>