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

<?php

    include("scripts/Footer.php");
    include("scripts/dbconnect.php");

    $username = $_POST["username"];
    $password = $_POST["password"];

        $sql = "SELECT username FROM port_users WHERE username = '$username'";

        $result=mysqli_query($sql);

        if (mysqli_num_rows($result)!=0) {
            echo "Name already exists";
        } else {
            "INSERT INTO port_users (username, password) VALUES ('$username', '$password')";
        }
        mysqli_close($db);



?>