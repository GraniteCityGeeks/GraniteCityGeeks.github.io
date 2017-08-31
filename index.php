<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="basicstyle.css">
<!--
<link href="../CoreCSS/bootstrap.min.css" rel="stylesheet" />
<link href="../CoreCSS/half-slider.css" rel="stylesheet" />
<link href="../CoreCSS/healthPage.css" rel="stylesheet" />
-->
<head>
    <title> Go Portlethen </title>
</head>
<h1> Granite City Geeks - Go Portlethen</h1>
<h2> Discover Aberdeen </h2>
<br>



<body>
<?PHP
include ("ClubWeb/inc/scripts/Footer.php");
?>

</body>
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


    <div id="body-bg">
        <!-- Phone/Email -->

        <!-- End Phone/Email -->
        <!-- Header -->
        <div id="header">
            <div class="container">
                <div class="row">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="http://gcg.azurewebsites.net/ClubWeb/" title="">
                            <!--  <img src="Style/assets/img/logo.png" alt="Logo" /> -->

                        </a>
                    </div>
                    <!-- End Logo -->
                </div>
            </div>
        </div>
        <!-- End Header -->
        <!-- Top Menu -->
        <div id="hornav" class="bottom-border-shadow">
            <div class="container no-padding border-bottom">
                <div class="row">
                    <div class="col-md-8 no-padding">
                        <div class="visible-lg">
                            <ul id="hornavmenu" class="nav navbar-nav">

                                <li>
                                    <a href="http://gcg.azurewebsites.net/ClubWeb/" class="fa-home active">Home</a>
                                </li>
                                <li>

                                </li>
                                <li>
                                    <a href="http://gcg.azurewebsites.net/ClubWeb/viewclubs" class="fa-comment ">Clubs</a>

                                </li>
                                <li>
                                    <a href="http://gcg.azurewebsites.net/ClubWeb/mapsindex" class="fa-comment ">Maps</a>

                                </li>
                                <li>
                                    <a href="http://healthplaceholder.com" class="fa-comment ">Health</a>

                                </li>



                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 no-padding">
                        <ul class="social-icons pull-right">
                            <li class="social-rss">
                                <a href="#" target="_blank" title="RSS"></a>
                            </li>
                            <li class="social-twitter">
                                <a href="#" target="_blank" title="Twitter"></a>
                            </li>
                            <li class="social-facebook">
                                <a href="#" target="_blank" title="Facebook"></a>
                            </li>
                            <li class="social-googleplus">
                                <a href="#" target="_blank" title="Google+"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Top Menu -->
        <!-- === END HEADER === -->
</header>



<div id="main">




    <div id="column1">
        Portlethen (/pɔərtˈlɛθən/; Scottish Gaelic: Port Leathain) is a town located approximately 7 miles south of Aberdeen, Scotland along the A90. The population according to the 2011 census was 7,130 [2] making it the seventh most populous settlement within Aberdeenshire.
        <br>
        </hr>
        Please Click "Clubs" to login/register to the site.


    </div>
    <div id="sidebar">

        Portlethen lies about two kilometres east of the ancient Causey Mounth road, which was built on high ground to make passable this only available medieval route across the Mounth from coastal points south to Aberdeen. This ancient passage specifically connected the Bridge of Dee with Muchalls Castle and Stonehaven to the south.[5] The route was that taken by the William Keith, 7th Earl Marischal and James Graham, 1st Marquess of Montrose when they led a Covenanter army of 9000 men in the first battle of the Civil War in 1639.[6] Portlethen has expanded very rapidly. In the 1980s a new retail park was constructed. Portlethen is still continuing to expand into a sizable town.
    </div>
</html>
<?php
include("ClubWeb/inc/scripts/dbconnect.php");
include("ClubWeb/inc/scripts/header.php");
?>
