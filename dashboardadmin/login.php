<?php session_start(); ?>
<?php
include './connection.php';
?>
<?php
$flag=0;
if(isset($_REQUEST["submit"])){
       
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
        
       
        if($flag==0){
 
$usr=$_POST["email"];
$pas=$_POST["pass"];
$sql = "select count(*) from tbl_Customer where email ='$usr' and password='$pas'";
$result = $conn->query($sql);
    $rows=$result->fetch_assoc();

if ($rows["count(*)"]> 0) {

$sql = "select * from tbl_Customer where email ='$usr' and password='$pas'";
$result = $conn->query($sql);
$rows=$result->fetch_assoc();

$_SESSION["fName"]=$rows["fName"];
$_SESSION["lName"]=$rows["lName"];
$_SESSION["cId"]=$rows["cId"];
$_SESSION["is_Approve"]=$rows["isApprove"];
$_SESSION["role"]='C';

echo "Session Variables";
echo $_SESSION["fName"];
echo $_SESSION["lName"];
echo $_SESSION["cId"];
    echo '<script>alert("Success");</script>';

if ($_SESSION["is_Approve"]==1){
    header("location:customerDashboard.php");
}
 else {
    header("location:customerNotApproved.php");
 }
}
 else {
     echo '<script>alert("Failed");</script>';

  
 }
$conn->close();
  $pas=$_POST["pass"];


        
}        

}
?> 
<!DOCTYPE html>
 <html lang="en">
   <head>
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
     <link
       rel="stylesheet"
       href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
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
     <title>Customer Login | Coupon 7</title>
   </head>
   <body style="background-color: #dee9ff;">
       <div class="registration-form" style="margin-top: 100px;">
          <form action="#" method="post">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                   <center><h1>Customer Login </h1></center>
                   
                </div>

                <!-- row -->
                <div class="row">
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
                            <input type="password" name="pass" id="pass" value="<?php echo $pas;?>" placeholder="Enter Password" class="form-control">
                        <?php echo $errpass?>
                        </div>
                    </div>
                    <div class="col-lg-12" style="padding-top: 10px; ">
                        
                        <div class="form-group">
                        <center>
                            <input type="submit" name="submit" class="btn btn-outline-primary" style="width: 400px;" value="Login">
                        </center>
                        </div>
                        
                        
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <a href="registrationDemo.php"> New Customer</a>
                    </div>
                    <div class="col-lg-12">
                        <a href="resetPassEmail.php"> Forget Password</a>
                    </div>
                </div>
            </div>
        </div>
           </div>
    </form>
              
      </div>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>
   </body>
 </html>
 