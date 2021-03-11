<?php session_start(); ?>
<?php if(empty($_SESSION))
    {
    header("location:lander.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <center>
        Hello
        <?php
         echo $_SESSION["fName"]." ".$_SESSION["lName"];
        ?>
        <br>
        Kindly Wait for admin to approve you as authorised User of the platform
        <br>
        </center>
        <a href="logout.php"> Logout</a>
        <br>
        
    </body>
</html>
