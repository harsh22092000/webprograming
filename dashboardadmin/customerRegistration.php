<?php

       //$fname=$_POST["fname"];
       $fnamemsg="";
       $lnamemsg="";
      // $fname=$_POST["fname"];
        //$lname=$_POST["lname"];
        //$email=$_POST["email"];
        if(empty($_POST["fname"]))
        {
           // $fnamemsg="This Field must be Filled";
        }
        else
        {
             if(!preg_match("/^([a-zA-Z' ]+)$/",$_POST["fname"])){
               $fnamemsg='Only alphabet can be use.';
        } 
        }
       
        
        if(empty($_POST["lname"]))
        {
           // $lnamemsg="This Field must be Filled";
        }
        else
        {
             if(!preg_match("/^([a-zA-Z' ]+)$/",$_POST["lname"])){
               $lnamemsg='Only alphabet can be use.';
        } 
        
        }
       
       
       $Emailerr=""; 
        
	if(empty($_POST["email"]))
        {
           // $Emailerr="Email must be Filled";
        }
        else 
        {
        
	if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL))
	{
            $Emailerr="*Invalid Email";
	}
        
	
        }
        
        
        $phone = '000-0000-0000';
        $phonemsg="";
        
        
        if(empty($_POST["phone"]))
        { 
               // $phonemsg= "Phone number must be filled...";
        }
            else
            {
                if(!preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $phone))
                {
                        $phonemsg="*Invalid Phone Number";
                        // $phone is valid
                }
               
         
         }
         
         
          $errpass="";
         
         if(empty($_POST["pass"]))
        { 
               // $errpass= "Password must be filled...";
        }
        else
        {
         if(preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $_POST["pass"]) === 0)
         {
             $errpass = '<p class="errText">Password must be at least 8 characters and must '
                 . 'contain at least one lower case letter, one upper case letter and one digit</p>';
          }
        }
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equ="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Easiest Way to Add Input Masks to Your Forms</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    
    <style>
        body{
    background-color: #dee9ff;
}

.registration-form{
	padding: 50px 0;
}

.registration-form form{
    background-color: #fff;
    max-width: 600px;
    margin: auto;
    padding: 50px 70px;
    border-top-left-radius: 30px;
    border-top-right-radius: 30px;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
}


.registration-form .form-icon{
	text-align: center;
    background-color: #5891ff;
    border-radius: 50%;
    font-size: 40px;
    color: white;
    width: 100px;
    height: 100px;
    margin: auto;
    /*margin-bottom: 10px;*/
    line-height: 100px;
}

.registration-form .item{
	border-radius: 20px;
    margin-bottom: 25px;
    padding: 10px 20px;
}

.registration-form .create-account{
    border-radius: 30px;
    padding: 10px 20px;
    font-size: 18px;
    font-weight: bold;
    background-color: #5791ff;
    border: none;
    color: white;
    margin-top: 20px;
}

.registration-form .social-media{
    max-width: 600px;
    background-color: #fff;
    margin: auto;
    padding: 35px 0;
    text-align: center;
    border-bottom-left-radius: 30px;
    border-bottom-right-radius: 30px;
    color: #9fadca;
    border-top: 1px solid #dee9ff;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
}

.registration-form .social-icons{
    margin-top: 30px;
    margin-bottom: 16px;
}

.registration-form .social-icons a{
    font-size: 23px;
    margin: 0 3px;
    color: #5691ff;
    border: 1px solid;
    border-radius: 50%;
    width: 45px;
    display: inline-block;
    height: 45px;
    text-align: center;
    background-color: #fff;
    line-height: 45px;
}

.registration-form .social-icons a:hover{
    text-decoration: none;
    opacity: 0.6;
}

@media (max-width: 576px) {
    .registration-form form{
        padding: 50px 20px;
    }

    .registration-form .form-icon{
        width: 70px;
        height: 70px;
        font-size: 30px;
        line-height: 70px;
    }
}


#firstname{
    padding-left: 40px;
    
}

#lastname
{
    padding-right: 40px;
    
}

.form-check-input
{
    margin-left: 15px;
}

.form-check-label
{
    margin-left: 30px;
}
.usric{
    margin-bottom: 10px;
}

        
    </style>
    <link rel="stylesheet" href="Design.css">
    <!--<link href="simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="bootstrap.min.css" rel="stylesheet" type="text/css"/>-->

</head>
<body>
    
    
    
    
    <div class="registration-form">
        <form action="customer-registration.php" method="post">
            
            <div class="form-icon" style="padding-top: 30px;">
               <span><i class="icon icon-user " style="text-align: center; padding-top: 100%"></i></span>
            </div>
            
             <center>  <h1><span class = "label label-default usric" style="font-size: 27px ;font-style:normal;">Customer Registration</span></h1></center>
            <table>
                <tr>
                    <td> <div class="form-group">
                            <input type="text" class="form-control item" id="firstname" name="fname" placeholder="First Name" required=""><?php echo $fnamemsg?>
            </div></td>
            
             <td><div class="form-group">
                     <input type="text" class="form-control item" id="lastname" name="lname" placeholder="Last Name" required=""><?php echo $lnamemsg?>
                 </div></td>
               </tr> </table>
            
             <div class="form-group">
                 <input type="email" class="form-control item" id="email" name="email" placeholder="Email" required=""><?php echo $Emailerr?>
            </div>
            
          
            <div class="form-group">
                <input type="tel" class="form-control item" id="phone-number" name="phone" placeholder="Phone Number" required=""><?php echo $phonemsg?>
            </div>
            
            
             <div class="form-group">
                 <input type="password" class="form-control item" id="password" name="pass" placeholder="Password" required=""><?php echo $errpass?>
            </div>
            
            
            <table>
                <tr>
                    <td>
            <h4><span class = "label label-default" style="font-size: 17px ;font-style:normal;">Gender</span></h4>
            
                </td>    
                    
                    <td>
            <div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioDisabled">
  <label class="form-check-label" for="flexRadioDisabled">
    Male
  </label>
</div>
</td>
<td>
<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioCheckedDisabled" >
  <label class="form-check-label" for="flexRadioCheckedDisabled">
    Female
  </label>
</div>
</td>
            </tr>
            </table>
            
            <div class="form-group">
                <input type="submit" class="btn btn-" value="Register">
            </div>
             
        </form>
        <div class="social-media">
            <h5>Sign up with social media</h5>
            <div class="social-icons">
                <a href="#"><i class="icon-social-facebook" title="Facebook"></i></a>
                <a href="#"><i class="icon-social-google" title="Google"></i></a>
                <a href="#"><i class="icon-social-twitter" title="Twitter"></i></a>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="Script.js"></script>
</body>
</html>
