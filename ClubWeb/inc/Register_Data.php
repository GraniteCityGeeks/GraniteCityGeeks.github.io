<?php     //start php tag
//include connect.php page for database connection
include("scripts/dbconnect.php");
//if submit is not blanked i.e. it is clicked.
if(isset($_REQUEST['submit'])!='')
{
    if($_REQUEST['name']=='' || $_REQUEST['email']=='' || $_REQUEST['password']==''|| $_REQUEST['repassword']=='')
    {
        echo "please fill the empty field.";
    }
    else
    {
        $sql="insert into port_users(username,password) values('".$_REQUEST['username']."', '".$_REQUEST['password']."')";
        $res=mysqli_query($sql);
        If($res)
        {
            echo "Record successfully inserted";
        }
        else
        {
            echo "There is some problem in inserting record";
        }

    }
}

?>