<?php
session_start();
if (isset($_SESSION['username'])) //SESSION DOES EXIST
{
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        include("scripts/Header.php");
        ?>
        <main>
            <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
            <script>tinymce.init({selector: 'textarea'});</script>
            <form action="createarticle" method="post">
                <input type="text" name="articleName" placeholder="Article Name" required>
                <textarea name="articleText" required></textarea>
                <input type="checkbox" name="clubcheck" value="forclub" > Is this for club?
                
                <input type="submit">

            </form>
        </main>
        <?
        include("scripts/footer.php");
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include('scripts/dbconnect.php');
        $articleID = str_replace(' ', '-', $_POST["articleName"]);
        $articleName = $_POST["articleName"];
        $articleName = $db->real_escape_string($articleName);
        $articleText = $_POST["articleText"];
        $articleText = $db->real_escape_string($articleText);
        $articleAuthor = $_SESSION['username'];
        $sql = "INSERT INTO port_blogArticles (articleID, articleName, articleText,
articleAuthor) VALUES ('". $articleID ."', '" .$articleName."', '".$articleText."',
'".$articleAuthor."')";
        if (mysqli_query($db, $sql)) {
        } else {
            echo "Error: " . $sql . "<br>Error Message:" . mysqli_error($db);
        }
        header("blog");
    }
//test
} else {
    header("location:login");
}
?>