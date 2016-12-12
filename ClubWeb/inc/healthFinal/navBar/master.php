<!DOCTYPE html>
<html lang="en">

<head runat = "server">
    <title>
        Discover Aberdeen
    </title>


    <link href="http://gcg.azurewebsites.net/healthFinal/CSS/NavbarMaster.css" rel="stylesheet" />

</head >

<body class="master-body">
<form id="form1" runat="server" style="height: 50px">
    <header >
        <nav>
            <ul>
                <li><a href="http://gcg.azurewebsites.net/ClubWeb/index"><b>Home</b></a></li>
                <li>
                    <a href="http://gcg.azurewebsites.net/ClubWeb"><b>Clubs</b></a>
                </li>
                <li><a href="http://gcg.azurewebsites.net/ClubWeb/healthLiving"><b>Healthy Living</b></a></li>
                <li><a href="http://gcg.azurewebsites.net/ClubWeb/mapsindex"><b>Local Trails</b></a></li>
                <li><a href="#"><b>Login</b></a></li>
                <li><a href="#"><b>Site Users</b></a>
                    <ul>
                        <li><a href="#">Admin</a>
                        <ul>
                            <li><a href="#">Clubs</a></li>
                            <li><a href="/healthFinal/webPages/adminpage.php">Health</a></li>
                            <li><a href="#">Maps</a></li>
                        </ul></li>
                        <li><a href="#">Contributor</a>
                         <ul>
                            <li><a href="#">Clubs</a></li>
                            <li><a href="/healthFinal/webPages/contributorPage.php">Health</a></li>
                            <li><a href="#">Maps</a></li>

                        </ul>
                     </ul>
                         </li>

            </ul>

                <ul class="right">
                     <li ><label style="Width=300px Font-Bold=true" ID="WelcomeLabel">Welcome User</label> </li>
                </ul>

        </nav>

    </header>
</form>
</body>
</html>

<?php
?>