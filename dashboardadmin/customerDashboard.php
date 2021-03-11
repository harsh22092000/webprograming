
<?php session_start(); ?>
<?php 
if(empty($_SESSION))
    {
    header("location:lander.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Customer | Dashboard</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
 
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Shop Panel</span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">

        </div>
        <div class="info">
            <a href="customerProfile.php" class="d-block"><?php echo $_SESSION["fName"]."  ". $_SESSION["lName"]."  ".$_SESSION["sId"]." ".$_SESSION["role"];?> </a>
        </div>
      </div>

      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="#" class="nav-link dangers">    
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
              <a href="reportsShop.php" class="nav-link ">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Reports
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Coupons
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="addCouponShop.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Coupon</p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="viewCouponShop.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Coupon</p>
                </a>
              </li>
               
            </ul>
          </li>
          
          <li class="nav-item">
              <a href="scanRegex.php" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                 Payment By QR Code
              </p>
            </a>
          </li>
          <li class="nav-item">
              <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Logout
                
              </p>
            </a>
          </li>
      </nav>
    </div>
  </aside>
    </div>
    
    

 <script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="dist/js/adminlte.js"></script>
<script type="text/javascript"> 
	 
  $(".nav-link").click(function(){
      $(".nav-link").removeClass("active");
    $(this).addClass("active");
  });
</script> 


    </body>
    
</html>
