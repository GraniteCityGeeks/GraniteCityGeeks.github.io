<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include("scripts/dbconnect.php");
    $username = $_POST["username"];
    $password = $_POST["password"];

    function checklogin($username, $password, $db)
    {
        $sql = "SELECT * FROM port_users WHERE username='" . $username . "' and
password='" . $password . "'";
        $result = $db->query($sql);
        while ($row = $result->fetch_array()) {
            return true;
        }
        return false;
    }
    if (checklogin($username, $password, $db)) {
        session_start();
        $_SESSION['username'] = $username;
        header("location:./");
    } else {
        header("location:login");
    }
} else {
// this is impossible
    print('whoops');
}
?>