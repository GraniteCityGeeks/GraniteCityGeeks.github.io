 <?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("scripts/header.php");

include("scripts/dbconnect.php");

$sql = "SELECT * FROM port_club_article AS A, port_club AS C, port_photo AS P WHERE C.clubid = A.clubid AND A.photoid = P.photoid";

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

echo "<p><b>Club Articles</b></p>";

echo "<div style=\"overflow-x:auto;\">";

echo "<table>";

echo "<tr> <th>Article ID</th> <th>Club Name</th> <th>Article</th> <th>Photo</th> </tr>";

$result = $db->query($sql);
while ($row = $result->fetch_array()) {
    echo "<tr>";
    echo '<td>' . $row['clubarticleid'] . '</td>';
    echo '<td>' . $row['clubTitle'] . '</td>';
    echo '<td>' . $row['title'] . '</td>';
    echo '<td>' . $row['URL'] . '</td>';
//    echo '<td> <input type="submit" value="Edit">';
//    echo '<td><a href="edit" class="edit' . $row['userID']. '">Edit</a></td>';
    echo '<td><a href="deleteArticle/' . $row['clubarticleid'] . '">Delete</a></td>';
    if ($row['confirmArticle'] == 0) {
        echo '<td><a href="confirmArticle/' . $row['clubarticleid'] . '">Confirm Article</a></td>';
    } else {
        echo '<td>Article Confirmed</td>';
    }
    echo "</tr>";
}

echo "</table>";

//echo '<td><a href="add" class="add" >Add</a></td>';

?>

</body>

</html>