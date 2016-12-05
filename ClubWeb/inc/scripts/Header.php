<?
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head runat = "server">
    <meta charset="UTF-8">
    <title>Sportlethen Clubs</title>
    <link rel="stylesheet" href="/CoreCSS/NavbarMaster.css">

</head>

<body class="master-body">
<header class="header">
    <h1>Sportlethen Clubs</h1>
    <nav>
        <ul>
            <li><a href="./">Home Page</a></li>
            <li><a href="blog">My Blog</a></li>
            <li><a href="about">About Me</a></li>
            <li><a href="contactus">Contact Me</a></li>
            <?
            if (isset($_SESSION['username'])) {
                echo "<li><a href='logout'>Logout</a></li>";
            } else {
                echo "<li><a href='login'>Login</a></li>";
                echo "<li><a href='register'>Register</a></li>";
            }
            if (isset($_SESSION['accessLevelID']) == 2){
                echo "<li><a href='create_article'>Create Art</a></li>";
                echo "<li><a href='view'>View</a></li>";
            }
            ?>

        </ul>
    </nav>
</header>