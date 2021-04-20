<?php
include("connection/db.php");
error_reporting(0);
session_start();
// echo "$_POST[id]";


                                                  
     if(isset($_POST['post_status']))
     {
        
        $post_status = $_POST['post_status'];
        $sql = "UPDATE product SET status= '$post_status' WHERE p_id ='$_POST[id]'";
        mysqli_query($db, $sql);
        move_uploaded_file($temp, $store);

        if (mysqli_query($db, $sql)) {
                echo "Your category Saved Successfully.";
                header('location:pro_status.php');
                   
            } else {
                echo "ERROR: Hush! Sorry $sql." .
                    mysqli_error($db);
            }
       
}
else {
        echo "ERROR: ..................................................!!!!!! $sql." .
            mysqli_error($db);
    }


?>