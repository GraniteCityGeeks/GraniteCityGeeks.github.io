<?php
include '../navBar/master.php';
?>

<html xmlns="http://www.w3.org/1999/html">
    <link href="../CSS/bootstrap.min.css" rel="stylesheet" />
    <link href="../CSS/half-slider.css" rel="stylesheet" />
    <link href="../CSS/healthPage.css" rel="stylesheet" />


    <header id="myCarousel" class="carousel slide">
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image: url('../Images/train.jpg')"></div>
            </div>
            <div class="item">
                <div class="fill" style="background-image: url('../Images/rain.jpg')"></div>

            </div>
            <div class="item">
                <div class="fill" style="background-image: url('../Images/tree.jpg')"></div>

            </div>
        </div>
    </header>

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <script>


        $('.carousel').carousel({
            interval: 5000
        })

    </script>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Contributor Health Page</h1>
                <hr/>
            </div>
                    <div class="col-lg-12"  style="width: 350px">
                        <h3>Add Article</h3>
                        <i>Add a new article below!</i>
                        <br>
                        <br>

                        <form>
                            Enter Text:
                            <br>
                            <input type="text" name="title" id="title" placeholder="title"/></br>
                            <br>
                           <textarea name="text" id="text" placeholder="description"></textarea></br>
                            <br>
                            <input type="button" value="Add"  onclick="insert();"/>
                        </form>
                    </div>

                <div class="col-lg-12" style="width: 350px">
                    <h3>Edit Article</h3>
                    <i>Edit an existing article below!</i>
                    <br>
                    <br>

                    <form>
                        Select Article to Edit:
                        <br>
                        <select id="oldTitle">
                            <?php
                            include('dbconnect.php');
                            /* this script loads the article the user clicked on.*/

                            $sql = "SELECT * FROM port_articles";
                            $result = $db->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value='.htmlspecialchars($row['title']).'>'.htmlspecialchars($row['title']).'</option>';
                                }
                            }
                            else {
                                echo "0 results";
                            }
                            $db->close();

                            ?>
                        </select>
                        <br>
                        <br>
                        Enter Text Here:
                        <br>
                        <input type="text" name="titleEdit" id="titleEdit" placeholder="title"/></br>
                        <br>
                        <textarea name="textEdit" id="textEdit" placeholder="description"></textarea></br>
                        <br>
                        <input type="button" value="Edit" onclick="edit();"/>
                    </form>

                </div>

            <div class="col-lg-12" style="width: 350px">
                <h3>Delete Article</h3>
                <i>Delete an existing article below!</i>
                <br>
                <br>

                <form>
                    Select Article to Delete:
                    <br>
                    <select id="toDelete">
                        <?php
                        include('dbconnect.php');
                        /* this script loads the article the user clicked on.*/

                        $sql = "SELECT * FROM port_articles";
                        $result = $db->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value='.htmlspecialchars($row['title']).'>'.htmlspecialchars($row['title']).'</option>';
                            }
                        }
                        else {
                            echo "0 results";
                        }
                        $db->close();

                        ?>
                    </select>
                    <br>
                    <br>
                    <input type="button" value="Delete" onclick="thisDelete();"/>
                </form>

            </div>

        </div>
    </div>

    <div id="result"></div>


</html>

<script type="text/javascript">

    function insert()
    {
        var title = $('#title').val();
        var desc = $('#text').val();
        var type = "insert";

        if($('#title').val() == ''){
            alert('Title input can not be left blank');
        }else if($('#text').val() == ''){
            alert('Text input can not be left blank');
        }else{
            $.post('editHealth.php',{title:title,desc:desc,type:type}, function(data)
                {
                    $('#result').html(data);
                    alert(data);
                    window.location.replace("http://gcg.azurewebsites.net/healthFinal/webPages/healthyLiving.php");
                }
            );
        }

    }

    function edit()
    {
        var title = $('#titleEdit').val();
        var desc = $('#textEdit').val();
        var type = "edit";
        var oldTitle = document.getElementById("oldTitle").options[document.getElementById("oldTitle").selectedIndex].text;

        if($('#titleEdit').val() == ''){
            alert('Title input can not be left blank');
        }else if($('#textEdit').val() == ''){
            alert('Text input can not be left blank');
        }else{

        $.post('editHealth.php',{title:title,desc:desc,type:type,oldTitle:oldTitle}, function(data)
            {
                $('#result').html(data);
                alert(data);
                window.location.replace("http://gcg.azurewebsites.net/healthFinal/webPages/healthyLiving.php");
            }
        );

        }
    }

    function thisDelete()
    {
        var type = "delete";
        var toDelete = document.getElementById("toDelete").options[document.getElementById("toDelete").selectedIndex].text;

        $.post('editHealth.php',{type:type,toDelete:toDelete}, function(data)
            {

                $('#result').html(data);
                alert(data);
                window.location.replace("http://gcg.azurewebsites.net/healthFinal/webPages/healthyLiving.php");
            }
        );
    }


</script>