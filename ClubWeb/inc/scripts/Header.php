<?
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<link href="http://gcg.azurewebsites.net/healthFinal/CSS/NavbarMaster.css" rel="stylesheet" />
<head runat="sever">

    <meta charset="UTF-8">
    <title>Sportlethen</title>

</head>

<body class="master-body">
<form id="form1" runat="server" style="height: 50px">
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
        <ul>
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
                echo "<li><a href='clubarticle'>Creat Club Article</a></li>";
                echo "<li><a href='modifyclub'>modify your Club</a></li>";
                echo "<li><a href='MarkerAdmin'>Create Map Info</a></li>";
                echo "<li><a href='view'>View Users</a></li>";
                echo "<li><a href='ViewArticles'>View Articless</a></li>";
            } else {
            }
            ?>

        </ul>
    </nav>
</header>

<header id="myCarousel" class="carousel slide">
    <div class="carousel-inner">
        <div class="item active">
            <div class="fill" style="background-image: url('http://gcg.azurewebsites.net/healthFinal/Images/train.jpg')"></div>
        </div>
        <div class="item">
            <div class="fill" style="background-image: url('http://gcg.azurewebsites.net/healthFinal/Images/rain.jpg')"></div>

        </div>
        <div class="item">
            <div class="fill" style="background-image: url('http://gcg.azurewebsites.net/healthFinal/Images/tree.jpg')"></div>

        </div>
    </div>
</header>

<script src="http://gcg.azurewebsites.net/healthFinal/js/jquery.js"></script>
<script src="http://gcg.azurewebsites.net/healthFinal/js/bootstrap.min.js"></script>

<script>


    $('.carousel').carousel({
        interval: 5000
    })

</script>
