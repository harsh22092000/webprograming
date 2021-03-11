<!DOCTYPE html> <!-- To change this license header, choose License Headers in Project Properties. To change this template file, choose Tools | Templates and open the template in the editor. -->
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
                        <label for="email">Enter Email:</label>
                        <input type="email" placeholder="Enter Email:" class="form-control" name="mail">
                        <br/><input type="submit" style="width: 400px;" placeholder="Enter Email:" class="btn btn-outline-primary" name="VerifyOtp" value="sendOtp"/>                

                        <?php echo $Emailerr?>
                        
                    </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="pass">Enter OTP:</label>
                            <input type="text" name="otp" class="form-control" placeholder="Enter One-Time-Password"> 
                            <br/><input type="submit" style="width: 400px;" class="btn btn-outline-primary" name="login" value="Login"/>
                        <?php echo $errpass?>
                        </div>
                    </div>
                    <div class="col-lg-12" style="padding-top: 10px; ">
                        
                        <div class="form-group">
                        <center>
                            <!--<input type="submit" name="submit" style="width: 400px;" class="btn btn-outline-primary" value="Reset">-->
                            
                        </center>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
           </div>
    </form>

       </body>



<!--        
        <form action="#" method="POST">              
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
        </form>          -->
        <?php
        session_start();
        if (isset($_POST['login']))
            {
           
            if ($_POST['otp'] == $_SESSION['otp'])
            {
               // session_start();
                $_SESSION['loginUser'] = $_POST['mail'];
                 echo " <script>alert('Login Sucessfull!!')</script> ";
            } 
            else
            {
                echo " <script>alert('Login FAiled!!')</script> ";
            }
        }
        $code = rand(1111, 9999);
        if (isset($_POST['VerifyOtp'])) {
            if (isset($_POST['mail'])) {
                $code = rand(1111, 9999);
                $emailID = $_POST['mail'];
                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPAuth = "true";
                $mail->SMTPSecure = "tls";
                $mail->Port = "587";
                $mail->Username = "18bmiit066@gmail.com"; //Your Email ID
                $mail->Password = "smit1234"; //Enter Email ID
                $mail->Subject = "Check Mail";
                $mail->setFrom("18bmiit066@gmail.com"); //Your Email ID
                $mail->Body = "Your OTP is ".$code;
                $mail->addAddress($_POST['mail']);
                
                if ($mail->send()) {
                 $_SESSION['otp']=$code; 
                    echo "mail sent";
                } else {
                    echo 'Not Sent';
                } $mail->smtpClose();
            }
        }
        ?>        
    </body>
</html>