<?php
include '../navBar/master.php';

?>

<!DOCTYPE html>
<html lang="en">
<link href="/healthFinal/CSS/bootstrap.min.css?version=51" rel="stylesheet" />
<link href="../CSS/half-slider.css?version=51" rel="stylesheet" />
<link href="../CSS/healthPage.css?version=51" rel="stylesheet" />


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


<div class="container" >
    <div class="row">
        <div class="col-lg-12">
            <h1>Healthy Lifestyle</h1>
            <i>This page will contain helpful information, tips & tricks for staying healthy!</i>
        </div>
    </div>
    <hr class="pacman" />





<ul class="ulProducts" runat="server" id="newsFeed" style="background-color: #f5f5f5">
    <h2>News Feed!</h2>
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
</div>
<br>

<div class="container">
<h2>Community Spotlight!</h2>
<i>Articles published by users of this site!</i>
<hr class="pacman"/>

    <ul class="ulProducts" runat="server" id="newsFeed" style="background-color: #f5f5f5">
<h2>Article Titles! </h2>

<?php
include('dbconnect.php');
/* this script loads the article the user clicked on.*/

$sql = "SELECT * FROM port_articles";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<li class="display"><b>'.$row["title"].'</b><br>'.$row["text"].'</li><br>';

    }
}
else {
    echo "0 results";
    }
$db->close();
?>
</ul>



</div>

<div class="container" >
    <div class="row">
        <div class="col-lg-12">
            <div id="twitter" style="float:left;">
                <a class="twitter-timeline"  data-width="1550" data-height="700" d href="https://twitter.com/bbchealth">Tweets by bbchealth</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
            </div>
        </div>
    </div>


<?php
include '../webPages/footer.html';
?>


</html>
