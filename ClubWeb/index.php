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
    'modifyclub' => "/modifyclub",
    'createclub' => "/createclub",
    'mapsindex' => "/mapsindex",
    'markers' => "/markers",
    'MarkerAdmin' => "/MarkerAdmin",
    'deletemarker' => "/deletemarker",
    'markercreate' => "/markercreate",
    'markerdelete' => "/markerdelete",
    'create_club_article' =>"/clubarticle",
    'joinclub' => "/joinclub",
    '/healthFinal/webPages/healthyLiving' => "/healthyliving",
    '/healthFinal/webPages/index' => "/index",
    '/healthFinal/webPages/adminpage' => "/adminpage",
    '/healthFinal/webPages/contributorPage' => "/contributorPage",
    '/healthFinal/webPages/dbconnect' => "/dbconnect",
    '/healthFinal/webPages/editHealth' => "/editHealth",
    '/healthFinal/webPages/editnewsfeed' => "/editnewsfeed",
    'ViewArticles' => "/ViewArticles",
    'deleteArticle' => "/deleteArticle/(?'clubarticleid'[\w\-]+)",
    'confirmArticle' => "/confirmArticle/(?'clubarticleid'[\w\-]+)",
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