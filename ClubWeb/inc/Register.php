<?php
    include("scripts/Header.php");
?>
    <main>
        <form action="register" method="post">
            <input type="text" name="username" placeholder="username"></br>
            <input type="password" name="password" placeholder="password"></br>
            <p><input type="submit" value="Register"></p>
        </form>
    </main>

<?php
include("scripts/dbconnect.php");
$username = $_POST["username"];
$password = $_POST["password"];

function checkUser($username, $db)
{
    $sql = "SELECT username FROM port_users WHERE username='" . $username . "'";
    $result = $db->query($sql);
    while ($row = $result->fetch_array()) {
        if($row['username'] == $username) {
            return true;
        }
    }
    return false;
}

if (checkUser($username, $db)) {
    echo "user exists";
} else {
    "INSERT INTO port_users (username, password) VALUES ('$username', '$password')";
}




?>