<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "grocery"; 

$db = mysqli_connect($servername, $username, $password, $dbname);

if (!$db) {     	
    die("Connection failed: " . mysqli_connect_error());
}

?>