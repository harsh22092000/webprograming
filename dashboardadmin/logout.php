<?php session_start(); ?>
<?php ob_start(); ?>
<?php session_destroy();
 header('location:lander.php');
 exit();
 ?>
<?php ob_flush(); ?>