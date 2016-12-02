<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>

    <title>View Records</title>

</head>

<body>



<?php

/*

VIEW.PHP

Displays all data from 'players' table

*/



// connect to the database

include("scripts/dbconnect.php");



// get results from database

$result = mysqli_query("SELECT * FROM port_users");


// display data in table

echo "<p><b>View All</b></p>";



echo "<table border='1' cellpadding='10'>";

echo "<tr> <th>ID</th> <th>First Name</th> <th>Last Name</th> <th></th> <th></th></tr>";



// loop through results of database query, displaying them in the table

while($row = mysqli_fetch_array($result)) {



// echo out the contents of each row into a table

    echo "<tr>";

    echo '<td>' . $row['userID'] . '</td>';

    echo '<td>' . $row['username'] . '</td>';

    echo '<td>' . $row['password'] . '</td>';

    echo '<td>' . $row['bio'] . '</td>';

    echo '<td>' . $row['accessLevelID'] . '</td>';

    echo '<td>' . $row['photoID'] . '</td>';

//    echo '<td><a href="edit.php?id=' . $row['userID'] . '">Edit</a></td>';
//
//    echo '<td><a href="delete.php?id=' . $row['userID'] . '">Delete</a></td>';

    echo "</tr>";

}

echo "</table>";

?>

<!--<p><a href="new.php">Add a new record</a></p>-->



</body>

</html>