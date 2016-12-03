<?php
    include("scripts/Header.php");
?>
    <main>
        <form action="register" method="post">
            <input type="text" name="username" placeholder="username"></br>
            <input type="password" name="password" placeholder="password"></br>
            <p><input type="submit" value="Register!"></p>
        </form>
    </main>

<?php

    include("scripts/Footer.php");
    include("scripts/dbconnect.php");

if(isset($_POST['username']) && isset($_POST['password'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $query = query("SELECT * FROM port_users WHERE username='$username'");
    if(num_rows($query) > -1 ) { //check if there is already an entry for that username
        echo "Username already exists!";
    }else{
        query("INSERT INTO port_users (username, password) VALUES ('$username', '$password')");
        header("location:login");
    }
}
mysqli_close();



?>