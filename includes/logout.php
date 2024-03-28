<?php 
session_start();
session_destroy();
session_unset();
echo "<script>alert('Logout Successfull!!');window.location='../index.php';</script>";
?>