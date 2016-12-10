<html>
<head>
    <link href="/clubcss.css" rel="stylesheet" type="text/css">
</head>

<body>
<ul id="nav">
    <img href="https://www.dropbox.com/s/meq0xmxkcafrasc/logogcg.png?dl=0">
    <li><a href="/index.php">Home</a></li>
    <li><a href="/ClubWeb">Clubs</a></li>
    <li><a href="/ClubWeb/inc/mapsindex.php">Maps</a></li>
    <li><a href="/healthFinal">Health</a></li>
    <li><a href="scripts/MarkerAdmin.php">Edit Markers</a></li>

</ul>
<div id="container">

</div>
</body>
</html>
<?


define('INCLUDE_DIR', dirname(__FILE__) . '/inc/');
$rules = array(
    //
    //main pages
    //
    'about' => "/about",
    'contactus' => "/contactus",
    'blog' => "/blog",
    'blog_article' => "/blog/(?'blogID'[\w\-]+)",
    //
    //Admin Pages
    //
    'login' => "/login",
    'create_article' => "/createarticle",
    'view' => "/view",
    'logout' => "/logout",
    'register' => "/register",
    'add' => "/add",
    'Edit' => "/Edit/(?'userID'[\w\-]+)",
    'delete' => "/delete/(?'userID'[\w\-]+)",
    'ConfirmUser' => "/ConfirmUser/(?'userID'[\w\-]+)",
    'AddUser' => "/AddUser",
    'Clubs' => "/Clubs/(?'linkref'[\w\-]+)",
    'viewclubs' => "/viewclubs",
    'createclub' => "/createclub",
    'mapsindex' => "/mapsindex",
    //
    // Home Page
    //
    'home' => "/"
    //
    // Style
    //
);


$uri = rtrim(dirname($_SERVER["SCRIPT_NAME"]), '/');
$uri = '/' . trim(str_replace($uri, '', $_SERVER['REQUEST_URI']), '/');
$uri = urldecode($uri);
foreach ($rules as $action => $rule) {
   if (preg_match('~^' . $rule . '$~i', $uri, $params)) {
       include(INCLUDE_DIR . $action . '.php');
       exit();
   }
}
// nothing is found so handle the 404 error
include(INCLUDE_DIR . '404.php');
?>


