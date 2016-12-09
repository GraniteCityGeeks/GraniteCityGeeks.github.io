<?php
include '../navBar/master.php';
?>

<!DOCTYPE html>
<html lang="en">
<link href="../CSS/bootstrap.min.css" rel="stylesheet" />
<link href="../CSS/half-slider.css" rel="stylesheet" />
<link href="../CSS/healthPage.css" rel="stylesheet" />

<header id="myCarousel" class="carousel slide">
    <div class="carousel-inner">
        <div class="item active">
            <div class="fill" style="background-image: url('../Images/gym-wallpaper-workout.jpg')"></div>
        </div>
        <div class="item">
            <div class="fill" style="background-image: url('../Images/healthyfood.jpg')"></div>

        </div>
        <div class="item">
            <div class="fill" style="background-image: url('../Images/hills.jpg')"></div>

        </div>
    </div>
</header>

<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>

<script>
    $('.carousel').carousel({
        interval: 5000
    })
</script>


<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>Healthy Lifestyle</h1>
            <i>This page will contain helpful information, tips & tricks for staying healthy!</i>
        </div>
    </div>
    <hr class="pacman" />

        <h2>News Feed!</h2>

    </div>

<ul class="ulProducts" runat="server" id="newsFeed">
    <?php
    include('dbconnect.php');
    /* this script loads the article the user clicked on.*/

    $sql = "SELECT * FROM port_newsfeed";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo '<li class="display2"><b>'.$row["title"].'</b><br>'.$row["text"].'</li>';
        }
    }
    else {
        echo "0 results";
    }
    $db->close();
    ?>
    </ul>

<br>

<div class="container">
<h2>Community Spotlight!</h2>

<hr class="pacman"/>
</div>
    <ul class="ulProducts" runat="server" id="newsFeed">


<?php
include('dbconnect.php');
/* this script loads the article the user clicked on.*/

$sql = "SELECT * FROM port_articles";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<li class="display"><b>'.$row["title"].'</b><br>'.$row["text"].'</li>';
    }
}
else {
    echo "0 results";
    }
$db->close();
?>
</ul>

</html>
