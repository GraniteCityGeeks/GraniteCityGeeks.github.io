 <?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    include("scripts/header.php");
    ?>
    <main>
      <div style="text-align: center;">
        <br/>
        <br/>
        <p><ul> Please Log In  <ul/></p>
        <br/>
        <form action="login" method="post">
          <label for="username">Username:</label>
            <input type="text" name="username" placeholder="username"></br>
          <label for="password">Password:</label>
            <input type="password" name="password" placeholder="password"></br>
            <p><input type="submit" value="Login!"></p>
        </form>
      </div>
    </main>
    <?
    include("scripts/footer.php");
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include("scripts/dbconnect.php");
    $username = $_POST["username"];
    $password = $_POST["password"];

    function checklogin($username, $password, $db)
    {
        $sql = "SELECT * FROM port_users WHERE username='" . $username . "' and
        password='" . $password . "'";
        $result = $db->query($sql);
        while ($row = $result->fetch_array()) {
            session_start();
            $_SESSION['userID'] = $row['userID'];
            $_SESSION['accessLevelID']  = $row['accessLevelID'];
            $_SESSION['photoID']  = $row['photoID'];
            if ($_SESSION ['photoID'] == ""){
                $_SESSION ['photoID'] = "https://www.mautic.org/media/images/default_avatar.png";
            }
            $_SESSION['confirmed'] = $row['confirmed'];
            return true;
        }
        return false;
    }

    if (checklogin($username, $password, $db)) {
        $_SESSION['username'] = $username;
        header("location:./");
    } else {
        header("location:login");
    }

} else {
// this is impossible
    print('hello');
}
?>
