<?php
include("admin/connection/db.php");
error_reporting(0);
session_start();
?>
<?php include 'header.php'; ?>
<section class="carousel-slider-main text-center border-top border-bottom bg-white">
    <div class="owl-carousel owl-carousel-slider">
        <?php
        $sql = "SELECT * FROM banner order by b_id desc limit 5";
        $query = mysqli_query($db, $sql);
        while ($bnnr = mysqli_fetch_array($query)) { ?>
            <div class="item">
                <a href="shop.php"><img class="img-fluid" src="admin/<?= $bnnr['location']; ?>" alt="First slide"></a>
            </div>
        <?php } ?>

    </div>
</section>
<section class="top-category section-padding">
    <div class="container">
        <div class="owl-carousel owl-carousel-category">
            <div class="item">
                <div class="category-item">
                    <a href="shop.php">
                        <img class="img-fluid" src="img/small/1.jpg" alt="">
                        <h6>Fruits & Vegetables</h6>
                        <p>150 Items</p>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="category-item">
                    <a href="shop.php">
                        <img class="img-fluid" src="img/small/2.jpg" alt="">
                        <h6>Grocery & Staples</h6>
                        <p>95 Items</p>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="category-item">
                    <a href="shop.php">
                        <img class="img-fluid" src="img/small/3.jpg" alt="">
                        <h6>Beverages</h6>
                        <p>65 Items</p>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="category-item">
                    <a href="shop.php">
                        <img class="img-fluid" src="img/small/4.jpg" alt="">
                        <h6>Home & Kitchen</h6>
                        <p>965 Items</p>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="category-item">
                    <a href="shop.php">
                        <img class="img-fluid" src="img/small/5.jpg" alt="">
                        <h6>Furnishing & Home Needs</h6>
                        <p>125 Items</p>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="category-item">
                    <a href="shop.php">
                        <img class="img-fluid" src="img/small/6.jpg" alt="">
                        <h6>Household Needs</h6>
                        <p>325 Items</p>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="category-item">
                    <a href="shop.php">
                        <img class="img-fluid" src="img/small/7.jpg" alt="">
                        <h6>Personal Care</h6>
                        <p>156 Items</p>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="category-item">
                    <a href="shop.php">
                        <img class="img-fluid" src="img/small/8.jpg" alt="">
                        <h6>Breakfast & Dairy</h6>
                        <p>857 Items</p>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="category-item">
                    <a href="shop.php">
                        <img class="img-fluid" src="img/small/9.jpg" alt="">
                        <h6>Biscuits, Snacks & Chocolates</h6>
                        <p>48 Items</p>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="category-item">
                    <a href="shop.php">
                        <img class="img-fluid" src="img/small/10.jpg" alt="">
                        <h6>Noodles, Sauces & Instant Food</h6>
                        <p>156 Items</p>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="category-item">
                    <a href="shop.php">
                        <img class="img-fluid" src="img/small/11.jpg" alt="">
                        <h6>Pet Care</h6>
                        <p>568 Items</p>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="category-item">
                    <a href="shop.php">
                        <img class="img-fluid" src="img/small/12.jpg" alt="">
                        <h6>Meats, Frozen & Seafood</h6>
                        <p>156 Items</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="product-items-slider section-padding">
    <div class="container">
        <div class="section-header">
            <h5 class="heading-design-h5">Top Savers Today <span class="badge badge-primary">20% OFF</span>
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
                            <a href="single.php?id=<?= $row['p_id'] ?>">
                                <div class="product-header">
                                    <span class="badge badge-success">50% OFF</span>
                                    <img class="img-fluid" src="admin/pro_img/<?= $row['file']; ?>" alt="">
                                    <span class="veg text-success mdi mdi-circle"></span>
                                </div>
                                <div class="product-body">
                                    <h5 id="maxline"><?= $row['name']; ?></h5>
                                    <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> -
                                        <?php if ($row['status'] == 0) {
                                            echo 'out Of Stock';
                                        } else {
                                            if ($row['qty'] == 0) {
                                                echo 'Soon..';
                                            } else {
                                                echo '' . $row['qty'] . ' ' . $utt['unit_name'] . '';
                                            }
                                        }
                                        ?></h6>
                                </div>
                                <div class="product-footer">
                                    <button type="button" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                                    <p class="offer-price mb-0">$<?= $row['disc_price']; ?> <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">$<?= $row['mrp']; ?></span></p>
                                </div>
                            </a>
                        </div>
                    </div>
            <?php }
            }
            ?>

        </div>
    </div>
</section>
<section class="offer-product">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-6">
                <a href="#"><img class="img-fluid" src="img/ad/1.jpg" alt=""></a>
            </div>
            <div class="col-md-6">
                <a href="#"><img class="img-fluid" src="img/ad/2.jpg" alt=""></a>
            </div>
        </div>
    </div>
</section>
<section class="product-items-slider section-padding">
    <div class="container">
        <div class="section-header">
            <h5 class="heading-design-h5">Best Offers View <span class="badge badge-info">20% OFF</span>
                <a class="float-right text-secondary" href="shop.php">View All</a>
            </h5>
        </div>
        <div class="owl-carousel owl-carousel-featured">
            <div class="item">
                <div class="product">
                    <a href="single.php">
                        <div class="product-header">
                            <span class="badge badge-success">50% OFF</span>
                            <img class="img-fluid" src="img/item/7.jpg" alt="">
                            <span class="veg text-success mdi mdi-circle"></span>
                        </div>
                        <div class="product-body">
                            <h5>Product Title Here</h5>
                            <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
                        </div>
                        <div class="product-footer">
                            <button type="button" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                            <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">$800.99</span></p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="product">
                    <a href="single.php">
                        <div class="product-header">
                            <span class="badge badge-success">50% OFF</span>
                            <img class="img-fluid" src="img/item/8.jpg" alt="">
                            <span class="non-veg text-danger mdi mdi-circle"></span>
                        </div>
                        <div class="product-body">
                            <h5>Product Title Here</h5>
                            <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
                        </div>
                        <div class="product-footer">
                            <button type="button" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                            <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">$800.99</span></p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="product">
                    <a href="single.php">
                        <div class="product-header">
                            <span class="badge badge-success">50% OFF</span>
                            <img class="img-fluid" src="img/item/9.jpg" alt="">
                            <span class="non-veg text-danger mdi mdi-circle"></span>
                        </div>
                        <div class="product-body">
                            <h5>Product Title Here</h5>
                            <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
                        </div>
                        <div class="product-footer">
                            <button type="button" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                            <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">$800.99</span></p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="product">
                    <a href="single.php">
                        <div class="product-header">
                            <span class="badge badge-success">50% OFF</span>
                            <img class="img-fluid" src="img/item/10.jpg" alt="">
                            <span class="veg text-success mdi mdi-circle"></span>
                        </div>
                        <div class="product-body">
                            <h5>Product Title Here</h5>
                            <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
                        </div>
                        <div class="product-footer">
                            <button type="button" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                            <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">$800.99</span></p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="product">
                    <a href="single.php">
                        <div class="product-header">
                            <span class="badge badge-success">50% OFF</span>
                            <img class="img-fluid" src="img/item/11.jpg" alt="">
                            <span class="veg text-success mdi mdi-circle"></span>
                        </div>
                        <div class="product-body">
                            <h5>Product Title Here</h5>
                            <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
                        </div>
                        <div class="product-footer">
                            <button type="button" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                            <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">$800.99</span></p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="product">
                    <a href="single.php">
                        <div class="product-header">
                            <span class="badge badge-success">50% OFF</span>
                            <img class="img-fluid" src="img/item/12.jpg" alt="">
                            <span class="veg text-success mdi mdi-circle"></span>
                        </div>
                        <div class="product-body">
                            <h5>Product Title Here</h5>
                            <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
                        </div>
                        <div class="product-footer">
                            <button type="button" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                            <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">$800.99</span></p>
                        </div>
                    </a>
                </div>
            </div>
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