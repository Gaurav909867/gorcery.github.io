<?php
include("connection/db.php");
error_reporting(0);
session_start();

if (isset($_POST['submit'])) {
    if (empty($_POST['cat_name'])) {
        echo '<script>alert("All Field Required")</script>';
    } else {



        $sql = "update pro_cat set cat_name='$_POST[cat_name]' where c_id='$_GET[id]'";
        mysqli_query($db, $sql);
        move_uploaded_file($temp, $store);
       header('location: view_cat.php');
    }
}

if (empty($_SESSION["adm_id"])) {
    header('location:login.php');
} else {
?>
 <?php include('header.php'); ?>

    <!DOCTYPE html>
    <html lang="en">



    <head>
        <meta charset="utf-8" />
        <title>Admin User-Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="MyraStudio" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/theme.min.css" rel="stylesheet" type="text/css" />
        <script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>


    </head>

    <body>


       
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12" style="margin-left: auto; margin-right:auto">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Product Insert</h4>
                                    <form class="form-horizontal" action="" method="POST">
                                        <div class="row">
                                        <?php $sql = "select * from pro_cat where c_id='$_GET[id]'";
                                        $rest = mysqli_query($db, $sql);
                                        $rows = mysqli_fetch_array($rest);
                                        ?>
                                            <div class="col-md-4 col-lg-4 col-sm-6">
                                                <div class="form-group row mb-3">
                                                    <label for="inputEmail3" class="col-3 col-form-label">Category Name</label>
                                                    <div class="col-9">
                                                        <input type="text" name="cat_name" class="form-control" value="<?= $rows['cat_name'];?>">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="form-group mb-0 justify-content-end row">
                                            <div class="col-12">
                                                <button type="submit" name="submit" class="btn btn-info waves-effect waves-light">Save</button>
                                                <a href="view_cat.php" class="btn btn-danger waves-effect waves-light">Cancel</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('footer.php'); ?>
    <?php }
    ?>


    <div class="menu-overlay"></div>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metismenu.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/simplebar.min.js"></script>

    <script src="plugins/morris-js/morris.min.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>

    <script src="assets/pages/dashboard-demo.js"></script>

    <script src="assets/js/theme.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
    </body>

    </html>