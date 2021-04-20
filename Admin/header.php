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
    <script src="ckeditor/ckeditor.js"></script>


</head>

<body>

    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <!-- LOGO -->
                <div class="navbar-brand-box d-flex align-items-left">
                    <a href="index.php" class="logo">
                        <span>
                            <img src="assets/images/logo-light.png" alt="" height="18">
                        </span>
                        <i>
                            <img src="assets/images/logo-small.png" alt="" height="24">
                        </i>
                    </a>

                    <button type="button" class="btn btn-sm mr-2 d-lg-none px-3 font-size-16 header-item waves-effect waves-light" id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </div>

                <div class="d-flex align-items-center">

                    <div class="dropdown d-none d-sm-inline-block ml-2">
                        <button type="button" class="btn header-item noti-icon waves-effect waves-light" id="page-header-search-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-magnify"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-search-dropdown">

                            <form class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    

                   

                    <div class="dropdown d-inline-block ml-2">
                        <button type="button" class="btn header-item waves-effect waves-light" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
                            <span class="d-none d-sm-inline-block ml-1">Gaurav</span>
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                <span>Inbox</span>
                                <span>
                                    <span class="badge badge-pill badge-info">3</span>
                                </span>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                <span>Profile</span>
                                <span>
                                    <span class="badge badge-pill badge-warning">1</span>
                                </span>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                Settings
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                <span>Lock Account</span>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="logout.php">
                                <span>Log Out</span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </header>

        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Menu</li>

                        <li>
                            <a href="index.php" class="waves-effect"><i class="mdi mdi-view-dashboard"></i><span class="badge badge-pill badge-info float-right"></span><span>Dashboard</span></a>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="mdi mdi-shopping"></i><span>Products</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="view_pro.php">View Product</a></li>
                                <li><a href="add_pro.php">Insert Product</a></li>
                            </ul>
                        </li>
                        <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="mdi mdi-briefcase-check"></i><span>Product Category</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="view_cat.php">View Category</a></li>
                                <li><a href="add_cat.php">Insert Category</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="mdi mdi-settings"></i><span>Product Modification</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                            <li><a href="choose_cat.php">Add Product Quantity</a></li>
                                <li><a href="pro_status.php">Product Status</a></li>
                            </ul>
                        </li>
                        <li class="menu-title">Webite Modifications</li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="mdi mdi-image"></i><span>Banner Image</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                            <li><a href="banner_img.php">Add Image</a></li>
                            </ul>
                        </li>
                        
                        <!-- <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="mdi mdi-book-open-page-variant"></i><span>Sample Pages</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="pages-invoice.html">Invoice</a></li>
                                <li><a href="pages-starter.html">Starter Page</a></li>
                                <li><a href="pages-maintenance.html">Maintenance</a></li>
                                <li><a href="pages-faqs.html">FAQs</a></li>
                                <li><a href="pages-pricing.html">Pricing</a></li>
                                <li><a href="pages-team.html">Team</a></li>
                                <li><a href="pages-login.html">Login</a></li>
                                <li><a href="pages-register.html">Register</a></li>
                                <li><a href="pages-recoverpw.html">Recover Password</a></li>
                                <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                                <li><a href="pages-404.html">Error 404</a></li>
                                <li><a href="pages-500.html">Error 500</a></li>
                            </ul>
                        </li>
 -->


                        <!-- <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="mdi mdi-briefcase-check"></i><span>UI Elements</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="ui-buttons.html">Buttons</a></li>
                                <li><a href="ui-cards.html">Cards</a></li>
                                <li><a href="ui-carousel.html">Carousel</a>
                                    <li><a href="ui-embeds.html">Embeds</a>
                                        <li><a href="ui-general.html">General</a></li>
                                        <li><a href="ui-grid.html">Grid</a></li>
                                        <li><a href="ui-media-objects.html">Media Objects</a></li>
                                        <li><a href="ui-modals.html">Modals</a></li>
                                        <li><a href="ui-progressbars.html">Progress Bars</a></li>
                                        <li><a href="ui-tabs.html">Tabs</a></li>
                                        <li><a href="ui-typography.html">Typography</a></li>
                                        <li><a href="ui-toasts.html">Toasts</a></li>
                                        <li><a href="ui-tooltips-popovers.html">Tooltips & Popovers</a></li>
                                        <li><a href="ui-scrollspy.html">Scrollspy</a></li>
                                        <li><a href="ui-spinners.html">Spinners</a></li>
                                        <li><a href="ui-sweetalerts.html">Sweet Alerts</a></li>
                            </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="waves-effect"><i class="mdi mdi-format-page-break"></i><span class="badge badge-pill badge-danger float-right">6</span><span>Forms</span></a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="forms-elements.html">Elements</a></li>
                                    <li><a href="forms-plugins.html">Plugins</a></li>
                                    <li><a href="forms-validation.html">Validation</a></li>
                                    <li><a href="forms-mask.html">Masks</a></li>
                                    <li><a href="forms-quilljs.html">Quilljs</a></li>
                                    <li><a href="forms-uploads.html">File Uploads</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="mdi mdi-table-merge-cells"></i><span>Tables</span></a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="tables-basic.html">Basic Tables</a></li>
                                    <li><a href="tables-datatables.html">Data Tables</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="mdi mdi-chart-donut"></i><span>Charts</span></a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="charts-morris.html">Morris</a></li>
                                    <li><a href="charts-google.html">Google</a></li>
                                    <li><a href="charts-chartjs.html">Chartjs</a></li>
                                    <li><a href="charts-sparkline.html">Sparkline</a></li>
                                    <li><a href="charts-knob.html">Jquery Knob</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="mdi mdi-black-mesa"></i><span>Icons</span></a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="icons-feather.html">Feather Icons</a></li>
                                    <li><a href="icons-materialdesign.html">Material Design</a></li>
                                    <li><a href="icons-dripicons.html">Dripicons</a></li>
                                    <li><a href="icons-fontawesome.html">Font awesome</a></li>
                                </ul>
                            </li>

                            <li class="menu-title">More</li>

                            <li><a href="calendar.html" class=" waves-effect"><i class="mdi mdi-calendar"></i><span>Calendar</span></a></li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="mdi mdi-map-marker-multiple"></i><span>Maps</span></a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="maps-google.html">Google Maps</a></li>
                                    <li><a href="maps-vector.html">Vector Maps</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="mdi mdi-share-variant"></i><span>Multi Level</span></a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li><a href="javascript: void(0);">Level 1.1</a></li>
                                    <li><a href="javascript: void(0);" class="has-arrow">Level 1.2</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                            <li><a href="javascript: void(0);">Level 2.1</a></li>
                                            <li><a href="javascript: void(0);">Level 2.2</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li> -->
                    </ul>
                </div>
            </div>
        </div>