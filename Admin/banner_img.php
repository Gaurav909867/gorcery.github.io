<?php
include("connection/db.php");
error_reporting(0);
session_start();

if (isset($_POST['submit'])) {
    if (empty($_POST['cat_name'])) {
        echo '<script>alert("All Field Required")</script>';
    } else {



        $sql = "INSERT INTO pro_cat(cat_name) VALUES('" . $_POST['cat_name'] . "')";
        mysqli_query($db, $sql);
        move_uploaded_file($temp, $store);
        header('location: view_cat.php');
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
        <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

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
                                    <h4 class="card-title">Insert Banner Image</h4>
                                    <form class="form-horizontal" action="g_upload.php" method="POST" enctype="multipart/form-data">
                                    <p style="color: red;">Banner Image Size :-1120*400px</p>
                                        <div class="row">
                                        
                                            <div class="col-md-4 col-lg-4 col-sm-6">
                                                <div class="form-group row mb-3">
                                                    <label for="inputEmail3" class="col-3 col-form-label">Insert Image</label>
                                                    <div class="col-9">
                                                        <input type="file" name="files[]" multiple class="form-control">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-0 justify-content-end row">
                                            <div class="col-12">
                                                <input type="submit" name="submit" class="btn btn-info waves-effect waves-light" value="Save">
                                            </div>
                                        </div>
                                        
                                    </form>
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12" style="margin-left: auto; margin-right:auto">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Banner Images</h4>
                                    <div class="row">
                                        <?php
                                        $sql = "SELECT * FROM banner order by b_id desc";
                                        $query = mysqli_query($db, $sql);


                                        if (!mysqli_num_rows($query) > 0) {
                                            echo '<td colspan="11"><center>No Data-stored!</center></td>';
                                        } else {
                                            while ($rows = mysqli_fetch_array($query)) {
                                        ?> <div class="col-md-4 col-sm-12">
                                                    <div class="card">
                                                        <img style="max-height: 155px;" class="card-img img-fluid" src="<?= $rows['location']; ?>" alt="Card image cap">
                                                    </div>
                                                    <div class="card card-body text-right">
                                                        <blockquote class="card-bodyquote mb-0">
                                                            <a href="delete_banner.php?del_id=<?= $rows['b_id']; ?>" class="btn btn-danger" width="100%" >Delete</a> </span>
                                                            <footer class="blockquote-footer text-muted">
                                                                <cite title="Source Title"><?= $rows['date']; ?></cite>
                                                            </footer>
                                                        </blockquote>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        }  ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('footer.php'); ?>

        ?>



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
<?php }
