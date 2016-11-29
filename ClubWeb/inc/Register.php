<?php
    include("scripts/header.php");
    ?>
    <main>
        <form action="register" method="post">
            <input type="text" name="username" placeholder="username"></br>
            <input type="password" name="password" placeholder="password"></br>
            <p><input type="submit" value="Submit"></p>
        </form>
    </main>
    <?
    include("scripts/footer.php");
    $sql = "INSERT INTO port_users (username, password) VALUES ('" . $username . "','" . $password . "');";