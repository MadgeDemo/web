<!DOCTYPE html>
<html lang="en">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Silverstone | Web Portal</title>

    <link rel="shortcut icon" href="<?php echo base_url('assets/template/images/clientSpecific/silverstone.png'); ?>">
    <link href="<?php echo base_url('assets/template/textEditor/editor.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/template/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/template/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/template/nprogress/nprogress.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/template/build/css/custom.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/custom.css'); ?>" rel="stylesheet">
    

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/template/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?= @base_url();?>assets/plugins/js/plugins/dataTables/datatables.min.js"></script>

    <style>
    .overlay{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 1000px;
    z-index: 10;
    background-color: rgba(0,0,0,0.5); /*dim the background*/
    }
    </style>
    </head>
    <body class="nav-md">
        <div class="overlay">
        <img src="<?php echo base_url('assets/template/images/clientSpecific/ring-alt.gif');?>" style=" display:block;margin:auto; padding-top: 25%;">
        </div>
        <div style="width:100%; height:5px; background-color:#9e1f64;"></div>
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view" style="background-color: #3f3f3f;">
                        <div class="navbar nav_title" style="height:3em; background-color: #3f3f3f;" id="site_titleDiv">
                            <a href="index.html" class="site_title" style="height:3em; background-color: #3f3f3f;" >
                                <h3><?= @$page; ?></h3>
                            <!-- <img src="<?php //echo base_url('assets/images/clientSpecific/logo.png'); ?>" >     -->
                            </a>
                        </div>
                        <!-- menu profile quick info -->
                        <!-- <div class="profile">
                        <div class="profile_pic">
                        <a href="<?php //echo base_url("home"); ?>">
                        <img src="data:image/jpeg;base64,<?php //echo $this->session->userdata('picture'); ?>" class="img-circle profile_img">
                        </a>
                        </div>
                        </div> -->
                        <!-- /menu profile quick info -->
                        <div class="clearfix"></div>
                        <br />
                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <ul class="nav side-menu">
                                    <li>
                                        <a> <strong> NAME: </strong> 
                                        <span id="leftColTitle" class="wordwrap"><?= @$username;?></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a> <strong> EMAIL: </strong> <span id="leftColTitle" class="wordwrap"><?= @$navData['phone']; ?></span> 
                                        </a>
                                    </li>
                                    <hr/>
                                    <li>
                                        <a href="<?= @base_url('items'); ?>"><i class="fa fa-desktop"></i> Inventory </a>
                                    </li>
                                    <?php
                                    if ($this->session->userdata('suser') == 4) {
                                    ?>
                                    <li>
                                        <a href="<?= @base_url('customers'); ?>"><i class="fa fa-clone"></i> Customer Statement </span></a>
                                    </li>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($this->session->userdata('suser') == 1) {
                                    ?>
                                    <li>
                                        <a><i class="fa fa-edit"></i> User Management <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?= @base_url('users'); ?>">Manage Users</a></li>
                                            <li><a href="<?= @base_url('users/administrators'); ?>">Administrators</a></li>
                                        </ul>
                                    </li>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($this->session->userdata('suser') == 2) {
                                    ?>
                                    <li>
                                        <a href="<?= @base_url('employees/myCustomers'); ?>"><i class="fa fa-edit"></i> My Customers </a>
                                    </li>
                                    <?php
                                    }
                                    ?>
                                    <li>
                                        <a href="<?php echo base_url('auth/logout'); ?>"><i class="glyphicon glyphicon-off"></i> Logout </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /sidebar menu -->
                        <!-- /menu footer buttons -->
                        <div class="sidebar-footer hidden-small">
                            <hr/>
                            <center>
                                Powered By DataposIT
                            </center>
                        </div>
                        <!-- /menu footer buttons -->
                    </div>
                </div>
                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav>
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>

                            <ul class="nav navbar-nav navbar-right">
                                <li role="presentation" class="dropdown">
                                    <a data-toggle="tooltip" data-placement="top" href="<?php echo base_url('auth/logout'); ?>">
                                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                                        Logout
                                    </a>
                                </li>
                                <li role="presentation" class="dropdown">
                                    <h3><?= @$this->config->item('company'); ?> <small><br/><strong><?= @$this->config->item('location'); ?></strong></small></h3>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /top navigation -->
                <!-- page content -->
                <?= $this->load->view($content_view);?>
                <!-- Page content -->
                <!-- Bootstrap -->
                <script src="<?php echo base_url('assets/template/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
                <!-- NProgress -->
                <script src="<?php echo base_url('assets/template/nprogress/nprogress.js'); ?>"></script>
                <script src="<?php echo base_url('assets/template/js/moment/moment.js');?> "></script>
                <!-- Custom Theme Scripts -->
                <script src="<?php echo base_url('assets/template/build/js/custom.js'); ?>"></script>
                <!-- footer content -->
                <footer>
                <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $(".overlay").hide();
                $(".table").DataTable();
                $("#04850130000").click(function(){
            alert("Just work");
        });
            });
        </script>
    </body>
</html>