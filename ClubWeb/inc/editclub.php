<?php
if (isset($_SESSION['username'])) {

    if ($_SESSION['accessLevelID'] >= 3) {
        //connect to the database.
        include("/scripts/dbconnect.php");

        $query = "SELECT * FROM port_club";

        $result = $db->query($query);

        while ($row = $result->fetch_array()) {

            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["description"] . "</td>";
            echo "<td>" . $row["genre"] . "</td>";
            echo "<td>" . $row["avatar"] . "</td>";
            echo "<form action='Delete' method='POST'>";
            echo "<td>" . "<button name='delete' type='submit' value='" . $row["id"] . "'>" . "delete" . "</button>" . "</td>";
            echo "</form>";
            echo "</tr>";

        }


        $db->close();


        echo "</table>";
    }
}
?>
