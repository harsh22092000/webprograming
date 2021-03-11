
<html>
    <head>
        <title>send mail</title>
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
                   <center><h1> Send Mail</h1></center>
                   
                </div>

                  
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                        <label for="email">Enter Email</label>
                        <input type="email" class="form-control" name="email" placeholder="send email" required="">
                        
                        
                    </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                                    <input type="submit" name="submit" class="btn btn-outline-primary" style="width: 400px;margin-top: 10px;" value="send">
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
           </div>
    </form>
              
      </div>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>
   </body>
    
    
    
    
<!--    
    
    
    <body>
        
        <form action="#" method="post">
        <input type="email" name="email" placeholder="send email">
        <input type="submit" name="submit" value="send">
        </form>
    </body>-->
</html>
<?php

include 'connection.php';

    require './PHPMailer.php';
    require './Exception.php';
    require './SMTP.php';
   
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    if(isset($_REQUEST['submit']))
    {
         
        $email=$_POST['email'];
           
        $emailquery="select * from tbl_Customer where email='$email'";
        
        $query= mysqli_query($conn,$emailquery);
        $emailcount= mysqli_num_rows($query);
        
        
        
        
        if($emailcount)
        {
        
           $userdata= mysqli_fetch_array($query); 


           
    $mail=new PHPMailer();
    $mail->isSMTP();
    $mail->Host="smtp.gmail.com";
    $mail->SMTPAuth="true";
    $mail->SMTPSecure="tls";
    $mail->Port="587";
    $mail->Username="18bmiit066@gmail.com";
    $mail->Password="smit1234";
    $mail->Subject="Check Mail";
    $mail->setFrom("18bmiit066@gmail.com");
    //$mail->Body="This is our first mail";
    $mail->Body="click here to reset your password http://localhost:8888/dashboardadmin/resetPassword.php?email=$email";
    $mail->addAddress($email);
   
        }
      
    
    if($mail->send())
    {
    echo"mail sent".$mail->ErrorInfo;
    }
    else    
    {
     echo"Not sent".$mail->ErrorInfo;  
    }
    $mail->smtpClose();
   }
 else {
       echo 'no email found';
   }
        
 
?>
