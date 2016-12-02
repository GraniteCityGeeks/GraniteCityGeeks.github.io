 <?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    include("scripts/header.php");
    ?>
    <main>
        <form action="login" method="post">
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
    $accesslevel = -1;
    function checklogin($username, $password, $db)
    {
        $sql = "SELECT * FROM port_users WHERE username='" . $username . "' and
password='" . $password . "'";
        $result = $db->query($sql);
        while ($row = $result->fetch_array()) {
            global $accesslevel;
            $accesslevel = $row['accessLevelID'];
            return true;
        }
        return false;
    }

    if (checklogin($username, $password, $db)) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['accessLevelID'] = $accesslevel;
        header("location:./");
    } else {
        header("location:login");
    }

} else {
// this is impossible
    print('whoops');
}
?>