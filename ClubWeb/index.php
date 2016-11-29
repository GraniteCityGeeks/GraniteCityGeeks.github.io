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
    'logout' => "/logout",
    'register' => "/register",
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