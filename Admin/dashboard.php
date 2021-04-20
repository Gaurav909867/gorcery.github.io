<?php
include("connection/db.php");
error_reporting(0);
session_start();


if (empty($_SESSION["adm_id"])) {
    header('location:login.php');
} else {

?>
    <?php include('header.php'); ?>
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Dashboard</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Lurid</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-4">
                                    <span class="badge badge-soft-primary float-right">Daily</span>
                                    <h5 class="card-title mb-0">Products</h5>
                                </div>
                                <div class="row d-flex align-items-center mb-4">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0"> Total:-
                                            <?php $sql = "select * from product";
                                            $result = mysqli_query($db, $sql);
                                            $rws = mysqli_num_rows($result);

                                            echo $rws; ?>
                                        </h2>
                                    </div>
                                    <div class="col-4 text-right">
                                        <span class="text-muted"><i class="mdi mdi-shopping text-primary"></i></span>
                                    </div>
                                </div>

                                <div class="progress shadow-sm" style="height: 7px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 57%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col-->

                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-4">
                                    <span class="badge badge-soft-primary float-right">Daily</span>
                                    <h5 class="card-title mb-0">Product In Stock</h5>
                                </div>
                                <div class="row d-flex align-items-center mb-4">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0">
                                            In stock:-
                                            <?php $sql = "select * from product where status =1";
                                            $result = mysqli_query($db, $sql);
                                            $rwss = mysqli_num_rows($result);

                                            echo $rwss; ?>
                                        </h2>
                                    </div>
                                    <div class="col-4 text-right">
                                        <span class="text-muted"><i class="mdi mdi-stocking text-danger"></i></span>
                                    </div>
                                </div>

                                <div class="progress shadow-sm" style="height: 7px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 57%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col-->

                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-4">
                                    <span class="badge badge-soft-primary float-right">All</span>
                                    <h5 class="card-title mb-0">categories</h5>
                                </div>
                                <div class="row d-flex align-items-center mb-4">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0">
                                            Total:-
                                            <?php $sql = "select * from pro_cat ";
                                            $result = mysqli_query($db, $sql);
                                            $cat = mysqli_num_rows($result);

                                            echo $cat; ?>
                                        </h2>
                                    </div>
                                    <div class="col-4 text-right">
                                        <span class="text-muted"><i class="mdi mdi-chart-arc text-primary"></i></span>
                                    </div>
                                </div>

                                <div class="progress shadow-sm" style="height: 7px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 57%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row-->

            </div>


            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Google Maps</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">UI Kit</a></li>
                                <li class="breadcrumb-item active">Google Maps</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Basic</h4>
                            <p class="card-subtitle mb-4">Example of google basic map.</p>

                            <iframe src="https://www.google.com/maps/embed/v1/place?q=india+haryana+faridabad&amp;key=AIzaSyBSFRN6WWGYwmFi498qXXsD2UwkbmD74v4" class="gmaps"></iframe>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->

            </div>
            
        </div> <!-- container-fluid -->
    </div>
    <!-- container-fluid -->
    
    <!-- End Page-content -->
    <?php include('footer.php'); ?>

<?php }
?>