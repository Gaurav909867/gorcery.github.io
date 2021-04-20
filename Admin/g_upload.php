<?php
include("connection/db.php");
error_reporting(0);
session_start();
$output = '';
if (isset($_POST['submit'])) {
    if (is_array($_FILES)) {

        foreach ($_FILES['files']['name'] as $name => $value) {
            $file_name = explode(".", $_FILES['files']['name'][$name]);
            $allowed_ext = array("jpg", "jpeg", "png", "gif");
            if (in_array($file_name[1], $allowed_ext)) {
                $new_name = md5(rand()) . '.' . $file_name[1];
                $sourcePath = $_FILES['files']['tmp_name'][$name];
                $targetPath = "g_img/" . $new_name;
                $sql = "INSERT INTO banner (location) VALUES ('$targetPath')";
                $image = mysqli_query($db, $sql);
                if (move_uploaded_file($sourcePath, $targetPath)) {
                }
            }
            header('location: banner_img.php');
        }
    }
}


?>