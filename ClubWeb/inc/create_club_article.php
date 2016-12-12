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
            <form action="clubarticle" method="POST">
                <input type="text" name="clubarticlename" placeholder="Article Name" required>
                <textarea name="articleText" required></textarea>
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
        $articleName = $db->real_escape_string($articleName);
        $articleText = $_POST["articleText"];
        $articleText = $db->real_escape_string($articleText);
        $clubid = $_POST['club'];
        $photoid = $_POST['photo'];
        $sql = "INSERT INTO port_club_article ( clubid, title, content,
            photoid) VALUES ( '$clubid', '$articleName', '$articleText', '$photoid')";
        if (mysqli_query($db, $sql)) {
            header("Location: viewclubs");
        } else {
            echo "Error: " . $sql . "<br>Error Message:" . mysqli_error($db);
        }

    }
//test
} else {
    header("location:login");
}
?>