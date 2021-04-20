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
                $sql = "INSERT INTO images (location,p_id) VALUES ('$targetPath','" . $_POST['p_id'] . "')";
                $image = mysqli_query($db, $sql);
                if (move_uploaded_file($sourcePath, $targetPath)) {
                    header('location: view_pro.php');
                }
            }
            header('location: view_pro.php');
        }
    }
}

if (empty($_SESSION["adm_id"])) {
    header('location:login.php');
} else {
?>


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


        <?php include('header.php'); ?>
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12" style="margin-left: auto; margin-right:auto">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Product Insert</h4>
                                    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-4 col-sm-6">
                                                <div class="form-group row mb-3">
                                                    <label for="inputEmail3" class="col-3 col-form-label">Product Gallery Images</label>
                                                    <div class="col-9">
                                                        <input type="file" name="files[]" multiple class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">

                                                    <?php $sql = "select * from product order by p_id desc limit 1";
                                                    $res = mysqli_query($db, $sql);
                                                    while ($row = mysqli_fetch_array($res)) {
                                                        echo '
                                                                <input type="text" name="p_id" value="' . $row['p_id'] . '">

                                                                ';;
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                        </div>


                                        <div class="form-group mb-0 justify-content-end row">
                                            <div class="col-12">
                                                <button type="submit" name="submit" class="btn btn-info waves-effect waves-light">Save</button>
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