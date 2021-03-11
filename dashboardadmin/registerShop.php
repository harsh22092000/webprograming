<?php include './index.php'; ?>
<?php include './connection.php'; ?>
<?php 
$flag=0;
if(isset($_REQUEST["submit"])){
       //$fname=$_POST["fname"];
       //$fnamemsg="";
       //$lnamemsg="";
      // $fname=$_POST["fname"];
        //$lname=$_POST["lname"];
        //$email=$_POST["email"];
       
//                        <input type="text" name="fName" id="fName" placeholder="Enter First Name" class="form-control">
//                    <input type="text" name="lName" id="lName" placeholder="Enter Last Name" class="form-control">
//                        <input type="text" name="contactNumber" id="contactNumber" placeholder="Enter Contact Number" class="form-control">
//                        <input type="email" name="email" id="email" placeholder="Enter Email" class="form-control">
//                        <input type="password" name="pass" id="pass" placeholder="Enter Password" class="form-control">
//                <center> <h3>Shop Details</h3></center>
//                                <input type="text" name="shopName" id="shopName" placeholder="Enter Shop Name" class="form-control">
//                                <input type="text" name="gst" id="gst" placeholder="Enter GST Number" class="form-control">
//                            <textarea class="form-control" id="exampleFormControlTextarea1"  placeholder="Enter Shop Address" class="form-control"></textarea>
//                        
//       
       
       
       
//       gafdasdfa
        if(empty($_POST["fName"]))
        {
            $fnamemsg="This Field must be Filled";
            $flag=1;
        }
        else
        {
             if(!preg_match("/^([a-zA-Z]{3,30})$/",$_POST["fName"])){
               $fnamemsg='Only alphabet can be use in Fname.';
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
               $lnamemsg='Only alphabet can be use in Lname.';
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
        if(empty($_POST["shopName"]))
        {
            $shopname="This Field must be Filled";
            $flag=1; 
        }
        else
        {
             if(!preg_match("/^([a-zA-Z]{3,30})$/",$_POST["shopName"])){
               $shopname='Only alphabet can be use.';
             $flag=1;  
            } 
        }
        if(empty($_POST["gst"]))
        {
            $gst="This Field must be Filled";
            $flag=1;
        }
        else
        {
             if(!preg_match("/^([0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1})$/",$_POST["gst"])){
               $gst='Only alphabet can be use.';
             $flag=1;  
            } 
        }
        if(empty($_POST["shopAdd"]))
        {
            $add="This Field must be Filled";
            $flag=1;
        }
        
   //                        <input type="text" name="fName" id="fName" placeholder="Enter First Name" class="form-control">
//                    <input type="text" name="lName" id="lName" placeholder="Enter Last Name" class="form-control">
//                        <input type="text" name="contactNumber" id="contactNumber" placeholder="Enter Contact Number" class="form-control">
//                        <input type="email" name="email" id="email" placeholder="Enter Email" class="form-control">
//                        <input type="password" name="pass" id="pass" placeholder="Enter Password" class="form-control">
//                <center> <h3>Shop Details</h3></center>
//                                <input type="text" name="shopName" id="shopName" placeholder="Enter Shop Name" class="form-control">
//                                <input type="text" name="gst" id="gst" placeholder="Enter GST Number" class="form-control">
//                            <textarea class="form-control" id="exampleFormControlTextarea1"  placeholder="Enter Shop Address" class="form-control"></textarea>
//                        
//    
        
     
        if($flag==0){

$sql = "INSERT INTO tbl_Shop (fName, lName, contact,email,pass,shopName,gst,shopCategoryId,shopAdd,DateofRegistration)
VALUES ('".$_POST[fName]."', '".$_POST[lName]."', '".$_POST[contactNumber]."','".$_POST[email]."','".$_POST[pass]."','".$_POST[shopName]."','".$_POST[gst]."','".$_POST[shopCat]."','".$_POST[shopAdd]."','".date("Y-m-d")."')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

 echo '<script>alert("Successfully Inserted");</script>'; 
        echo 'all Good';
}        
 else {
 echo '<script>alert("Failed");</script>'; 
    
}
}

?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
<style>
    .form-icon{
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
    
</style>
<div class="content-wrapper">
    <form action="#" method="post">
    <div class="container" style="font-size: 100%;">
        <div class="row">
            <div class="col-lg-12" style="margin-top: 10px;">
                <center>
                    <div class="form-icon" style="padding-top: 0px;">
                 <span><i class="icon icon-basket-loaded" style="text-align: center; padding-top: 100%"></i></span>
              </div>
                    
                <h1>Shop Registration</h1>
                </center>
            </div>
        </div>
        
        <div class="row fulform" style="margin-top: 20px; ">
            <div class="col-lg-8" style="border-right: black 3px double">
               <center> <h3>Personal Information</h3></center>
                
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label for="fName">First Name:</label>
                        <input type="text" name="fName" id="fName" placeholder="Enter First Name" class="form-control">
                        <?php echo $fnamemsg;?>
                        </div>
                    </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="lName">Last Name:</label>
                    <input type="text" name="lName" id="lName" placeholder="Enter Last Name" class="form-control">
                    <?php echo $lnamemsg;?>
                    </div>
                    </div>
                </div>

                <!-- row -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="contactNumber">Contact Number:</label>
                        <input type="text" name="contactNumber" id="contactNumber" placeholder="Enter Contact Number" class="form-control">
                        <?php echo $phonemsg;?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label for="email">Enter Email:</label>
                        <input type="email" name="email" id="email" placeholder="Enter Email" class="form-control">
                        <?php echo $Emailerr;?>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="pass">Enter Password:</label>
                        <input type="password" name="pass" id="pass" placeholder="Enter Password" class="form-control">
                        <?php echo $errpass;?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label for="">&nbsp</label>
                        </div>
                    </div>
                </div>
            </div>
        
        
            <div class="col-lg-4">
                <center> <h3>Shop Details</h3></center>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                <label for="shopName">Enter Shop Name:</label>
                                <input type="text" name="shopName" id="shopName" placeholder="Enter Shop Name" class="form-control">
                                <?php echo $shopname;?>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                <label for="shopName">Enter GST Number:</label>
                                <input type="text" name="gst" id="gst" placeholder="Enter GST Number" class="form-control">
                        <?php echo $gst;?>
                                
                                </div>
                            </div>
                        </div>
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Shop Categories:</label>
                            <select class="form-control" name="shopCat">
    <option disabled selected>-- Select Category --</option>
    <?php
$conn1 = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

      
        $records = mysqli_query($conn1, "SELECT shopCategoryId,shopCategory From tbl_ShopCategory");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['shopCategoryId'] ."'>" .$data['shopCategory'] ."</option>";  // displaying data in option menu
        }	 
    ?>  
  </select>


<!--                            <select class="form-control" id="exampleFormControlSelect1">
                              <option>Cosmetic Shop</option>
                              <option>Cake Shop</option>
                              <option>Grocery Shop</option>
                              <option>Medical Shop</option>
                              <option>Restaurant</option>
                            </select>-->
                          </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Shop Address:</label>
                            <textarea class="form-control" id="shopAdd" name="shopAdd"  placeholder="Enter Shop Address" class="form-control"></textarea>
                            <?php echo $add;?>
                      
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <center>   <input type="submit" name="submit" value="Register Shop" rows="3"  class="btn btn-outline-primary"></center>
                        </div>
                    </div>
                </div>
                
                
            </div>    
            </div>
                        
            </div>  
                </div>
            </div>
        </div>
    
    </form>
    
</div>

<?php include 'footer.php'?>;