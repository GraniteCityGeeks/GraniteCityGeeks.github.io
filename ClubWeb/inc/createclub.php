<?php

session_start();
$username = $_SESSION['username'];
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
        <div style="text-align: center;">
        <form action="createclub" method="post">
            <br>
            <br>
            <input type="text" name="clubTitle" placeholder="Club's Name" required>
            <br>
            <br>
            <br>
            <input type="text" name="ClubDescription" style="align-text: center" placeholder="Club's Description" required autofocus>
            <br>
            <br>
            <label for="genre">Select genre</label>
            <select name="genre" id="genre">
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
            <label for="avatar">Select avatar</label>
            <select name="avatar" id="avatar">
                <option value="1">Hills</option>
                <option value="21">cyclist</option>
                <option value="31">mountain</option>
                <option value="51">sunset</option>
                <option value="91">sunset 2</option>
                <option value="61">walker</option>
                <option value="71">runners</option>
                <option value="81">kites</option>
                <option value="41">Elderly</option>

            </select>
            <br>
            <br>
            <input type="submit" value="Create club!">
        </form>
        </div>

        <?
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include('scripts/dbconnect.php');


        //first segment: getting the userid from username

        //define a new query.

        $queryuserid = "select userid from port_users where username = '$username'";

        $result = $db->query($queryuserid);

        while($row = $result->fetch_array()) {
            $userid = $row['userid'];
        }

        //before anything else, check that the user already owns a club, if they do, send them back to viewclubs.
        //THIS CODE IS NOW OBSELETE. IT WILL BE COMMENTED OUT INCASE WE NEED IT BACK.

       // $queryowner = ("SELECT ownerid FROM port_club WHERE ownerid = '$userid'");

       // $ownerresult = $db->query($queryowner);

       // if($ownerresult->num_rows > 0) {
            //if user gets to make a club, the whole site will break.
        //   header('Location: blog');
        //} else {


            $clubtitle = $_POST["clubTitle"];
            $clubtxt = $_POST["ClubDescription"];
            $clubgenre = $_POST["genre"];
            $clubavatar = $_POST["avatar"];
            $sql = "INSERT INTO port_club(clubTitle, description, genreid, photoid, clubcalendar, ownerid) VALUES('$clubtitle', '$clubtxt', '$clubgenre', '$clubavatar', 'No events upcoming', $userid)";



            if (mysqli_query($db, $sql)) {
                echo "<p> creation successful </p>";
                //add the user to the club while you're at it too. you'll need to get a hold of the new clubid first though.
                $clubidquery = "SELECT clubid FROM port_club WHERE ownerid = '$userid'";

                $clubidresult = $db->query($clubidquery);

                while($row = $clubidresult->fetch_array()) {
                    $clubid = $row['clubid'];
                }

                $insertion = "INSERT INTO port_usersinclubs(clubid, userid)VALUES ('$clubid', '$userid')";
                mysqli_query($db, $insertion);
            } else {
                echo "Error: " . $sql . "<br>Error Message:" . mysqli_error($db);
            }
    }
}
echo "
</main>
";
include("scripts/footer.php");