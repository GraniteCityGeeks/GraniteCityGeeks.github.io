<?php
/**
 * Created by PhpStorm.
 * User: 1611267
 * Date: 29/11/2016
 * Time: 12:44
 */

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
//    function checkLogin($username, $password) {
//        if($username === 'username' || $password === 'password') {
//            return false;
//        }
//        return true;
//    }
//    if (checkLogin($username, $password, $db)) {
//
//    }
    $sql = "INSERT INTO port_users (username, password) VALUES ('" . $username . "','" . $password . "')";
    $result = $db->query($sql);
} else {
// this is impossible
    print('whoops');
}
?>