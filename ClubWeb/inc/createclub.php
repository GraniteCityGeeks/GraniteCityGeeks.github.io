<?php
session_start();
include("scripts/dbconnect.php");
include ("scripts/header.php");
if (isset($_SESSION['username'])) //SESSION DOES EXIST
{
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        echo "
<main>
";
        ?>

        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>tinymce.init({selector: 'textarea'});</script>
        <form action="createclub" method="post">
            <br>
            <br>
            <input type="text" name="clubTitle" placeholder="Club's Name" required>
            <br>
            <br>
            <br>
            <textarea name="ClubDescription" required></textarea>
            <br>
            <br>
            <select name="genre">
                <option value="1">Sports</option>
                <option value="11">Arts</option>
                <option value="21">Cycling</option>
                <option value="41">Running</option>
                <option value="51">Walking</option>
                <option value="61">Hobby</option>
                <option value="31">Other</option>
            </select>
            <br>
            <br>
            <select name="avatar">
                <option value="1">Hills</option>
                <option value="21">cyclist</option>
                <option value="31">sunset</option>
            </select>
            <br>
            <br>
            <input type="submit" value="Create club!">
        </form>

        <?
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include('scripts/dbconnect.php');
        $clubtitle = str_replace(' ', '-', $_POST["clubTitle"]);
        $clubtxt = $_POST["ClubDescription"];
        $clubgenre = $_POST["genre"];
        if (mysqli_query($db, $sql)) {
        } else {
            echo "Error: " . $sql . "<br>Error Message:" . mysqli_error($db);
        }
        header("blog");
    }
}
echo "
</main>
";
include("scripts/footer.php");