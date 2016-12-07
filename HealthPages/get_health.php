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

    <?php
    include('dbconnect.php');
    ?>
</head>
<style>
    body{
        padding:10px 10px 10px 10px;
        text-align: center;
    }
    a{
        text-decoration: none;
    }
    #nav{
        overflow: hidden;
        text-align:center;
        padding:0px 0px 0px 0px;
        border-bottom:1px solid #000;
    }
    #nav a{
        font-size:20px;
        padding:10px 20px 10px 10px;
        color:#000;
        font-weight:bold;
        cursor:pointer;
        display: inline-block;
    }
    #header-h{
        text-align: center;
    }
</style>

<div id="nav">
    <a href="http://gcg.azurewebsites.net/">HOME</a>
    <a href="http://gcg.azurewebsites.net/maps">MAPS</a>
    <a href="http://gcg.azurewebsites.net/ClubWeb">CLUBS</a>
    <a href="http://gcg.azurewebsites.net/healthpages/health.php">HEALTH</a>
</div>
<?php

/* this script loads the article the user clicked on.*/

$id = $_GET['id'];
$sql = "SELECT * FROM port_articles WHERE articleid = $id";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<h1>';
        echo $row["title"];
        echo '</h1>';
        echo '</br>';
        echo '</br>';
        echo '<p>';
        echo $row["text"];
        echo '</p>';
    }
} else {
    echo "0 results";
}
$db->close();
?>
</body>

</html>
