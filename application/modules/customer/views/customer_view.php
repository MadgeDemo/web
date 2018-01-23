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
                        <a aria-expanded="false" role="button" href="<?= @base_url(); ?>customer"> Services </span></a>
                    </li>
                    <li class="">
                        <a aria-expanded="false" role="button" href="<?= @base_url(); ?>customer/orders"> Orders </span></a>
                    </li>
                </ul>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Cart <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu" id="cartUl">
                        <?php
                            if ($cart) {
                                foreach ($cart as $key => $value) {
                        ?>
                                <li class="dropdown" style="margin:1em;"><?= @$value->name;?> <strong>Ksh.<?= @number_format($value->value);?></strong></li>
                        <?php
                                }
                        ?>
                            <li class="dropdown" style="margin:1em;"><a href="<?= @base_url(); ?>cart/checkout"><button class="btn btn-success">Checkout</button></a></li>
                        <?php
                            } else {
                        ?>
                                <li class="dropdown" style="margin:1em;">No item in cart</li>
                        <?php
                            }
                        ?>
                        </ul>
                    </li>
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
            <div id="message"></div>
            <div class="row">
            <?php
                foreach($services as $key => $value) {
            ?>
                <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-content product-box">

                            <div class="product-imitation">
                                <?= @$value->name; ?>
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    Ksh. <?= @number_format($value->price); ?>
                                </span>
                                <small class="text-muted">Category</small>
                                <a href="#" class="product-name">Services</a>
                                <div class="small m-t-xs">
                                    <?= @$value->description; ?>
                                </div>
                                <div class="m-t text-righ">

                                    <button class="btn btn-xs btn-outline btn-primary select_service" value="<?= @$value->ID;?>">Select <i class="fa fa-long-arrow-right"></i> </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>
            </div>
            
        </div>
        <div class="footer">
            <!-- <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div> -->
            <div>
                <strong>Copyright</strong> Huduma Pay &copy; 2017-<?= @Date('Y'); ?>
            </div>
        </div>

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

    <!-- Flot -->
    <script src="<?= @base_url(); ?>assets/js/plugins/flot/jquery.flot.js"></script>
    <script src="<?= @base_url(); ?>assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?= @base_url(); ?>assets/js/plugins/flot/jquery.flot.resize.js"></script>

    <!-- ChartJS-->
    <script src="<?= @base_url(); ?>assets/js/plugins/chartJs/Chart.min.js"></script>

    <!-- Peity -->
    <script src="<?= @base_url(); ?>assets/js/plugins/peity/jquery.peity.min.js"></script>
    <!-- Peity demo -->
    <script src="<?= @base_url(); ?>assets/js/demo/peity-demo.js"></script>


    <script type="text/javascript">
        $().ready(function(){
            $("#message").hide();
            $(".select_service").click(function(){
                service = $(this).val();
                $.post("<?= @base_url(); ?>cart/add", {'service': service}, function(res) {
                    obj = JSON.parse(res);
                    if (obj.status == false) {
                        $("#message").html(obj.message);
                        $("#message").attr('class', 'alert alert-danger');
                        $("#message").show();
                        setTimeout(function(){
                            $("#message").hide();
                        }, 3000);
                    }

                    if (obj.status == true) {
                        $("#message").html(obj.message);
                        $("#message").attr('class', 'alert alert-success');
                        $("#message").show();
                        $.get("<?= @base_url(); ?>customer/get_customer_cart", function(response){
                            obj = JSON.parse(response);
                            $("#cartUl").html(obj);
                        });
                        setTimeout(function(){
                            $("#message").hide();
                        }, 6000);
                        
                    }
                });
            });
        });
    </script>

</body>
</html>