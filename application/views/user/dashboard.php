<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?php echo $title; ?></title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url('assets/') ?>favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url('assets/') ?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- JQuery DataTable Css -->
    <link href="<?php echo base_url('assets/') ?>plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <!-- Waves Effect Css -->
    <link href="<?php echo base_url('assets/') ?>plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url('assets/') ?>plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url('assets/') ?>css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url('assets/') ?>css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo base_url('assets/') ?>index.html">Public<b>Cloud</b></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- #END# Tasks -->
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url('assets/') ?>images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $userData->user_name; ?></div>
                    <div class="email"><?php echo $userData->user_email; ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo base_url('login/logout'); ?>"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="<?php echo active_link('UserDashboard'); ?>">
                        <a href="<?php echo base_url('UserDashboard/') ?>">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="<?php echo active_link('UserDashboard/Upload'); ?>">
                        <a href="<?php echo base_url('UserDashboard/Upload'); ?>">
                            <i class="material-icons">cloud_upload</i>
                            <span>Upload Data</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2019 - 2020 <a href="javascript:void(0);">Public<b>Cloud</b></a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Dashboard</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-indigo hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">attach_file</i>
                        </div>
                        <div class="content">
                            <div class="text">No of Files</div>
                            <div class="number"><?php echo $count_files; ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Uploaded Documents
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th style="width: 8%">Sr No.</th>
                                            <th style="width: 30%">File Name</th>
                                            <th style="width: 15%">File Extenstion</th>
                                            <th style="width: 8%;">Encrypted</th>
                                            <th style="width: 8%">Decrypted</th>
                                            <!-- <th style="width: 8%">Action</th> -->
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th style="width: 8%">Sr No.</th>
                                            <th style="width: 30%">File Name</th>
                                            <th style="width: 15%">File Extenstion</th>
                                            <th style="width: 8%">Encrypted</th>
                                            <th style="width: 8%">Decrypted</th>
                                            <!-- <th style="width: 8%">Action</th> -->
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                        $i=1;
                                        foreach ($files as $value) {

                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $value->ufile_name; ?></td>
                                                <td><?php echo $value->file_ext; ?></td>
                                                <td class="text-center">
                                                    <a href="#" id="data_id" value="<?php echo $value->id; ?>"><i class="material-icons col-blue">cloud_download</i></a>
                                                </td>
                                                <!-- <td class="text-center">
                                                    <i class="material-icons col-red">cloud_download</i>
                                                </td>
                                                <td class="text-center">
                                                    <i class="material-icons col-red">delete_sweep</i>
                                                </td> -->
                                            </tr>
                                            <?php 
                                            $i++;
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url('assets/') ?>plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url('assets/') ?>plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url('assets/') ?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url('assets/') ?>plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url('assets/') ?>js/admin.js"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url('assets/') ?>js/demo.js"></script>
    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url('assets/') ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url('assets/') ?>plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url('assets/') ?>plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>

    <!-- custom js -->
    <script src="<?php echo base_url('assets/') ?>js/pages/tables/jquery-datatable.js"></script>
    <script>
        $(document).ready(function() {
            $('#data_id').click(function(event) {
                let pin = prompt('Type here');
                var id = $(this).attr("value");
                $.ajax({
                    url:'<?php echo base_url('UserDashboard/download'); ?>',
                    type:"post",
                    data:{
                        pin:pin,
                        id:id
                    },
                    success:function(response){

                    },
                    error:function(response){
                        alert("Pin Does not Match.");
                    }
                });
            });
        });
    </script>
</body>

</html>
