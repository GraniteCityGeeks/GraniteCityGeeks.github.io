
<?PHP
include("ClubWeb/inc/scripts/dbconnect.php");
include("ClubWeb/inc/scripts/header.php");
?>
<!DOCTYPE html>
<html>
  <head>

  </head>
  <body>
  <div id="slideshow" class="bottom-border-shadow">
              <div class="container no-padding background-white bottom-border">
                  <div class="row">
                      <!-- Carousel Slideshow -->
                      <div id="carousel-example" class="carousel slide" data-ride="carousel">
                          <!-- Carousel Indicators -->
                          <ol class="carousel-indicators">
                              <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                              <li data-target="#carousel-example" data-slide-to="1"></li>
                              <li data-target="#carousel-example" data-slide-to="2"></li>
                          </ol>
                          <div class="clearfix"></div>
                          <!-- End Carousel Indicators -->
                          <!-- Carousel Images -->
                          <div class="carousel-inner">
                              <div class="item active">
                                  <img src="slideshow/slide1.jpg">
                              </div>
                              <div class="item">
                                  <img src="slideshow/slide2.jpg">
                              </div>
                              <div class="item">
                                  <img src="slideshow/slide3.jpg">
                              </div>
                              <div class="item">
                                  <img src="slideshow/slide4.jpg">
                              </div>
                          </div>
                          <!-- End Carousel Images -->
                          <!-- Carousel Controls -->
                          <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                              <span class="glyphicon glyphicon-chevron-left"></span>
                          </a>
                          <a class="right carousel-control" href="#carousel-example" data-slide="next">
                              <span class="glyphicon glyphicon-chevron-right"></span>
                          </a>
                          <!-- End Carousel Controls -->
                      </div>
                      <!-- End Carousel Slideshow --->
                  </div>
              </div>
          </div>
          <div id="icons" class="bottom-border-shadow">
              <div class="container background-grey bottom-border">
                  <div class="row padding-vert-60">
                      <!-- Icons -->
                      <div class="col-md-4 text-center">
                          <i class="fa-cogs fa-4x color-primary animate fadeIn"></i>
                          <h2 class="padding-top-10 animate fadeIn">Clubs and Sports</h2>
                          <p class="animate fadeIn">The Portlethen Community Sports Hub - branded "Sportlethen" - is an association of progressive sports clubs in the Portlethen area who are joining forces to enhance sporting opportunities.</p>
                      </div>
                      <div class="col-md-4 text-center">
                          <i class="fa-cloud-download fa-4x color-primary animate fadeIn"></i>
                          <h2 class="padding-top-10 animate fadeIn">Maps / Locations</h2>
                          <p class="animate fadeIn">Discover North Kincardine</p>
                      </div>
                      <div class="col-md-4 text-center">
                          <i class="fa-bar-chart fa-4x color-primary animate fadeIn"></i>
                          <h2 class="padding-top-10 animate fadeIn">Health & Wellbeing</h2>
                          <p class="animate fadeIn"> Live Long and Prosper</p>
                      </div>
                      <!-- End Icons -->
                  </div>
              </div>
          </div>
          <div id="content" class="bottom-border-shadow">
              <div class="container background-white bottom-border">
                  <div class="row margin-vert-30">
                      <!-- Main Text -->
                      <div class="col-md-6">
                          <h2>Healthy Living</h2>
                          <p><b>This page will contain helpful information, tips & tricks for staying healthy!</b>
                            </p>
                            <hr>
                            <h2>Community Spotlight!</h2>
                            <i>Articles published by users of this site!</i>
                            <hr class="pacman"/>

                                <ul class="ulProducts" runat="server" id="newsFeed" style="background-color: #f5f5f5">
                            <h2>Article Titles! </h2>

                            <?php
                            include('scripts/dbconnect.php');
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



                          Kincardine and Mearns Town Profiles (from <b>Aberdeenshire Council</b> - November 2015):<br>

                          <b><a href="http://aberdeenshire.gov.uk/media/15562/newtonhill-profile-2015-update.pdf" target="new">Newtonhill</a></b> -
                          <b><a href="http://aberdeenshire.gov.uk/media/15559/portlethen-profile-2015-update.pdf" target="new">Portlethen</a></b> -
                          <b><a href="http://aberdeenshire.gov.uk/media/15560/stonehaven-profile-2015-update.pdf" target="new">Stonehaven</a></b> </p>

                      </div>
                      <!-- End Main Text -->
                      <div class="col-md-6">
                          <h3 class="padding-vert-10">Sidebar</h3>
                          <h2>News Feed!</h2>
    <?php
    include('scripts/dbconnect.php');
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

                      </div>
                  </div>
              </div>
          </div>
          <!-- Portfolio -->
          <div id="portfolio" class="bottom-border-shadow">
              <div class="container bottom-border">
                  <div class="row padding-top-40">
                      <ul class="portfolio-group">
                          <!-- Portfolio Item -->
                          <li class="portfolio-item col-sm-4 col-xs-6 margin-bottom-40">
                              <a href="#">
                                  <figure class="animate fadeInLeft">
                                      <img alt="image1" src="frontpage/image1.jpg">
                                      <figcaption>
                                          <h3>Velit esse molestie</h3>
                                          <span>Vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui et everti tamquam suavitate mea.</span>
                                      </figcaption>
                                  </figure>
                              </a>
                          </li>
                          <!-- //Portfolio Item// -->
                          <!-- Portfolio Item -->
                          <li class="portfolio-item col-sm-4 col-xs-6 margin-bottom-40">
                              <a href="#">
                                  <figure class="animate fadeIn">
                                      <img alt="image2" src="frontpage/image2.jpg">
                                      <figcaption>
                                          <h3>Quam nunc putamus</h3>
                                          <span>Vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui et everti tamquam suavitate mea.</span>
                                      </figcaption>
                                  </figure>
                              </a>
                          </li>
                          <!-- //Portfolio Item// -->
                          <!-- Portfolio Item -->
                          <li class="portfolio-item col-sm-4 col-xs-6 margin-bottom-40">
                              <a href="#">
                                  <figure class="animate fadeInRight">
                                      <img alt="image3" src="frontpage/image3.jpg">
                                      <figcaption>
                                          <h3>Placerat facer possim</h3>
                                          <span>Vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui et everti tamquam suavitate mea.</span>
                                      </figcaption>
                                  </figure>
                              </a>
                          </li>
                          <!-- //Portfolio Item// -->
                          <!-- Portfolio Item -->
                          <li class="portfolio-item col-sm-4 col-xs-6 margin-bottom-40">
                              <a href="#">
                                  <figure class="animate fadeInLeft">
                                      <img alt="image4" src="frontpage/image4.jpg">
                                      <figcaption>
                                          <h3>Nam liber tempor</h3>
                                          <span>Vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui et everti tamquam suavitate mea.</span>
                                      </figcaption>
                                  </figure>
                              </a>
                          </li>
                          <!-- //Portfolio Item// -->
                          <!-- Portfolio Item -->
                          <li class="portfolio-item col-sm-4 col-xs-6 margin-bottom-40">
                              <a href="#">
                                  <figure class="animate fadeIn">
                                      <img alt="image5" src="frontpage/image5.jpg">
                                      <figcaption>
                                          <h3>Donec non urna</h3>
                                          <span>Vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui et everti tamquam suavitate mea.</span>
                                      </figcaption>
                                  </figure>
                              </a>
                          </li>
                          <!-- //Portfolio Item// -->
                          <!-- Portfolio Item -->
                          <li class="portfolio-item col-sm-4 col-xs-6 margin-bottom-40">
                              <a href="#">
                                  <figure class="animate fadeInRight">
                                      <img alt="image6" src="frontpage/image6.jpg">
                                      <figcaption>
                                          <h3>Nullam consectetur</h3>
                                          <span>Vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui et everti tamquam suavitate mea.</span>
                                      </figcaption>
                                  </figure>
                              </a>
                          </li>
                          <!-- //Portfolio Item// -->
                      </ul>
                  </div>
              </div>
          </div>
          <!-- End Portfolio -->
          <!-- === END CONTENT === -->
          <!-- === BEGIN FOOTER === -->
          <div id="base">
              <div class="container bottom-border padding-vert-30">
                  <div class="row">
                      <!-- Disclaimer -->
                      <div class="col-md-4">

                      </div>
                      <!-- End Disclaimer -->
                      <!-- Contact Details -->
                      <div class="col-md-4 margin-bottom-20">

                      </div>
                      <!-- End Contact Details -->
                      <!-- Sample Menu -->
                      <div class="col-md-4 margin-bottom-20">

                      </div>
                      <!-- End Sample Menu -->
                  </div>
              </div>
          </div>
          <!-- Footer -->
          <div id="footer" class="background-grey">
              <div class="container">
                  <div class="row">
                      <!-- Footer Menu -->
                      <div id="footermenu" class="col-md-8">



                      <!-- End Footer Menu -->
                      <!-- Copyright -->
                      <div id="copyright" class="col-md-4">
                          <p class="pull-right">(c) 2017 Vanilla Latte</p>
                      </div>
                      <!-- End Copyright -->
                  </div>
              </div>
          </div>
          <!-- End Footer -->
          <!-- JS -->
          <script type="text/javascript" src="js/jquery.min.js" type="text/javascript"></script>
          <script type="text/javascript" src="js/bootstrap.min.js" type="text/javascript"></script>
          <script type="text/javascript" src="js/scripts.js"></script>
          <!-- Isotope - Portfolio Sorting -->
          <script type="text/javascript" src="js/jquery.isotope.js" type="text/javascript"></script>
          <!-- Mobile Menu - Slicknav -->
          <script type="text/javascript" src="js/jquery.slicknav.js" type="text/javascript"></script>
          <!-- Animate on Scroll-->
          <script type="text/javascript" src="js/jquery.visible.js" charset="utf-8"></script>
          <!-- Sticky Div -->
          <script type="text/javascript" src="js/jquery.sticky.js" charset="utf-8"></script>
          <!-- Slimbox2-->
          <script type="text/javascript" src="js/slimbox2.js" charset="utf-8"></script>
          <!-- Modernizr -->
          <script src="js/modernizr.custom.js" type="text/javascript"></script>
          <!-- End JS -->
  </body>
</html>
<!-- === END FOOTER === -->
