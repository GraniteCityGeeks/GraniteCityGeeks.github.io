<!DOCTYPE html>
<html lang="en">

<head runat = "server">
    <title>
        Discover Aberdeen
    </title>


    <link href="http://gcg.azurewebsites.net/healthFinal/CSS/NavbarMaster.css" rel="stylesheet" />

</head >

<body class="master-body">
<form id="form1" runat="server" style="height: 50px">
    <header >
        <nav>
            <ul>
                <li><a href="http://gcg.azurewebsites.net/ClubWeb/"><b>Home</b></a></li>
                <li>
                    <a href="http://gcg.azurewebsites.net/ClubWeb/viewclubs"><b>Clubs</b></a>
                </li>
                <li><a href="http://gcg.azurewebsites.net/ClubWeb/healthyLiving"><b>Healthy Living</b></a></li>
                <li><a href="http://gcg.azurewebsites.net/ClubWeb/mapsindex"><b>Maps</b></a></li>
                <li><a href="#"><b>Site Users</b></a>
                    <ul>
                        <li><a href="#">Admin</a>
                            <ul>
                                <li><a href="http://gcg.azurewebsites.net/ClubWeb/adminpage">Articles</a></li>
                            </ul></li>
                        <li><a href="#">Contributor</a>
                            <ul>
                                <li><a href="http://gcg.azurewebsites.net/ClubWeb/contributorPage">Articles</a></li>

                            </ul>
                    </ul>
                </li>

            </ul>

        </nav>

    </header>
</form>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<link href="http://gcg.azurewebsites.net/healthFinal/CSS/bootstrap.min.css?version=51" rel="stylesheet" />
<link href="http://gcg.azurewebsites.net/healthFinal/CSS/half-slider.css?version=51" rel="stylesheet" />
<link href="http://gcg.azurewebsites.net/healthFinal/CSS/healthPage.css?version=51" rel="stylesheet" />
<link href="http://gcg.azurewebsites.net/healthFinal/CSS/footer-basic-centered.css?version=51" rel="stylesheet" />


<header id="myCarousel" class="carousel slide">
    <div class="carousel-inner">
        <div class="item active">
            <div class="fill" style="background-image: url('http://gcg.azurewebsites.net/healthFinal/Images/gym-wallpaper-workout.jpg')"></div>
        </div>
        <div class="item">
            <div class="fill" style="background-image: url('http://gcg.azurewebsites.net/healthFinal/Images/healthyfood.jpg')"></div>

        </div>
        <div class="item">
            <div class="fill" style="background-image: url('http://gcg.azurewebsites.net/healthFinal/Images/hills.jpg')"></div>

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


<footer class="footer-basic-centered">

    <p class="footer-company-motto">Discover Aberdeen</p>

    <p class="footer-links">
        <a href="http://gcg.azurewebsites.net/ClubWeb/index">Home</a>
        ·
        <a href="http://gcg.azurewebsites.net/ClubWeb/viewclubs">Clubs</a>
        ·
        <a href="http://gcg.azurewebsites.net/ClubWeb/healthyLiving">Healthy Living</a>
        ·
        <a href="http://gcg.azurewebsites.net/ClubWeb/mapsindex">Maps</a>

    </p>

    <p class="footer-company-name">GraniteCityGeeks &copy; 2016</p>

</footer>


</html>
