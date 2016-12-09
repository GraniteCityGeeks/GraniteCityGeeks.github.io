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
            <input type="text" name="clubTitle" placeholder="Club's Name" required>
            <textarea name="ClubDescription" required></textarea>
            <select name="genre">
                <option value="1">Sports</option>
                <option value="11">Arts</option>
                <option value="21">Cycling</option>
                <option value="41">Running</option>
                <option value="51">Walking</option>
                <option value="61">Hobby</option>
                <option value="31">Other</option>
            </select>
            <input type="file" name="filetoupload" id="filetoupload required">

            <input type="submit">
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