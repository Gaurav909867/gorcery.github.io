<?php
include("admin/connection/db.php");
error_reporting(0);
session_start();


?>

<html>

<head>
    <title></title>

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

        .d-block {
            margin-top: auto;
            margin-bottom: auto;


        }
        #maxline {
            overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   -webkit-line-clamp: 2; /* number of lines to show */
   -webkit-box-orient: vertical;
        }
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="src/js/lightslider.js"></script>
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
    <?php include 'header.php'; ?>
    <section class="pt-3 pb-3 page-info section-padding border-bottom bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="#"><strong><span class="mdi mdi-home"></span> Home</strong></a> <span class="mdi mdi-chevron-right"></span> <a href="#">Fruits & Vegetables</a> <span class="mdi mdi-chevron-right"></span> <a href="#">Fruits</a>
                </div>
            </div>
        </div>
    </section>
    <section class="shop-single section-padding pt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                              
                            $sql = "SELECT * FROM product where p_id =$_GET[id]";
                            $query = mysqli_query($db, $sql);
                            while ($row = mysqli_fetch_array($query)) { ?>
                                <div class="carousel-item active">
                                    <img class="d-block" style="width: 100%; height:80%" src="admin/pro_img/<?= $row['file']; ?>">
                                </div>
                            <?php }
                            ?>
                            <?php
                            $sql = "SELECT * FROM images where p_id =$_GET[id]";
                            $query = mysqli_query($db, $sql);
                            while ($roww = mysqli_fetch_array($query)) { ?>
                                <div class="carousel-item">
                                    <img class="d-block" style="width: 100%; height:80%" src="admin/<?= $roww['location']; ?>">
                                </div>
                            <?php }
                            ?>



                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
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
                                <a href="checkout.php"><button type="button" class="btn btn-secondary btn-lg"><i class="mdi mdi-cart-outline"></i> Add To Cart</button> </a>
                                <div class="short-description">
                                    <h5>
                                        Quick Overview
                                        <p class="float-right">Availability: <span class="badge badge-success">

                                                <?php if ($row['status'] == 0) {
                                                    echo 'out Of Stock';
                                                } else {
                                                    echo 'In Stock';
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
    <section class="product-items-slider section-padding bg-white border-top">
        <div class="container">
            <div class="section-header">
                <h5 class="heading-design-h5">Best Offers View <span class="badge badge-primary">20% OFF</span>
                    <a class="float-right text-secondary" href="shop.php">View All</a>
                </h5>
            </div>
            <div class="owl-carousel owl-carousel-featured">
                <?php
                $sql = "SELECT * FROM product ";
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
                        <div class="item">
                            <div class="product">
                                <a href="single.php?id=<?= $row['p_id']; ?>">
                                    <div class="product-header">
                                        <span class="badge badge-success">50% OFF</span>
                                        <img class="img-fluid" src="admin/pro_img/<?= $row['file']; ?>" alt="">
                                        <span class="veg text-success mdi mdi-circle"></span>
                                    </div>
                                    <div class="product-body">
                                        <h5 id="maxline"><?= $row['name']; ?></h5>
                                        <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> <?= $row['qty']; ?>.<?= $utt['unit_name']; ?></h6>
                                    </div>
                                    <div class="product-footer">
                                        <button type="button" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                                        <p class="offer-price mb-0"><?= $row['disc_price']; ?> <i class="mdi mdi-tag-outline"></i><br><span class="regular-price"><?= $row['mrp']; ?></span></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </section>
    <section class="section-padding bg-white border-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="feature-box">
                        <i class="mdi mdi-truck-fast"></i>
                        <h6>Free & Next Day Delivery</h6>
                        <p>Lorem ipsum dolor sit amet, cons...</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="feature-box">
                        <i class="mdi mdi-basket"></i>
                        <h6>100% Satisfaction Guarantee</h6>
                        <p>Rorem Ipsum Dolor sit amet, cons...</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="feature-box">
                        <i class="mdi mdi-tag-heart"></i>
                        <h6>Great Daily Deals Discount</h6>
                        <p>Sorem Ipsum Dolor sit amet, Cons...</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>


</body>

</html>