<?php
include('scripts/dbconnect.php');
session_start();
if (isset ($_SESSION['username'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        include("scripts/Header.php");
        ?>
        <main>
            <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
            <div id="marker-management" style="color:darkblue;font-family: 'Titillium Web', sans-serif;">
                <h1>Markers</h1>
                <table border="1" class="table">

                    <tr>
                        <th>name</th>
                        <th>description</th>
                        <th>genre</th>
                        <th>avatar</th>
                        <th>Delete</th>
                    </tr>

                <?php
                if (isset($_SESSION['username'])) {

                    if ($_SESSION['accessLevelID'] >= 3) {
                        //connect to the database.
                        include("/scripts/dbconnect.php");

                        $query = "SELECT * FROM port_markers";

                        $result = $db->query($query);

                        while ($row = $result->fetch_array()) {

                            echo "<tr>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["description"] . "</td>";
                            echo "<td>" . $row["genre"] . "</td>";
                            echo "<td>" . $row["avatar"] . "</td>";
                            echo "<form action='markerdelete' method='POST'>";
                            echo "<td>" . "<button name='delete' type='submit' value='" . $row["id"] . "'>" . "delete" . "</button>" . "</td>";
                            echo "</form>";
                            echo "</tr>";

                        }


                        $db->close();


                        echo "</table>";
                    }
                }
                ?>
