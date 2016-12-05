<?php
include("scripts/Header.php");
?>

    <main>
        <form action="/AddUser" method="post">
            <input type="text" name="username" placeholder="username"></br>
            <input type="password" name="password" placeholder="password"></br>
            <p><input type="submit" value="Submit"></p>
        </form>
    </main>

<?php
    include("scripts/Footer.php");
?>