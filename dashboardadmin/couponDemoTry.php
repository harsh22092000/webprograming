<?php ob_start(); ?>
<?php include './shopKeeperDashboard.php';?>
        <div class="content-wrapper">
<?php include 'connection.php'; ?>
<?php
        $j=0;   
        $press=array();
        
        $sqlcp = "SELECT tbl_coupon.couponId,couponImage,offer FROM tbl_coupon WHERE tbl_coupon.couponId NOT IN (SELECT couponId FROM tbl_redeemCoupon where customerId=3) and shopId=".$_GET["shopId"];

                $query= mysqli_query($conn,$sqlcp);

        echo "<div class='container'> <form action='#' method='post'>";
 $cnt=0;
 $b=0;   
        
        
            
           $j=0; 
           $coups = array();

            while ($r= mysqli_fetch_array($query))
            {
                            $press[$j]="submit".$j."";
                            $k="submit".$j."";
                            $v=$r['couponId'];
                            $coups += [$k => $v];
                            
                if($cnt==0)
    {
        echo "<div class='row'>";
    } 
    echo "
           <div class='col-lg-4'>
                <div class='card' style='width: 18rem;'>
                    <img src='image/coupons/".$r['couponImage']."' class='card-img-top' alt='...'>
                      <div class='card-body'>
                        <p class='card-text'>".$r['offer']."</p>
                        <center><input type='submit' name='submit".$j."' id='submit".$j."' value='Apply NOW' class='btn btn-primary'> </center>
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
                
                
                $j++;
                
            }
             echo "</form> </div>";
   
        ?>
        </div>
        
           
        <?php 
        $j=0;
                for ($i=1; $i<= count($press); $i++)
                {
        if (isset($_POST["submit".$j.""]))
        {
$conn3 = new mysqli($servername, $username, $password, $dbname);

$sql3 ="select * from tbl_coupon where couponId=".$coups[$press[$j]];
                $query3= mysqli_query($conn,$sql3);
                while ($dis= mysqli_fetch_array($query3))
                {
                                                $cd= $dis['discount'];
                                                
                }
                $mpl=1-$cd/100;
$finalamt=$_GET['mrp']*$mpl;
$sql1 = "INSERT INTO tbl_redeemCoupon(couponId,customerId,udate,mrp,discount,finalAmount) VALUES('".$coups[$press[$j]]."',3,'".date("Y-m-d")."','".$_GET['mrp']."','".$cd."','".$finalamt."')";

if ($conn->query($sql1) === TRUE) {
                echo "<script>alert('Coupon Applied success');</script>";
                header('location:couponDemoTry.php');
                  exit();
  echo "New record created successfully";
} else {
  echo "Error: " . $sql1 . "<br>" . $conn->error;
}
       
        }
                
        $j++;
        }
         ?>

<?php ob_flush(); ?>
