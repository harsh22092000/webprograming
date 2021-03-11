<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Reset | Coupon7</title>
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
                   <center><h1>Reset Password </h1></center>
                   
                </div>

                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                        <label for="email">Enter Password:</label>
                        <input type="password" name="npass" class="form-control" placeholder="Enter Password">
                        <?php echo $Emailerr?>
                        
                    </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="pass">Enter Password:</label>
                             <input type="password" class="form-control" name="cpass" placeholder="Confirm Password">
                        <?php echo $errpass?>
                        </div>
                    </div>
                    <div class="col-lg-12" style="padding-top: 10px; ">
                        
                        <div class="form-group">
                        <center>
                            <input type="submit" name="submit" style="width: 400px;" class="btn btn-outline-primary" value="Reset">
                            
                        </center>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
           </div>
    </form>
        
            
        <?php
        include 'connection.php';
        if(isset($_POST['submit']))
        {
            
            if(isset($_GET['email']))
            {
                $email=$_GET['email'];
                $newpassword=$_POST['npass'];
                $cpassword=$_POST['cpass'];
                
                
                
                if($newpassword==$cpassword)
                {
                    $update="update tbl_Customer set password='$newpassword' where email='$email'";
                    
                    $query= mysqli_query($conn, $update);
                    
                    if($query)
                    {
                        
                        header("location:login.php");
                    }
                    else
                    {
                        echo 'not updated';
                    }
                    
                    
                }
            }
        }
        ?>
    </body>
</html>
