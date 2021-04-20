<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <title>Lurid - Material Design Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Plugins css -->
    <link href="../plugins/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/datatables/select.bootstrap4.css" rel="stylesheet" type="text/css" />


    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/theme.min.css" rel="stylesheet" type="text/css" />

</head>

<body>
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


                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Categoery</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active">Datatables</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Categories Data Table</h4>


                                <table id="basic-datatable" class="table dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Category Name</th>
                                            <th>MRP Price( &#8377;)</th>
                                            <th>Discount Price( &#8377;)</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                    <?php
                                            $sql = "SELECT * FROM product order by p_id desc";
                                            $query = mysqli_query($db, $sql);
                                           

                                            if (!mysqli_num_rows($query) > 0) {
                                                echo '<td colspan="11"><center>No Data-stored!</center></td>';
                                            } else {
                                                while ($row = mysqli_fetch_array($query)) {
                                                    $r_cat=$row['cat'];
                                                    $sql = "SELECT * FROM pro_cat where c_id=$r_cat";
                                                    $res = mysqli_query($db, $sql);
                                                    $r = mysqli_fetch_array($res);
                                                    echo ' 
                                             <tr>
                                            <td>' . $row['name'] . '</td>
                                            <td>' . $r['cat_name'] . '</td>
                                            <td><s>' . $row['mrp'] . '</s></td>
                                            <td>' . $row['disc_price'] . '</td>
                                            <td><div class="col-md-12">
												<img src="pro_img/' . $row['file'] . '" class="img-responsive radius"  style="min-width:50px;min-height:50px;height:50px;width:50px"/>
													</div></td>	
                                        
                                            <td><span><a href="delete_pro.php?id=' . $row['p_id'] . '" class="btn btn-danger btn-flat btn-addon btn-sm m-b-10 m-l-7"><i  class="mdi mdi-delete"></i></a> </span>
                                                 <span><a href="update_pro.php?id='.$row['p_id'].'" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-7"><i  class="mdi mdi-settings"></i></a></span>
                                                 <span><a href="view.php?id='.$row['p_id'].'" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-7"><i  class="mdi mdi-eye"></i></a></span>
									        </td>


                                        </tr>
                                        ';
                                    }
                                }
                                ?>
                                        

                                    </tbody>
                                </table>


                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div>
            </div>
        </div>

        <?php include('footer.php'); ?>
    <?php }
    ?>



    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metismenu.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/simplebar.min.js"></script>

    <!-- third party js -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap4.js"></script>
    <script src="../plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables/responsive.bootstrap4.min.js"></script>
    <script src="../plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="../plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="../plugins/datatables/buttons.html5.min.js"></script>
    <script src="../plugins/datatables/buttons.flash.min.js"></script>
    <script src="../plugins/datatables/buttons.print.min.js"></script>
    <script src="../plugins/datatables/dataTables.keyTable.min.js"></script>
    <script src="../plugins/datatables/dataTables.select.min.js"></script>
    <script src="../plugins/datatables/pdfmake.min.js"></script>
    <script src="../plugins/datatables/vfs_fonts.js"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="assets/pages/datatables-demo.js"></script>

    <!-- App js -->
    <script src="assets/js/theme.js"></script>

</body>

</html>