<!DOCTYPE html> <!-- To change this license header, choose License Headers in Project Properties. To change this template file, choose Tools | Templates and open the template in the editor. -->
<?php include './connection.php';?>
<?php
require './Exception.php';
require './PHPMailer.php';
require './SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
?>
<html>    
    <head>        
        <meta charset="UTF-8">        
        <title>Login form</title>        
        <link rel="stylesheet" href="login.css">
        <link
       rel="stylesheet"
       href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css"
     />
        
        <style>
                  .registration-form form{
    background-color: #fff;
    max-width: 600px;
    margin: auto;
    padding: 50px 70px;
    border-top-left-radius: 30px;
    border-top-right-radius: 30px;
    border-bottom-left-radius: 30px;
    border-bottom-right-radius: 30px;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
}

       </style>
    </head>    
        <body style="background-color: #dee9ff;">
       <div class="registration-form" style="margin-top: 100px;">
          <form action="#" method="post">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                   <center><h1>OTP </h1></center>     
                </div>

                <!-- row -->
                

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="pass">Enter OTP:</label>
                            <input type="text" name="otp" class="form-control" placeholder="Enter One-Time-Password"> 
                            <br/><input type="submit" style="width: 430px;" class="btn btn-outline-primary" name="login" value="Login"/>
                        <?php echo $errpass?>
                        </div>
                    </div>
                    <div class="col-lg-12" style="padding-top: 10px; ">
                        
                        <div class="form-group">
                        <center>
                            <a href="login.php">
                            back to home </a>
                        </center>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
           </div>
    </form>

       </body>



<!--    <form action="#" method="POST">              
            <div class="header">                  
                <label >LOGIN FORM</label>            
            </div>              
            <div class="otp">                  
                <br/><label>Email Id: </label>                
                <input type="email" name="mail">                
                <br/><input type="submit" class="sh"name="VerifyOtp" value="sendOtp"/>                
                <br/><br/><br/><label> Enter OTP: </label>                
                <input type="text" name="otp">                
                <br/><input type="submit" name="login" value="Login"/>            
            </div>          
        </form>    -->
        <?php
        session_start();
        if (isset($_POST['login']))
            {
           
            if ($_POST['otp'] == $_SESSION['otp'])
            {
                     if(isset($_REQUEST["login"])){
    $sql = "UPDATE tbl_Customer SET is_Verified=1  WHERE email='".$_SESSION['email']."'";

if ($conn->query($sql) === TRUE) {   
    echo "<script>alert('verified successfully');</script>";

} else {
  echo "Error updating record: " . $conn->error;
  echo $sql;
}
                 echo " <script>alert('Login Sucessfull!!')</script> ";

$conn->close();
            
                     
            } 
            else
            {
                echo " <script>alert('Login FAiled!!')</script> ";
            }
        }
            }
        ?>        
    </body>
</html>