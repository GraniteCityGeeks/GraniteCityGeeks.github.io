<?php
    include("scripts/dbconnect.php");

    $username = $_POST["username"];
    $password = $_POST["password"];

    if(checkUsers($username, $db)) {
        $sql = "INSERT INTO port_users (username, password) VALUES ('$username', '$password')";

        if (mysqli_query($db, $sql)) {
            echo "New record created succesfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }

        mysqli_close($db);
    } else {
        echo "Sorry! That username is already in use.";
    }

    function checkUsers($username, $db) {
        $sql = "SELECT username FROM port_users";
        $result = mysqli_query($db, $sql);

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            if($row['username'] == $username) {
                return false;
            }
            //echo "<p>" . $row['username'] . "</p>";
        }
        return true;
    }

?>