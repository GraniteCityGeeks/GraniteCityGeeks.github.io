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
            <li><a href="../Blog.php">My Blog</a></li>
            <li><a href="../About.php">About Me</a></li>
            <li><a href="../ContactUs.php">Contact Me</a></li>
            <li><a href="../Clubs.php">clubs</a></li>

            <?
            if (isset($_SESSION['username'])) {
                echo "<li><a href='../Logout.php'>Logout</a></li>";
            } else {
                echo "<li><a href='../Login.php'>Login</a></li>";
                echo "<li><a href='../Register.php'>Register</a></li>";
            }
            if (isset($_SESSION['accessLevelID']) == 2){
                echo "<li><a href='../create_article.php'>Create Art</a></li>";
                echo "<li><a href='../View.php'>View</a></li>";
            }
            ?>

        </ul>
    </nav>
</header>