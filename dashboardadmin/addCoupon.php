<?php include './index.php';?>
<?php include './connection.php'; ?>

<?php 
$flag=0;
if(isset($_REQUEST["createCoupon"])){
                        
//        if(empty($_POST["cCode"]))
//        {
//            $cCode="This Field must be Filled";
//            $flag=1;
//        }
//        else
//        {
//            
//        }
//       
//        
//        if(empty($_POST["cImg"]))
//        {
//            $cImg="This Field must be Filled";
//            $flag=1;
//        }
//        else
//        {
//        
//        }
//        
//        if($flag==0){

     $filename = $_FILES["uploadfile"]["name"]; 
    $tempname = $_FILES["uploadfile"]["tmp_name"];     
        $folder = './image/coupons/'.$filename; 

         
    
//$cImg=$_POST[cImg];
$sql = "INSERT INTO tbl_coupon (couponCode, shopId, couponImage,discount,offer,couponDate,couponExpireDate)
VALUES ('".$_POST[cCode]."','1' ,'".$filename."', '".$_POST[disc]."','".$_POST[offer]."','".$_POST[startDate]."','".$_POST[expireDate]."')";

echo '<script>alert('.$sql.');</script>';
if ($conn->query($sql) === TRUE) {
  if (move_uploaded_file($tempname, $folder))  
        { 
            echo "Image upload successfully";  
        }
        else
        { 
            echo "Image not uploaded";
        }
    
    echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

 echo '<script>alert("Successfully Inserted");</script>'; 
        echo 'all Good';
}        
 

?>
<div class="content-wrapper">
    
     <form action="#" method="post" enctype="multipart/form-data">
    <div class="container" style="font-size: 100%;">
        <div class="row">
            <div class="col-lg-12" style="margin-top: 10px;">
                <center>
                    <div class="form-icon" style="padding-top: 0px;">
                 <span><i class="icon icon-basket-loaded" style="text-align: center; padding-top: 100%"></i></span>
              </div>
                    
                <h1>Add Coupon</h1>
                </center>
            </div>
        </div>
        
        <div class="row fulform" style="margin-top: 20px; ">
            <div class="col-lg-12" style="border-right: black 3px double">
<!--               <center> <h3>Personal Information</h3></center>-->
                
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label for="fName">Coupon Code:</label>
                        <input type="text" name="cCode" id="cCode" placeholder="Enter Coupon Code:" class="form-control" required>
                        <?php echo $cCode;?>
                        </div>
                    </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="Cimg">Coupon Image:</label>
                    <input  type="file" name="uploadfile" class="inputFile form-control" >
                    <?php echo $Cimg;?>
                    </div>
                    </div>
                </div>

                <!-- row -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="disc">Discount %:</label>
                        <input type="text" name="disc" id="disc" placeholder="Enter Discount %:" class="form-control" required>
                        <?php echo $phonemsg;?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label for="offer">Enter Offer:</label>
                        
                        <textarea class="form-control" required id="offer" name="offer"  placeholder="Enter Offer" class="form-control"></textarea>
                        <?php $offer?>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="startDate">Enter Start Date:</label>
                        <input type="Date" name="startDate" id="startDate"  class="form-control" required>
                        <?php echo $sdate;?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="startDate">Enter Expire Date:</label>
                        <input type="Date" name="expireDate" id="expireDate"  class="form-control" required>
                        <?php echo $edate;?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <center><input type="submit" value="Create Coupon" name="createCoupon" class="btn btn-outline-primary"><center></center>
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