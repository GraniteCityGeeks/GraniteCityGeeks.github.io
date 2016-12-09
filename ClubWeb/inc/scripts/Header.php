<?
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="/FinalCSS/master.css">
<head runat = "server">
    <meta charset="UTF-8">
    <title>Sportlethen Clubs</title>

</head>

<body class="master-body">
<header class="header">
    <h1>Sportlethen Clubs</h1>
    <?
    if (isset($_SESSION['username'])) {
        echo "<h3><a href='logout'>Logout({$_SESSION['username']})<img src={$_SESSION['photoID']} alt=\"Mountain View\" style=\"width:35px;height:35px;\"></a></h3>";
    } else {
        echo "<h3><a href='login'>Login</a></h3>";
        echo "<h3><a href='register'>Register</a></h3>";
    }
    ?>
    <nav>
        <ul>
            <li><a href="./">Home Page</a></li>
            <li><a href="blog">My Blog</a></li>
            <li><a href="about">About Me</a></li>
            <li><a href="contactus">Contact Me</a></li>
            <li><a href="viewclubs">Clubs</a></li>
            <?
            if (isset($_SESSION['accessLevelID']) == 2){
                echo "<li><a href='createarticle'>Create Art</a></li>";
                echo "<li><a href='View'>View</a></li>";
            }
            ?>

        </ul>
    </nav>
</header>