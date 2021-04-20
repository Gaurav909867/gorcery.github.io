<?php
include("connection/db.php");
error_reporting(0);
session_start();


if (empty($_SESSION["adm_id"])) {
    header('location:login.php');
} else {
?>

    <?php include('header.php'); ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Admin</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <link rel="stylesheet" href="../src/css/lightslider.css" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Askbootstrap">
        <meta name="author" content="Askbootstrap">
        <link rel="icon" type="image/png" href="img/favicon.png">


        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <link href="../vendor/icons/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />

        <link href="../vendor/select2/css/select2-bootstrap.css" />
        <link href="../vendor/select2/css/select2.min.css" rel="stylesheet" />

        <link href="../css/osahan.css" rel="stylesheet">

        <link rel="stylesheet" href="../vendor/owl-carousel/owl.carousel.css">
        <link rel="stylesheet" href="../vendor/owl-carousel/owl.theme.css">
        <style>
            ul {
                list-style: none outside none;
                padding-left: 0;
                margin: 0;
            }

            .demo .item {
                margin-bottom: 60px;
            }

            .content-slider li {
                background-color: #ed3020;
                text-align: center;
                color: #FFF;
            }

            .content-slider h3 {
                margin: 0;
                padding: 70px 0;
            }

            .demo {
                width: 800px;
            }
        </style>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="../src/js/lightslider.js"></script>
        <script>
            $(document).ready(function() {
                $("#content-slider").lightSlider({
                    loop: true,
                    keyPress: true
                });
                $('#image-gallery').lightSlider({
                    gallery: true,
                    item: 1,
                    thumbItem: 9,
                    slideMargin: 0,
                    speed: 500,
                    auto: true,
                    loop: true,
                    onSliderLoad: function() {
                        $('#image-gallery').removeClass('cS-hidden');
                    }
                });
            });
        </script>
    </head>

    <body>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <section class="shop-single section-padding pt-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="demo">
                                        <div class="item">
                                            <div class="clearfix" style="max-width:474px;">
                                                <ul id="image-gallery" class="gallery list-unstyled cS-hidden">

                                                    <?php
                                                    $sql = "SELECT * FROM product where p_id =$_GET[id]";
                                                    $query = mysqli_query($db, $sql);
                                                    while ($row = mysqli_fetch_array($query)) { ?>

                                                        <li data-thumb="pro_img/<?= $row['file']; ?>">
                                                            <img style="width: 50vh; height:50vh" src="pro_img/<?= $row['file']; ?>">
                                                        </li>
                                                    <?php }
                                                    ?>

                                                    <?php
                                                    $sql = "SELECT * FROM images where p_id =$_GET[id]";
                                                    $query = mysqli_query($db, $sql);
                                                    while ($roww = mysqli_fetch_array($query)) { ?>
                                                        <li data-thumb="<?= $roww['location']; ?>">
                                                            <img style="width: 50vh; height:50vh" src="<?= $roww['location']; ?>">
                                                        </li>
                                                    <?php }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <?php
                                    $sql = "SELECT * FROM product where p_id =$_GET[id]";
                                    $query = mysqli_query($db, $sql);
                                    if (!mysqli_num_rows($query) > 0) {
                                        echo '<td colspan="11"><center>No Data-stored!</center></td>';
                                    } else {
                                        while ($row = mysqli_fetch_array($query)) {
                                            $ut = $row['qty_type'];
                                            $utt = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM unit WHERE u_id =$ut"));
                                            $r_cat = $row['cat'];
                                            $sql = "SELECT * FROM pro_cat where c_id=$r_cat";
                                            $res = mysqli_query($db, $sql);
                                            $r = mysqli_fetch_array($res);
                                    ?>

                                            <div class="shop-detail-right">
                                                <span class="badge badge-success">50% OFF</span>
                                                <h2><?= $row['name']; ?></h2>
                                                <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> <?= $row['qty']; ?>.<?= $utt['unit_name']; ?></h6>
                                                <p class="regular-price"><i class="mdi mdi-tag-outline"></i> MRP : $<?= $row['mrp']; ?></p>
                                                <p class="offer-price mb-0">Discounted price : <span class="text-success">$<?= $row['disc_price']; ?></span></p>
                                                <a href="#"><button type="button" class="btn btn-secondary btn-lg"><i class="mdi mdi-cart-outline"></i> Add To Cart</button> </a>
                                                <div class="short-description">
                                                    <h5>
                                                        Quick Overview
                                                        <p class="float-right">Availability: <span class="badge badge-success">

                                                                <?php if ($row['status'] == 0) {
                                                                    echo 'out Of Stock';
                                                                } else {
                                                                    if ($row['qty'] == 0){
                                                                        echo 'Comming Soon..';
                                                                    }
                                                                    else{
                                                                    echo 'In Stock';
                                                                    }
                                                                }
                                                                ?>

                                                            </span></p>
                                                    </h5>
                                                    <?= $row['disc']; ?>
                                                </div>
                                                <h6 class="mb-3 mt-4">Why shop from Groci?</h6>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="feature-box">
                                                            <i class="mdi mdi-truck-fast"></i>
                                                            <h6 class="text-info">Free Delivery</h6>
                                                            <p>Lorem ipsum dolor...</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="feature-box">
                                                            <i class="mdi mdi-basket"></i>
                                                            <h6 class="text-info">100% Guarantee</h6>
                                                            <p>Rorem Ipsum Dolor sit...</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php }
                                    }
                                    ?>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <!-- <?php include('footer.php'); ?> -->

        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metismenu.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/simplebar.min.js"></script>

        <script src="plugins/morris-js/morris.min.js"></script>
        <script src="plugins/raphael/raphael.min.js"></script>
        <script src="assets/pages/dashboard-demo.js"></script>

        <script src="assets/js/theme.js"></script>

    </body>

    </html>
<?php
}
?>