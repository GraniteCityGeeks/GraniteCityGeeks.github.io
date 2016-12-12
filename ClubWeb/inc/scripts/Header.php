<?
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<link href="/basicstyle.css" rel="stylesheet" />
<head>

    <meta charset="UTF-8">
    <title>Sportlethen</title>

</head>

<body>
<header>
    <a href="/index.php"><h1>Go Portlethen</h1></a>
    <?
    if (isset($_SESSION['username'])) {
        echo "<h3><a href='logout'>Logout({$_SESSION['username']})<img src={$_SESSION['photoID']} alt=\"Mountain View\" style=\"width:35px;height:35px;\"></a></h3>";
    } else {
        echo "<h3><a href='login'>Login</a></h3>";
        echo "<h3><a href='register'>Register</a></h3>";
    }
    ?>
    <nav>
        <ul id="nav">
            <li><a href="./">Home Page</a></li>
            <li><a href="mapsindex">Maps</a></li>
            <li><a href="viewclubs">Clubs</a></li>
            <li><a href="http://gcg.azurewebsites.net/ClubWeb/index">Health</a></li>
            <?
            if ($_SESSION['accessLevelID'] == 2){
                echo "<li><a href='clubarticle'>Add Club Article</a></li>";
                echo "<li><a href='MarkerAdmin'>Create Map Info</a></li>";
            } else if ($_SESSION['accessLevelID'] == 3){
                echo "<li><a href='MarkerAdmin'>Maps Editing</a></li>";
            } else if ($_SESSION['accessLevelID'] == 4){
                echo "<li><a href='createclub'>Create Club</a></li>";
                echo "<li><a href='create_club_article'>Creat Club Article</a></li>";
            } else if ($_SESSION['accessLevelID'] == 5){
                echo "<li><a href='createclub'>Create Clubs</a></li>";
                echo "<li><a href='clubarticle'>Create Club Article</a></li>";
                echo "<li><a href='modifyclub'>modify your Club</a></li>";
                echo "<li><a href='MarkerAdmin'>Create Map Info</a></li>";
                echo "<li><a href='view'>View Users</a></li>";
                echo "<li><a href='ViewArticles'>View Articles</a></li>";
            } else {
            }
            ?>

        </ul>
    </nav>
</header>
