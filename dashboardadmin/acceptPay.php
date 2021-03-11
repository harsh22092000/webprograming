

<?php include './shopKeeperDashboard.php';?>

<div class="content-wrapper">
    <center>
    <form action="#" method="post">
    <input type="text" name="amt" >
    <?php echo $errss?>
    <input type="submit" name="submit" value="Generate QR">
</center>
    </form>
        <?php
$flag=0;
if(isset($_REQUEST["submit"])){
       
        if(empty($_POST["amt"]))
        {
            $errss="This Field must be Filled";
            $flag=1;
        }
        else
        {
//         if(!preg_match("/^[0-9]$/", $_POST["amt"]))
//                {
//                        $errss="Only Digits";
//                        $flag=1;
//                }     
        }
        if($flag==0){
            require_once './phpqrcode/qrlib.php';
        $path = './image/';
        $text=$_POST['amt']."-".$_SESSION["sId"];
        $file=$path.uniqid().".png";
        QRcode::png($text,$file,'L',10);
        echo "<center><img src='".$file."'></center>";
        echo $text;
        }
}
?>

        
        <a href="scanqr.php">Scanner</a>
</div>