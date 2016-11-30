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
    $sql = "INSERT INTO port_users (username, password, accessLevelID)
VALUES ('$username', '$password', '1')";
        if (mysqli_query($db, $sql)) {
            echo "New record created succesfully";
            session_start();
            $_SESSION['accessLevelID'] == 1;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }
        mysqli_close($db);
// this is impossible
?>