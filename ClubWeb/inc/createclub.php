<?php
session_start();
if (isset($_SESSION['username'])) //SESSION DOES EXIST
{
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        include("scripts/header_l2.php");
        echo "
<main>
";
        ?>
        // This will be used to make/edit club pages.
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>tinymce.init({selector: 'textarea'});</script>
        <form action="createclub" method="post">
            <input type="text" name="clubTitle" placeholder="Club's Name">
            <textarea name="ClubDescription"></textarea>
            <select name="genre">
                <option value="Sports">Sports</option>
                <option value="Arts">Arts</option>
                <option value="Cycling">Cycling</option>
                <option value="Running">Running</option>
                <option value="Walking">Walking</option>
                <option value="hobby">Hobby</option>
                <option value="other">Other</option>
            </select>
            <input type="submit">
        </form>

        <?
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include('scripts/dbconnect.php');
        $clubid = str_replace(' ', '-', $_POST["clubTitle"]);
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