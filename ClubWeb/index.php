<html>
<head>
    <link href="/clubcss.css" rel="stylesheet" type="text/css">
</head>

<body>
<ul id="nav">
    <div class="logo">
        Logo
    </div>
    <li><a href="page1.html">Page 1</a></li>
    <li><a href="page2.html">Page 2</a></li>
    <li><a href="page3.html">Page 3</a></li>
    <li><a href="page4.html">Page 4</a></li>
    <li><a href="page5.html">Page 5</a></li>
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


