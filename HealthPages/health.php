<html>
<head>
    <meta charset="utf-16">
    <meta name="test site">
    <title>Health Page</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<h1>List of all health articles and posts.</h1>
<br/>
<?php
include('dbconnect.php');
/* this script loads all the health articles from the db and displays them as a link.
The user can click the ling and be redirected to the indiviidual article page.*/

$sql = "SELECT articleid, title FROM port_articles";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<a href='get_health.php?id=" . $row["articleid"]. "'>" . $row["title"]. "</a></br></br>";
    }
} else {
    echo "0 results";
}
$db->close();
?>
<br/>
<a style="font-size:20px;"href="add_article.php">Click here to add a health article.</a>
</body>

</html>