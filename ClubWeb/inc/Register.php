<?php
    include("scripts/Header.php");
    ?>
    <main>
        <form action="register" method="post">
            <input type="text" name="username" placeholder="username"></br>
            <input type="password" name="password" placeholder="password"></br>
            <p><input type="submit" value="Submit"></p>
        </form>
    </main>
    <?
    include("scripts/Footer.php");
    include("scripts/dbconnect.php");
    $username = $_POST["username"];
    $password = $_POST["password"];

    function checkUsers($username, $password, $db) {
        $sql = "SELECT username, password FROM port_users";
        $result = $db->query($sql);
        while ($row = $result->fetch_array()) {
            if($row['username'] == $username || $row['password'] == $password) {
                return true;
            }
            return false;
        }
    }

    $sql = "INSERT INTO port_users (username, password)
VALUES ('$username', '$password')";
        if (mysqli_query($db, $sql)) {
            echo "New record created succesfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }
        mysqli_close($db);
// this is impossible
?>