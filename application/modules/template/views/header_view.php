<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SILVERSTONE | Item Catalog</title>

    <link href="<?= @base_url();?>assets/plugins/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= @base_url();?>assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= @base_url();?>assets/plugins/css/animate.css" rel="stylesheet">
    <link href="<?= @base_url();?>assets/plugins/css/style.css" rel="stylesheet">

    <!-- Mainly scripts -->
    <script src="<?= @base_url();?>assets/plugins/js/jquery-2.1.1.js"></script>
    <script src="<?= @base_url();?>assets/plugins/js/bootstrap.min.js"></script>
    <script src="<?= @base_url();?>assets/plugins/js/plugins/dataTables/datatables.min.js"></script>
    <script src="<?= @base_url();?>assets/plugins/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?= @base_url();?>assets/plugins/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <!-- <script src="js/inspinia.js"></script> -->
    <!-- <script src="js/plugins/pace/pace.min.js"></script> -->
</head>

<body class="top-navigation">
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom white-bg">
                <nav class="navbar navbar-static-top" role="navigation">
                    <div class="navbar-header">
                        <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                            <i class="fa fa-reorder"></i>
                        </button>
                        <a href="#" class="navbar-brand">Silverstone</a>
                    </div>
                    <div class="navbar-collapse collapse" id="navbar">
                        <ul class="nav navbar-nav">
                            <!-- <li class="dropdown">
                                <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Menu item <span class="caret"></span></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="#">Menu item</a></li>
                                    <li><a href="#">Menu item</a></li>
                                    <li><a href="#">Menu item</a></li>
                                    <li><a href="#">Menu item</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Menu item <span class="caret"></span></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="#">Menu item</a></li>
                                    <li><a href="#">Menu item</a></li>
                                    <li><a href="#">Menu item</a></li>
                                    <li><a href="#">Menu item</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Menu item <span class="caret"></span></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="#">Menu item</a></li>
                                    <li><a href="#">Menu item</a></li>
                                    <li><a href="#">Menu item</a></li>
                                    <li><a href="#">Menu item</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Menu item <span class="caret"></span></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="#">Menu item</a></li>
                                    <li><a href="#">Menu item</a></li>
                                    <li><a href="#">Menu item</a></li>
                                    <li><a href="#">Menu item</a></li>
                                </ul>
                            </li> -->

                        </ul>
                        <ul class="nav navbar-top-links navbar-right">
                            <li>
                                <a href="#">
                                    Welcome, <?= @$username;?>
                                </a>
                            </li>
                            <li>
                                <a href="<?= @base_url('auth/logout'); ?>">
                                    <i class="fa fa-sign-out"></i> Log out
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>