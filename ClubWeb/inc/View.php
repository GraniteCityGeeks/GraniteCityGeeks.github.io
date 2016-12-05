<?php

include("scripts/header.php");

include("scripts/dbconnect.php");

$sql = "SELECT * FROM port_users";

echo"<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>";

echo "<p><b>View All</b></p>";

echo "<div style=\"overflow-x:auto;\">";

echo "<table>";

echo "<tr> <th>ID</th> <th>Username</th> <th>Password</th> <th>Bio</th> <th>Access Level</th> <th>Photo ID</th> </tr>";

$result = $db->query($sql);
while ($row = $result->fetch_array()) {
    echo "<tr>";
    echo '<td>' . $row['userID'] .'</td>';
    echo '<td>' . $row['username'] . '</td>';
    echo '<td>' . $row['password'] . '</td>';
    echo '<td>' . $row['bio'] . '</td>';
    echo '<td>' . $row['accessLevelID'] . '</td>';
    echo '<td>' . $row['photoID'] . '</td>';
    echo '<td><a href="edit' . $row['userID'] . '">Edit</a></td>';
    echo '<td><a href="delete.php?id=' . $row['userID'] . '">Delete</a></td>';
    echo "</tr>";
}

echo "</table>";

echo "<li><a href='add'>Add New User</a></li>";

?>

</body>

</html>