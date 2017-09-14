<?php
include('scripts/dbconnect.php');
session_start();
if (isset ($_SESSION['username'])) {

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        include("scripts/Header.php");
        ?>
        <main>
            <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <?
        //first check that the user is admin in club. Otherwise return the user back to viewclubs
        //query to check that the user manages a club.
        $id = $_SESSION['username'];
        $query ="SELECT * From port_club";

        $result = $db->query($query);

        if (!$result) {
            header('Location: Clubs');

        } else  {
            //if a club has been found, continue.
            //get results from the query.

        while ($row = $result->fetch_array()) {

            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["description"] . "</td>";
            echo "<td>" . $row["genre"] . "</td>";
            echo "<td>" . $row["avatar"] . "</td>";
            echo "<form action='markerdelete' method='POST'>";
            echo "<td>" . "<button name='delete' type='submit' value='" . $row["name"] . "'>" . "delete" . "</button>" . "</td>";
            echo "</form>";
            echo "</tr>";

        }


        $db->close();


        echo "</table>";
    }
}
?>
