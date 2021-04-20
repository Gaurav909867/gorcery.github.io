<?php
    include("connection/db.php");
    error_reporting(0);
    session_start();

    if (isset($_POST['submit'])) {
        if (empty($_POST['name']) || empty($_POST['mrp']) ){
            echo '<script>alert("All Field Required")</script>';
        
        } else {
            $fname = $_FILES['file']['name'];
            $temp = $_FILES['file']['tmp_name'];
            $fsize = $_FILES['file']['size'];
            $extension = explode('.', $fname);
            $extension = strtolower(end($extension));
            $fnew = uniqid() . '.' . $extension;
            $store = "pro_img/" . basename($fnew);
            if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif') {
                if ($fsize >= 10000000) {
                    $error =     '<div class="alert alert-danger alert-dismissible fade show">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <strong>Max Image Size is 10mb!</strong> Try different Image.
                                                                </div>';
                } else {
                    
                    $sql = "INSERT INTO product(name,cat,mrp,disc_price,disc,file) VALUES('" . $_POST['name'] . "','" . $_POST['cat'] . "','" . $_POST['mrp'] . "','" . $_POST['disc_price'] . "','" . $_POST['disc'] . "','" . $fnew . "')";
                    mysqli_query($db, $sql);
                    move_uploaded_file($temp, $store);
                    header('location: view_pro.php');
                    $success =     '<div class="alert alert-success alert-dismissible fade show">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <strong>Congrass!</strong> New Tour Added Successfully.
                                                                </div>';
                    header('location: slide_img.php');
                }
            } elseif ($extension == '') {
                $error =     '<div class="alert alert-danger alert-dismissible fade show">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <strong>select image</strong>
                                                                </div>';
            } else {
                $error =     '<div class="alert alert-danger alert-dismissible fade show">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <strong>invalid extension!</strong>png, jpg, Gif are accepted.
                                                                </div>';
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
    <script src="//cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
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
                                    <h4 class="card-title"><?php echo $error;
                                                            echo $success; ?></h4>

                                    <form class="form-horizontal" action="" enctype="multipart/form-data" method="POST">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-4 col-sm-6">
                                                <div class="form-group row mb-3">
                                                    <label for="inputEmail3" class="col-3 col-form-label">Product Name</label>
                                                    <div class="col-9">
                                                        <input type="text" name="name" required class="form-control" placeholder="Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-4 col-sm-6">
                                                <div class="form-group row mb-3">
                                                    <label for="inputPassword3" class="col-3 col-form-label">Product Category</label>
                                                    <div class="col-9">
                                                        <select type="text" name="cat" class="form-control">
                                                            <option value="">--Select Category--</option>
                                                            <?php
                                                            $sql = "SELECT * FROM pro_cat order by c_id desc";
                                                            $query = mysqli_query($db, $sql);
                                                            while ($cat = mysqli_fetch_array($query)) {
                                                                echo '<option value="' . $cat['c_id'] . '">' . $cat['cat_name'] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h4 class="card-title">Price</h4>
                                        <div class="row">
                                            <div class="col-md-4 col-lg-4 col-sm-6">
                                                <div class="form-group row mb-3">
                                                    <label for="inputPassword5" class="col-3 col-form-label">MRP &#8377; </label>
                                                    <div class="col-9">
                                                        <input type="text" name="mrp" required class="form-control" id="inputPassword5" placeholder=" &#8377; ">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-4 col-sm-6">
                                                <div class="form-group row mb-3">
                                                    <label for="inputPassword5" class="col-3 col-form-label">Discount Price</label>
                                                    <div class="col-9">
                                                        <input type="text" name="disc_price" required class="form-control" id="inputPassword5" placeholder="&#8377;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h4 class="card-title">Content</h4>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12 col-sm-12">
                                                <label class="col-form-label">Discription</label>
                                                <div class="form-group">

                                                    <textarea id="editor" name="disc" rows="10" cols="200"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <h4 class="card-title">Images</h4>
                                        <div class="row">
                                            <div class="col-md-4 col-lg-4 col-sm-6">
                                                <div class="form-group row mb-3">
                                                    <label  class="col-3 col-form-label">Image</label>
                                                    <div class="col-9">
                                                        <input type="file" name="file" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </div>

                                        <div class="form-group mb-0 justify-content-end row">
                                            <div class="col-12">
                                                <button type="submit" name="submit" class="btn btn-info waves-effect waves-light">Insert Product</button>
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



        <div class="menu-overlay"></div>
       
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
<?php
    }
?>