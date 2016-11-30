<?php
include 'master.php';
?>

<html>
<head>
    <link href="master.css" rel="stylesheet" />

    <title>GoPortlethen</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto');
    </style>
    </head>

<body>
<div id="editmap" style="float:left;">
    <form action="../markercreate.php">
        Marker Name:<br>
        <input type="text" name="name" value="e.g Local Wood"><br>
        Address:<br>
        <input type="text" name="address" value="123 Example St."><br><br>
        Latitude:<br>
        <input type="text" name="lat" value=""><br><br>
        Longitude:<br>
        <input type="text" name="lng" value=""><br><br>
        Type:<br>
        <input type="text" name="type" value="e.g Playpark"><br><br>
        Marker Description :<br>
        <input type="text" name="address" value="123 Example St."><br><br>
        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>