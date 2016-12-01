<?php
include 'master.php';
?>

<html>
<head>
    <link href="master.css" rel="stylesheet" type="text/css">

    <title>GoPortlethen</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto');
    </style>
    </head>

<body>
<div id="main">
    <div id="editmap" style="float:left;">
        <form action="../scripts/markercreate.php" method="get">
            Marker Name:<br>
            <input type="text" name="name" placeholder="e.g Local Wood"><br><br>
            Address:<br>
            <input type="text" name="address" placeholder="123 Example St."><br><br>
            Latitude:<br>
            <input type="text" name="lat" placeholder=""><br><br>
            Longitude:<br>
            <input type="text" name="lng" placeholder=""><br><br>
            Type:<br>
            <input type="text" name="type" placeholder="e.g Playpark"><br><br>
            Marker Description :<br>
            <input type="text" name="markerdesc" placeholder="describe marker"><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
    <div id="marker-management" style="color:darkblue;font-family: 'Titillium Web', sans-serif;">
        <h1>Markers</h1>
        <table border="1">include("../scripts/dbconnect.php");
            $query = "SELECT * FROM port_markers";
            $result = $db->query($query);

            if ($result->num_rows > 0) {
            <tr>
                <th>Id No</th>
                <th>Marker</th>
                <th>Lat</th>
                <th>Lng</th>
                <th>description</th>
                <th>Delete</th>
            </tr>

        <?php
        //connect to the database.


            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>". $row["id"]."</td>";
                echo "<td>". $row["name"]."</td>";
                echo "<td>". $row["lat"]. "</td>";
                echo "<td>". $row["lng"]. "</td>";
                echo "<td>". $row["description"]. "</td>";
                echo "<td>". "<button name='delete' type='submit' action='../scripts/markerdelete' value='". $row["id"]. "'>". "delete". "</button>". "</td>";
                echo "</tr>";

            }
        }

        $db->close();
        ?>

        </table>

        <form action="deletemarker.php" method="get">
            Enter ID No : <input type="text" name="formid"><br>
            <input type="submit" value="id">
        </form>



    </div>












    </div>
</div>


</body>
</html>