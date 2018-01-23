<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Huduma Pay | Customer</title>

    <link href="<?= @base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= @base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= @base_url(); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?= @base_url(); ?>assets/css/style.css" rel="stylesheet">

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
                <a href="#" class="navbar-brand">Huduma Pay</a>
            </div>
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <!-- <li class="active">
                        <a aria-expanded="false" role="button" href="layouts.html"> Back to main Layout page</a>
                    </li> -->
                    <li class="active">
                        <a aria-expanded="false" role="button" href="<?= @base_url();?>customer"> Services </span></a>
                    </li>
                    <li class="">
                        <a aria-expanded="false" role="button" href="<?= @base_url();?>customer/orders"> Orders </span></a>
                    </li>
                </ul>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="<?= @base_url(); ?>auth/logout">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <!-- <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Typography</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>UI Elements</a>
                        </li>
                        <li class="active">
                            <strong>Typography</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div> -->
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Payment Mehtod</h5>
                        </div>
                        <div class="ibox-content">
                                <p class="text-muted">Go to MPESA Menu on your phone</p>
                                <p class="text-primary">Select <strong>Lipa na MPESA</strong></p>
                                <p class="text-success">Select <strong>Pay Bill</strong></p>
                                <p class="text-success">Select <strong>Enter business no.</strong></p>
                                <p class="text-danger">Enter business number <strong>XXX-XXX</strong></p>
                                <p class="text-danger">Enter <strong>Account no. <\Your Phone NUmber\></strong></p>
                                <p class="text-danger">Enter Amount Ksh.<strong><?= @number_format($amount); ?></strong></p>
                                <p class="text-danger">Enter <strong>Your PIN</strong></p>
                        </div>
                    </div>
                </div>
                
            </div>
        <!-- <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Huduma Pay &copy; 2017-<?= @Date('Y'); ?>
            </div>
        </div> -->

        </div>
        </div>



    <!-- Mainly scripts -->
    <script src="<?= @base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?= @base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= @base_url(); ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?= @base_url(); ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?= @base_url(); ?>assets/js/inspinia.js"></script>
    <script src="<?= @base_url(); ?>assets/js/plugins/pace/pace.min.js"></script>

</body>
</html>