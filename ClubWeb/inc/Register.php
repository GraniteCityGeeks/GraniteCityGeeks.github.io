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

function checkuser($username, $db)
{
    $sql = "SELECT * FROM port_users WHERE username='" . $username . "'";
    $result = $db->query($sql);
    while ($row = $result->fetch_array()) {
        return true;
    }
    return false;
}

if (checkuser($username, $db)) {
    echo "user exists";
} else {
    "INSERT INTO users (username, password) VALUES ('$username', '$password')";
}




?>