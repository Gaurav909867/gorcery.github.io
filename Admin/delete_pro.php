<?php
include("connection/db.php");
error_reporting(0);
session_start();



// sending query
mysqli_query($db,"DELETE FROM product WHERE p_id = '".$_GET['id']."'");
header("location:view_pro.php");  

?>
