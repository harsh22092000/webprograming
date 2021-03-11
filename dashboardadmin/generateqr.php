

<?php include './index.php';?>
<div class="content-wrapper">
    <center>
    <form action="generateqr.php" method="post">
    <input type="text" name="amt" >
    <input type="submit" value="Generate QR">
</center>
    </form>

    <?php 
        require_once './phpqrcode/qrlib.php';
        $path = './image/';
        $text=$_POST['amt'];
        $file=$path.uniqid().".png";
        QRcode::png($text,$file,'L',10);
        echo "<center><img src='".$file."'></center>";
        echo $text;
        ?>
        
        
        <a href="scanqr.php">Scanner</a>
</div>