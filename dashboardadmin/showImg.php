<?php
            require_once "./connection.php";

    $sql = "SELECT imageId FROM tbl_ImageTemp ORDER BY imageId DESC"; 
    $result = mysqli_query($conn, $sql);
?>
<HTML>
<HEAD>
<TITLE>List BLOB Images</TITLE>
<link href="imageStyles.css" rel="stylesheet" type="text/css" />
</HEAD>
<BODY>
<?php
	while($row = mysqli_fetch_array($result)) {
	?>
		<img src="imageView.php?image_id=<?php echo $row["imageId"]; ?>" /><br/>
                <?php echo $row["imageType"]; ?>
<?php		
	}
    mysqli_close($conn);
?>
</BODY>
</HTML>