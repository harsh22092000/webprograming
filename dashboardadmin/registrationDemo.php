 <?php include './connection.php';?>

<?php
require './Exception.php';
require './PHPMailer.php';
require './SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
?>
<?php
$flag=0;
if(isset($_REQUEST["submit"])){
       //$fname=$_POST["fname"];
       $fnamemsg="";
       $lnamemsg="";
      // $fname=$_POST["fname"];
        //$lname=$_POST["lname"];
        //$email=$_POST["email"];
        if(empty($_POST["fName"]))
        {
            $fnamemsg="This Field must be Filled";
            $flag=1;
        }
        else
        {
             if(!preg_match("/^([a-zA-Z]{3,30})$/",$_POST["fName"])){
               $fnamemsg='Only alphabet can be use.';
             $flag=1;  
            } 
        }
       
        
        if(empty($_POST["lName"]))
        {
            $lnamemsg="This Field must be Filled";
            $flag=1;
        }
        else
        {
             if(!preg_match("/^([a-zA-Z]{3,30})$/",$_POST["lName"])){
               $lnamemsg='Only alphabet can be use.';
               $flag=1;
             } 
        
        }
       
       
       $Emailerr=""; 
        
	if(empty($_POST["email"]))
        {
            $Emailerr="Email must be Filled";
            $flag=1;
        }
        else 
        {
        
	if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL))
	{
            $Emailerr="*Invalid Email";
            $flag=1;
	}
       
        }
        
        
//        $phone = '0000000000';
        $phonemsg="";
        
        
        if(empty($_POST["contactNumber"]))
        { 
                $phonemsg= "Phone number must be filled...";
                $flag=1;

        }
        else
        {
                if(!preg_match("/^[0-9]{10}$/", $_POST["contactNumber"]))
                {
                        $phonemsg="*Invalid Phone Number";
                        $flag=1;
                }
         }
         
         
          $errpass="";
         
        if(empty($_POST["pass"]))
        { 
                $errpass= "Password must be filled...";
                $flag=1;
        }
        else
        {
         if(preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $_POST["pass"]) === 0)
         {
             $errpass = '<p class="errText">Password must be at least 8 characters and must '
                 . 'contain at least one lower case letter, one upper case letter and one digit</p>';
             $flag=1;
         } 
        }
        if(empty($_POST["gender"]))
        { 
                $genderer= "Gender must be selected...";
                $flag=1;
        }
        else
        {
         
        }
        
        if($flag==0){

$sql = "INSERT INTO tbl_Customer (fName, lName, contactNo,gender,email,password,DateofRegistration)
VALUES ('".$_POST[fName]."', '".$_POST[lName]."', '".$_POST[contactNumber]."','".$_POST[gender]."','".$_POST[email]."','".$_POST[pass]."','".date("Y-m-d")."')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
session_start();
$code = rand(1111, 9999);
        if (isset($_POST['submit'])) {
            if (isset($_POST['email'])) {
                $code = rand(1111, 9999);
                $emailID = $_POST['email'];
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
                $mail->addAddress($_POST['email']);
                
                if ($mail->send()) {
                 $_SESSION['otp']=$code; 
                    echo "mail sent";
                    $_SESSION["email"]=$_POST['email'];
                    header("location:verifyRegistration.php");
                } else {
                    echo 'Not Sent';
                } $mail->smtpClose();
            }
        }







        echo 'all Good';
}        

}
?> 
<!DOCTYPE html>
 <html lang="en">
   <head>
     <!-- Required meta tags -->
     <meta charset="utf-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="selfdesign.css">
     <!-- Bootstrap CSS -->
     <!-- https://cdnjs.com/libraries/twitter-bootstrap/5.0.0-beta1 -->
     <link
       rel="stylesheet"
       href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css"
     />
 
     <!-- Icons: https://getbootstrap.com/docs/5.0/extend/icons/ -->
     <!-- https://cdnjs.com/libraries/font-awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
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
     <title>Register | Coupon 7</title>
   </head>
   <body style="background-color: #dee9ff;">
       <div class="registration-form" style="margin-top: 10px;">
          <form action="#" method="post">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                   <center><h1>Register Customer </h1></center>
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label for="fName">First Name:</label>
                        <input type="text" name="fName" id="fName" placeholder="Enter First Name" class="form-control">
                        <?php 
                        echo $fnamemsg?>
                        </div>
                    </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="lName">Last Name:</label>
                    <input type="text" name="lName" id="lName" placeholder="Enter Last Name" class="form-control">
                    <?php echo $lnamemsg?>
                    </div>
                    </div>
                </div>

                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="contactNumber">Contact Number:</label>
                        <input type="text" name="contactNumber" id="contactNumber" placeholder="Enter Contact Number" class="form-control">
                        <?php echo $phonemsg?>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                        <label for="email">Enter Email</label>
                        <input type="email" name="email" id="email" placeholder="Enter Email" class="form-control">
                        <?php echo $Emailerr?>
                        
                    </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="pass">Enter Password:</label>
                        <input type="password" name="pass" id="pass" placeholder="Enter Password" class="form-control">
                        <?php echo $errpass?>
                        </div>
                    </div>
                    <div class="col-lg-12" style="padding-top: 10px; ">
                        
                        
            <table>
                <tr>
                    <td>
            <h4><span class = "label label-default" style="font-size: 17px ;font-style:normal;">Gender</span></h4>
            
                </td>    
                    
                    <td>
            <div class="form-check">
  <input class="form-check-input" type="radio" name="gender" id="gender" value="M">
  <label class="form-check-label" for="gender">
    Male
  </label>
</div>
</td>
<td>
<div class="form-check">
    <input class="form-check-input" type="radio" name="gender" id="gender" value="F">
  <label class="form-check-label" for="gender">
    Female
  </label>
</div>
    
</td>
<?php echo $genderer; ?>
                </tr>
            </table>
                        
                        <div class="form-group">
                        <center>
                            <input type="submit" name="submit" class="btn btn-outline-primary" style="width: 300px;" value="Register">
                        </center>
                        </div>
                    </div>
                </div>
                <!--f-->
                <div class="row">
                    <div class="col-lg-12">
                        <a href="login.php"> Already a Customer</a>
                    </div>
                </div>
                
                <!--f-->
            </div>
        </div>
    </div>
    </form>
              
      </div>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>
   </body>
 </html>
 