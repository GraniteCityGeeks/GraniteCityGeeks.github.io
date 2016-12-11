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
            <form action="createarticle" method="POST">
                <input type="text" name="clubarticlename\" placeholder="Article Name">
                <textarea name="articleText"></textarea>
                <label for="club">select club to make article for.</label>
                <select name="club">
                    <?
                    //select every club that exists in the database
                    include('scripts/dbconnect.php');
                    $query = ("SELECT clubid, clubTitle FROM port_club");
                    $result = $db->query($query);

                    while ($row = $result->fetch_array()) {
                        $id = $row['clubid'];
                        echo "<option value='$id'>".$row['clubTitle']."</option>";
                    }
                    ?>
                </select>
                <br>
                <label for="photo">select photograph</label>
                <select name="photo">
                <?
                include('scripts/dbconnect.php');
                $query = ("SELECT * from port_photo");
                $result = $db->query($query);

                while ($row = $result->fetch_array()) {
                    $id = $row['photoid'];
                    echo "<option value='$id'>".$row['caption']."</option>";
                }
                ?>

                </select>
                <br><br>
                <input type="submit">

            </form>
        </main>
        <?
        include("scripts/footer.php");
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include('scripts/dbconnect.php');
        $articleName = $_POST["clubarticlename"];
        $articleText = $_POST["articleText"];
        $clubid = $_POST['club'];
        $photoid = $_POST['photo'];
        $sql = "INSERT INTO port_club_article ( clubid, title, content,
            photoid) VALUES ( '$clubid', '$articleName', '$articleText', '$photoid')";
        if (mysqli_query($db, $sql)) {
        } else {
            echo "Error: " . $sql . "<br>Error Message:" . mysqli_error($db);
        }
        header("Clubs");
    }
//test
} else {
    header("location:login");
}
?>