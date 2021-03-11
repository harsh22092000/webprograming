<?php include './index.php';?>
<?php include './connection.php'; ?>
<?php 
$sql = "select count(*) from tbl_Customer";
$sql1 = "select count(*) from tbl_Shop";
$sql2 = "select count(*) from tbl_coupon";


$result = $conn->query($sql);
    $rows=$result->fetch_assoc();

    $result1 = $conn->query($sql1);
    $rows1=$result1->fetch_assoc();

    
    $result2 = $conn->query($sql2);
    $rows2=$result2->fetch_assoc();

    if ($rows["count(*)"]> 0) {
$noofreg=$rows["count(*)"];
$noofshop=$rows1["count(*)"];
$noofcoupon=$rows2["count(*)"];
}
 else {
    $noofreg=5;
    $noofshop=1;
    $noofcoupon=100;
 }
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"></a></li>
              <li class="breadcrumb-item active"></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                  <h3><?php echo $noofshop;?></h3>

                <p>Shop Registered</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $noofreg?></h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
            
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $noofcoupon; ?><sup style="font-size: 20px"></sup></h3>

                <p>Number of Coupons</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
<!--            <div class="small-box bg-danger">
              <div class="inner">
                <h3>0</h3>
                <p></p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>-->
          </div>
        </div>
        <div class="row">
          <section class="col-lg-7 connectedSortable">
                      </section>
          <section class="col-lg-5 connectedSortable">

          </section>
        </div>
      </div>
    </section>
  </div>
     