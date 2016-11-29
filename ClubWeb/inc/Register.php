<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
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
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include("scripts/dbconnect.php");
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "INSERT INTO port_users '" . $username . "' and
password='" . $password . "'";
        $result = $db->query($sql);
        while ($row = $result->fetch_array()) {
            return true;
        }
        return false;
}