<?php

include("scripts/header.php");

include("scripts/dbconnect.php");

$sql = "SELECT * FROM port_users";

echo "<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}
th {
    background-color: #3daf6a;
    color: white;
}

tr:nth-child(even){background-color: #f2f2f2}

.edit {
	-moz-box-shadow: 0px 0px 0px 0px #3dc21b;
	-webkit-box-shadow: 0px 0px 0px 0px #3dc21b;
	box-shadow: 0px 0px 0px 0px #3dc21b;
	background-color:#44c767;
	-moz-border-radius:14px;
	-webkit-border-radius:14px;
	border-radius:14px;
	border:1px solid #18ab29;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:21px;
	padding:9px 18px;
	text-decoration:none;
	text-shadow:0px 1px 0px #2f6627;
}
.edit:hover {
	background-color:#5cbf2a;
}
.edit:active {
	position:relative;
	top:1px;
}
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
    echo '<p><a href="edit" class="edit" >Edit</a></p>';
    echo '<p><a href="delete">Delete</a></p>';
    echo "</tr>";
}

echo "</table>";

echo '<td><form action="/add"><input type="submit" value="Add New User!" /></form></td>';

?>

</body>

</html>