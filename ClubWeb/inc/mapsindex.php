<html>

<head>



    <?php
    include("dbconnect.php");
    ?>
  <!-- Title -->
  <title>Go Portlethen!</title>
  <!-- Meta -->
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="description" content="Portlethen (and surrounding communities) Information Resource">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />


  <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300" rel="stylesheet" type="text/css">
</head>

<body>



<!-- sidebar -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-2 col-sm-4">
        <div class="heading">
          <h4><strong> Portlethen map </strong> </h4>
        </div>
        <br>
        <div class="left-navigation">
          <ul class="control-list" id="searchControls">
            <label for="txtboxSearch">Look up routes </label>
            <li> <input type="textbox" class="form-control" placeholder="search here" id="txtboxSearch"> </li>
            <li> <label class="radio-inline"> <input type="radio" name="radioRouteFilter"> Cycling routes  </label>  </li>
            <li> <label class="radio-inline"> <input type="radio" name="radioRouteFilter"> Running routes </label> </li>
            <li> <label class="radio-inline"> <input type="radio" name="radioRouteFilter"> Walking routes </label> </li>
            <li> <label class="radio-inline"> <input type="radio" name="radioRouteFilter"> N/A </label> </li>
            <br>
            <h5> Route Location </h5>
            <li>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="" id="chkboxUrbanOnly"> Urban only
                </label>
              </div>
            </li>
            <li>
            <div class="checkbox">
                <label>
                  <input type="checkbox" value="" id="chkboxRuralOnly"> Rural only
                </label>
            </div>
            </li>
            <div class="checkbox">
                <label>
                  <input type="checkbox" value="" id="chkboxHybrid"> Hybrid
                </label>
            </div>
            </li>
          </ul>

          <br>

          <ul class="control-list" id="displayOptions">
            <h5><strong>display options</strong></h5>
            <li>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="">Markers
                </label>
              </div>
            </li>
            <li>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="">Routes
                </label>
              </div>
            </li>

            <br>

            <li>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="">Restrict range
                </label>
              </div>
            </li>

            <li>
              <label for="rangeRestrict">Range of search (1-100 Miles from specified marker)</label>
              <input type="range" min="0" max="100" id="rangeRestrict">
            </li>

          </ul>
        </div>
      </div>
      <div class="col-lg-2 col-sm-3">
        <h5>Route Info </h5>
        <div class="form-inline">
          <label>Total Miles: </label>
          <label id="lblDistance"></label>
        </div>

        <div class="form-inline">
          <label>Average Time: </label>
          <label id="lblTime"></label>
        </div>


      </div>
      <!-- map -->
      <div class="col-lg-8 col-sm-7">
        <div id="map"></div>
      </div>
    </div>
  </div>

  <!-- JS -->
  <script type="text/javascript" src="assets/js/jquery.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="assets/js/scripts.js"></script>
  <!-- Isotope - Portfolio Sorting -->
  <script type="text/javascript" src="assets/js/jquery.isotope.js" type="text/javascript"></script>
  <!-- Mobile Menu - Slicknav -->
  <script type="text/javascript" src="assets/js/jquery.slicknav.js" type="text/javascript"></script>
  <!-- Animate on Scroll-->
  <script type="text/javascript" src="assets/js/jquery.visible.js" charset="utf-8"></script>
  <!-- Sticky Div -->
  <script type="text/javascript" src="assets/js/jquery.sticky.js" charset="utf-8"></script>
  <!-- Slimbox2-->
  <script type="text/javascript" src="assets/js/slimbox2.js" charset="utf-8"></script>
  <!-- Modernizr -->
  <script src="HTML/assets/js/modernizr.custom.js" type="text/javascript"></script>
  <!-- More maps -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC8HwZx1Aknt-BHgT2vYtcgeBBvokVzWU&callback=initMap"
    async defer></script>
  <script type="text/javascript" src="HTML/assets/js/map.js" type="text/javascript"></script>
  <!-- End JS -->
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
  <script type="text/javascript" src="HTML/assets/js/jquery.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="HTML/assets/js/bootstrap.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="HTML/assets/js/scripts.js"></script>
  <!-- Isotope - Portfolio Sorting -->
  <script type="text/javascript" src="HTML/assets/js/jquery.isotope.js" type="text/javascript"></script>
  <!-- Mobile Menu - Slicknav -->
  <script type="text/javascript" src="HTML/assets/js/jquery.slicknav.js" type="text/javascript"></script>
  <!-- Animate on Scroll-->
  <script type="text/javascript" src=HTML/"assets/js/jquery.visible.js" charset="utf-8"></script>
  <!-- Sticky Div -->
  <script type="text/javascript" src="HTML/assets/js/jquery.sticky.js" charset="utf-8"></script>
  <!-- Slimbox2-->
  <script type="text/javascript" src="HTML/assets/js/slimbox2.js" charset="utf-8"></script>
  <!-- Modernizr -->
  <script src="HTML/assets/js/modernizr.custom.js" type="text/javascript"></script>
  <!-- End JS -->
</body>
</html>
