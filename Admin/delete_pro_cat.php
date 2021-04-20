<?php
include("connection/db.php");
error_reporting(0);
session_start();



mysqli_query($db,"DELETE FROM pro_cat WHERE c_id = '".$_GET['id']."'");
header("location:view_cat.php");  

?>
