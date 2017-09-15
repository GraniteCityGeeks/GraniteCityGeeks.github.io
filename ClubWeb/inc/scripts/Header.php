<?
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Title -->
    <title>Go Portlethen!</title>
    <!-- Favicon -->
    <link rel="icon" href="favicon.ico" />
    <!-- Meta -->
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="Portlethen (and surrounding communities) Information Resource">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!-- Favicon -->
    <link href="favicon.ico" rel="shortcut icon">
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="/ClubWeb/inc/scripts/Style/assets/css/bootstrap.css" rel="stylesheet">
    <!-- Template CSS -->
    <link rel="stylesheet" href="/ClubWeb/inc/scripts/Style/assets/css/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="/ClubWeb/inc/scripts/Style/assets/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="/ClubWeb/inc/scripts/Style/assets/css/nexus.css" rel="stylesheet">
    <link rel="stylesheet" href="/ClubWeb/inc/scripts/Style/assets/css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="/ClubWeb/inc/scripts/Style/assets/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="/ClubWeb/inc/scripts/Style/assets/css/map.css" rel="stylesheet">

    <!-- Google Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300" rel="stylesheet" type="text/css">
    <!-- Map Javascript scripts -->
    <!-- JS -->
    <!--Map src -->
</head>

<body>
<header>
    <a href="/index.php"><h1>Go Portlethen</h1></a>
    <?
    if (isset($_SESSION['username'])) {
        echo "<h3><a href='http://gcg.azurewebsites.net/ClubWeb/logout'>Logout({$_SESSION['username']})<img src={$_SESSION['photoID']} alt=\"Mountain View\" style=\"width:35px;height:35px;\"></a></h3>";
    } else {
        echo "<h3><a href='http://gcg.azurewebsites.net/ClubWeb/login'>Login</a></h3>";
        echo "<h3><a href='register'>Register</a></h3>";
    }
    ?>
    <header class="main-header" role="banner" >
      <center>
      <img src="clouds_banner.jpg" alt="Banner Image" />
      </center
    </header>

<!--    <div id="body-bg"> -->
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
                                    <a href="http://gcg.azurewebsites.net/Health.php" class="fa-comment ">Health</a>

                                </li>

                                <div class="dropdown">
                                 <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
                                 <span class="caret"></span></button>
                                 <ul class="dropdown-menu">
                                   <li><a href="#">HTML</a></li>
                                   <li><a href="#">CSS</a></li>
                                   <li><a href="#">JavaScript</a></li>
                                 </ul>
                                </div>

                                <?
                                if (isset($_SESSION['accessLevelID']) == 2){

                                } else if (isset($_SESSION['accessLevelID']) == 3){

                                } else if (isset($_SESSION['accessLevelID']) == 4){

                                } else if (isset($_SESSION['accessLevelID']) == 5){

                                } else {
                                }
                                ?>



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
