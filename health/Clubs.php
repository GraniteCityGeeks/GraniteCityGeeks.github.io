<?php
include 'master.php';
?>

<!DOCTYPE html>
<html lang="en">
<link href="../Maps/bootstrap.min.css" rel="stylesheet" />
<link href="half-slider.css" rel="stylesheet" />

<header id="myCarousel" class="carousel slide">
    <div class="carousel-inner">
        <div class="item active">
            <div class="fill" style="background-image: url('images/train.jpg');"></div>
        </div>
        <div class="item">
            <div class="fill" style="background-image: url('images/rain.jpg');"></div>

        </div>
        <div class="item">
            <div class="fill" style="background-image: url('images/tree.jpg');"></div>

        </div>
    </div>
</header>

<body>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>Clubs</h1>
        </div>
    </div>

    <hr />
</div>


<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script>
    $('.carousel').carousel({
        interval: 5000
    })
</script>

</body>

</html>



