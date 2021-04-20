<?php
include("connection/db.php");
error_reporting(0);
session_start();

if (isset($_POST['save'])) {
    if (empty($_POST['qty']) || (empty($_POST['qty_type']) )) {
        echo '<script>alert("All Field Required")</script>';
    } else {
        $sql = "update product set qty='$_POST[qty]', qty_type='$_POST[qty_type]' where p_id='$_GET[qid]'";
        mysqli_query($db, $sql);
        move_uploaded_file($temp, $store);
        echo '<script>alert("Added Successfully");
        window.location.href = "choose_cat.php";
            </script>';
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
                                    <h4 class="card-title">Quantity Insert</h4>
                                    <h3 style="text-align: center;margin-bottom:20px">Add Quantity</h3>
                                    <form action="" method="POST" enctype="multipart/form-data">
                                    <?php
                                    
                                    $sql = "select * from product where p_id='$_GET[qid]'";
                                        $rest = mysqli_query($db, $sql);
                                        $rows = mysqli_fetch_array($rest);
                                        $ut = $rows['qty_type'];
                                        $utt = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM unit WHERE u_id =$ut"));
                                        ?>
                                        <div class="form-group row">
                                            <label class="col-3 form-lable"> Enter Qty</label>
                                            <input type="number" name="qty" class="col-6 form-control" value="<?= $rows['qty']?>" >
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3 form-lable">Choose Unit</label>
                                            <select name="qty_type" class="col-6 form-control">
                                                <option value="<?= $rows['qty_type'];?>"><?= $utt['unit_name'] ?></option>
                                                <?php
                                                            $sql = "SELECT * FROM unit order by u_id desc";
                                                            $query = mysqli_query($db, $sql);
                                                            while ($cat = mysqli_fetch_array($query)) {
                                                                echo '<option value="' . $cat['u_id'] . '">' . $cat['unit_name'] . '</option>';
                                                            }
                                                            ?>
                          
                                            </select>
                                        </div>
                                        <input type="submit" class="btn btn-success" name="save" value="Save">
                                        <a href="pro_qty.php" class="btn btn-danger waves-effect waves-light">Cancel</a>
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