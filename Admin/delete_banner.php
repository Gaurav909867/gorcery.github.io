<?php
include("connection/db.php");
error_reporting(0);
session_start();



mysqli_query($db,"DELETE FROM banner WHERE b_id = '".$_GET['del_id']."'");
header("location:banner_img.php");  

?>
