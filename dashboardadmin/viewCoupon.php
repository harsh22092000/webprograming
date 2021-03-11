
<?php include './index.php';?>
        <div class="content-wrapper">

<?php include 'connection.php'; ?>
<?php
if(isset($_POST["display"]))
{  
 $query= mysqli_query($conn,"select * from tbl_coupon");
 
while ($row = mysqli_fetch_array($query)) {  
    echo "
           <div class='col-lg-4'>
    <div class='card' style='width: 18rem;'>
                    <img src='image/coupons/".$row['couponImage']."' class='card-img-top' alt='...'>
                      <div class='card-body'>
                        <p class='card-text'>".$row['offer']."</p>
                    <center>    <input type='submit' value='Apply Now' class='btn btn-primary'> </center>
                      </div>
                </div>
                </div>
                
	";
 
//      	echo "<img src='image/coupons/".$row['couponImage']."' >";   
      
 }   
  
  

//echo '<img src="image/'.$query.'.jpg">'; 


mysqli_close($conn);
 
}
?>
        <form action="#" method="post" enctype="multipart/form-data">
        
        <input type="submit" name="display" class="btn btn-outline-primary" value="Display">
       
         </form>
        </div>
    
