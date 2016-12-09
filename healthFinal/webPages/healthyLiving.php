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
    <li class ="display2">
        <b>Healthy Body</b>
        <br>
        Excessive body fat can be caused by many factors: over eating due to stress, unbalanced diet and not enough exercise to name a few. It's really easy
        to gain weight and even easier not to do anything about it. This page will explain why you need to lose weight and methods on how to lose weight
    </li>
    <li class ="display2">
        <b>Healthy Mind</b>
        <br>
        The key to a healthy lifestyle is not just having a healthy body; but also having a healthy mental state. Stress, anxiety, depression can all cause negative
        impact on your day to day life and could even lead to self neglect. Confidence is also a big factor in a healthy lifestyle; having the courage to welcome new
        things into your life can lead to great opportunities
    </li>
    <li class ="display2">
        <b>Healthy Foods!</b>
        <br>
        You are what you eat! Eat healthy be healthy! This segments is all about those delicious greens and rather plane breakfast cereals, it's all about watching those
        calories and maintaining a balanced diet. Try stay away from junk food, but if you can't resist then don't stress too much just eat in moderation. A healthy diet
        will do wonders: weight loss, more energy and just a great feeling!
    </li>
    <li class ="display2">
        <b>Change of Scene!</b>
        <br>
        Need a change of pace? Need that holiday? There's no need to travel to foreign countries, take some time to look around and you will find plenty of amazing places in
        Scotland. Just walking through the woods, or a small cycle or a hike up a hill will do wonders to the soul. Taking time for you is very important and will also help
        towards a healthy life
    </li>
    </ul>
<div class="container">
    <hr class="pacman" />
    </div>


<br>

<div class="container">
<h2>Community Spotlight!</h2>
    </div>
<hr class="pacman"/>
    <ul class="ulProducts" runat="server" id="newsFeed">
.

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
