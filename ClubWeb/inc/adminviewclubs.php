<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("scripts/header.php");

include("scripts/dbconnect.php");

$sql = "SELECT * FROM port_club";

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
    background-color: #0000ff;
    color: white;
}

tr:nth-child(even){background-color: #f2f2f2}
.edit {
	-moz-box-shadow: 0px 0px 0px 0px #3dc21b;
	-webkit-box-shadow: 0px 0px 0px 0px #3dc21b;
	box-shadow: 0px 0px 0px 0px #3dc21b;
	background-color:#44c767;
	-moz-border-radius:15px;
	-webkit-border-radius:15px;
	border-radius:15px;
	border:1px solid #18ab29;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:16px;
	padding:6px 12px;
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
.add {
	-moz-box-shadow: 0px 0px 0px 0px #3dc21b;
	-webkit-box-shadow: 0px 0px 0px 0px #3dc21b;
	box-shadow: 0px 0px 0px 0px #3dc21b;
	background-color:#44c767;
	-moz-border-radius:15px;
	-webkit-border-radius:15px;
	border-radius:15px;
	border:1px solid #18ab29;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:16px;
	padding:6px 12px;
	text-decoration:none;
	text-shadow:0px 1px 0px #2f6627;
}
.add:hover {
	background-color:#5cbf2a;
}
.add:active {
	position:relative;
	top:1px;
}
</style>";

echo "<p><b>View All</b></p>";

echo "<div style=\"overflow-x:auto;\">";

echo "<table>";

echo "<tr> <th>ID</th> <th>Name</th> <th>Description</th> <th>GenreID</th> <th>PhotoID</th> <th>ClubCalendar</th> <th>OwnerID</th></tr>";

$result = $db->query($sql);
while ($row = $result->fetch_array()) {
    echo "<tr>";
    echo '<td>' . $row['clubid'] . '</td>';
    echo '<td>' . $row['clubTitle'] . '</td>';
    echo '<td>' . $row['description'] . '</td>';
    echo '<td>' . $row['genreid'] . '</td>';
    echo '<td>' . $row['photoid'] . '</td>';
    echo '<td>' . $row['clubcalendar'] . '</td>';
    echo '<td>' . $row['ownerid'] . '</td>';
//    echo '<td> <input type="submit" value="Edit">';
//    echo '<td><a href="edit" class="edit' . $row['userID']. '">Edit</a></td>';
    echo '<td><a href="editclub/' . $row['clubid'] . '">Edit</a></td>';
    echo '<td><a href="clubdelete/' . $row['clubid'] . '">Delete</a></td>';
    echo "</tr>";
}

echo "</table>";

echo '<td><a href="createclub" class="add" >Add</a></td>';

?>

</body>

</html>
