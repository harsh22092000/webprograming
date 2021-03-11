
<?php include './shopKeeperDashboard.php';?>
        <div class="content-wrapper">

<?php include 'connection.php'; ?>
<?php 
$cpn = array();
    $i=0;
    
if(isset($_POST['cp1'])){
    $i=1;
    
    $cpn=array();
$cpn[0]=$_POST["cp1"];
    
        echo "<script>alert($cpn[0]);</script>";

}

?>
<?php
if (TRUE)
{  
 $query= mysqli_query($conn,"select * from tbl_coupon where shopId=".$_SESSION['sId']);
 echo "<div class='container'> <form action='#' method='post'>";
 $cnt=0;
 $b=0;
while ($row = mysqli_fetch_array($query)) {  
    if($cnt==0)
    {
        echo "<div class='row'>";
    } 
    echo "
           <div class='col-lg-4'>
                <div class='card' style='width: 18rem;'>
                    <img src='image/coupons/".$row['couponImage']."' class='card-img-top' alt='...'>
                      <div class='card-body'>
                        <p class='card-text'>".$row['offer']."</p>
                        <center><input type='submit' name='cp".$b."' value='Delete' class='btn btn-danger'> </center>
                      </div>
                </div>
            </div>
                
	";
    $b++;
    if($cnt==2)
    {
        echo "</div>";
        
        $cnt=0;
    }
    else{
    $cnt++;
    }
 }
 echo "</form> </div>";


mysqli_close($conn);
 
}
?>
        </div>