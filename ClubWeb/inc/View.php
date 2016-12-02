<?php

include("scripts/header.php");

include("scripts/dbconnect.php");

$sql = "SELECT * FROM port_users";

echo "<p><b>View All</b></p>";

echo "<table border='1' cellpadding='10'>";

echo "<tr> <th>ID</th> <th>username</th> <th>password</th> <th></th> <th></th></tr>";

$result = $db->query($sql);
while ($row = $result->fetch_array()) {
    echo "<tr>";
    echo '<td>' . $row['userID'] . '</td>';
    echo '<td>' . $row['username'] . '</td>';
    echo '<td>' . $row['password'] . '</td>';
    echo '<td>' . $row['bio'] . '</td>';
    echo '<td>' . $row['accessLevelID'] . '</td>';
    echo '<td>' . $row['photoID'] . '</td>';
    echo '<td><a href="edit.php?id=' . $row['userID'] . '">Edit</a></td>';
    echo '<td><a href="delete.php?id=' . $row['userID'] . '">Delete</a></td>';
    echo "</tr>";
}

echo "</table>";

?>

<!--<p><a href="new.php">Add a new record</a></p>-->



</body>

</html>