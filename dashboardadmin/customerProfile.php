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
  <link
       rel="stylesheet"
       href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css"
     />
    </head>
    <body>
        <a href="logout.php"> Logout</a>
        <br>
        Hello
        <?php
         echo $_SESSION["fName"]."  ".$_SESSION["lName"]." You are a approve user of the platform";
         
        ?>
        <?php include './userProfile.php';?>
    </body>
</html>

