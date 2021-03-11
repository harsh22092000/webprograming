<?php // include './index.php';?>
<?php include './connection.php';?>
<?php
if(isset($_REQUEST["update"])){
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
         
        
        if($flag==0){
            $sql = "UPDATE tbl_Customer SET fName='".$_POST["fName"]."' , lName='".$_POST["lName"]."' , contactNo='".$_POST["contactNumber"]."' , email='".$_POST["email"]."' , address='".$_POST["add"]."', DoB='".$_POST["dob"]."' WHERE cId=".$_SESSION["cId"];
//$address=$_POST["address"];

if ($conn->query($sql) === TRUE) {   
    echo "<script>alert('Record updated successfully');</script>";
$fName=$_POST["fName"];
$lName=$_POST["lName"];
$contact=$_POST["contactNumber"];
$email=$_POST["email"];
$address=$_POST["add"];
$dob=$_POST["dob"];

} else {
  echo "Error updating record: " . $conn->error;
}
            
        }
        }
        ?>

<?php 
$sql = "select * from tbl_Customer where cId=".$_SESSION["cId"];
$result = $conn->query($sql);
$rows=$result->fetch_assoc();

$fName=$rows["fName"];
$lName=$rows["lName"];
$contact=$rows["contactNo"];
$email=$rows["email"];
$address=$rows["address"];
$dob=$rows["DoB"];
//$_SESSION["cId"]=$rows["cId"];
?>
<!--if(isset($_REQUEST["update"])){
    
$conn->close();
}-->



<div class="content-wrapper">
      <form action="#" method="post">
            <div class="row">
                <div class="col-lg-12"><center><h1>User Profile</h1></center></div>
                <div class="col-lg-6">
                <div class="form-group">
                    <label for="fName">First Name:</label>
                    <input type="text" name="fName" value="<?php echo $fName;?>" id="fName" placeholder="Enter First Name" class="form-control">
                    <?php echo $fnamemsg?>
                    </div>
                    </div>
                <div class="col-lg-6">
                <div class="form-group">
                    <label for="lName">Last Name:</label>
                    <input type="text" name="lName" id="lName" value="<?php echo $lName;?>" placeholder="Enter Last Name" class="form-control">
                    <?php echo $lnamemsg?>
                    </div>
                    </div>
                </div>

                <!-- row -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="contactNumber">Contact Number:</label>
                        <input type="text" name="contactNumber" id="contactNumber" value="<?php echo $contact;?>" placeholder="Enter Contact Number" class="form-control">
                        <?php echo $phonemsg?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label for="email">Enter Email</label>
                        <input type="email" name="email" id="email" value="<?php echo $email;?>" placeholder="Enter Email" class="form-control">
                        <?php echo $Emailerr?>
                        
                    </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="add">Address:</label>
                        <textarea rows="2" name="add" placeholder="Enter Your Address"  class="form-control"><?php echo $address;?></textarea>
                        </div>
                    </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                            <label for="dob">Date of Birth:</label>
                            <input type="date" name="dob" value="<?php echo $dob;?>" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <center>
     <input type="submit" value="update" name="update" class="btn btn-outline-primary">
                            
                        </center>
                        <a href="resetPassEmail.php">Reset Password</a>
                    </div>
        </div>
                
    </form>
     </div>