<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/table_data_tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Jan 2018 13:28:00 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Data Tables</title>

    <link href="<?= @base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= @base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?= @base_url();?>assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <link href="<?= @base_url();?>assets/css/animate.css" rel="stylesheet">
    <link href="<?= @base_url();?>assets/css/style.css" rel="stylesheet">

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
                    <li class="">
                        <a aria-expanded="false" role="button" href="<?= @base_url();?>customer"> Services </span></a>
                    </li>
                    <li class="active">
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
                                <li class="dropdown" style="margin:1em;"><?= @$value->name;?> <strong>Ksh.<?= @$value->value;?></strong></li>
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
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Customer Orders</h5>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Service Bought</th>
                        <th>Service Description</th>
                        <th>Price</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $tr = '';
                        $count = 1;
                        if (empty($orders)) {
                            $tr .= "<tr class='gradeX'><td class='center' colspan='5'>No Data</td></tr>";
                        } else {
                            foreach($orders as $key => $value) {
                                $tr .= "<tr class='gradeX'>";
                                $tr .= "<td class='center'>".$count."</td>";
                                $tr .= "<td>".$value->service."</td>";
                                $tr .= "<td>".$value->description."</td>";
                                $tr .= "<td>Ksh. ".number_format($value->value)."</td>";
                                $tr .= "<td class='center'>".$value->created_date."</td>";
                                $tr .= "</tr>";
                                $count++;
                            }  
                            echo $tr; 
                        }
                    ?>
                    </tbody>
                    <tfoot>
                    <tr>
                         <th>#</th>
                        <th>Service Bought</th>
                        <th>Service Description</th>
                        <th>Price</th>
                        <th>Date</th>
                    </tr>
                    </tfoot>
                    </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="footer">
            
            <div>
                <strong>Copyright</strong> Huduma Pay &copy; 2014-<?= @Date('Y');?>
            </div>
        </div>

        </div>
        </div>



    <!-- Mainly scripts -->
    <script src="<?= @base_url();?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?= @base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?= @base_url();?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?= @base_url();?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="<?= @base_url();?>assets/js/plugins/dataTables/datatables.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?= @base_url();?>assets/js/inspinia.js"></script>
    <script src="<?= @base_url();?>assets/js/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 10,
                responsive: true,
                // dom: '<"html5buttons"B>lTfgitp',
                // buttons: [
                //     { extend: 'copy'},
                //     {extend: 'csv'},
                //     {extend: 'excel', title: 'ExampleFile'},
                //     {extend: 'pdf', title: 'ExampleFile'},

                //     {extend: 'print',
                //      customize: function (win){
                //             $(win.document.body).addClass('white-bg');
                //             $(win.document.body).css('font-size', '10px');

                //             $(win.document.body).find('table')
                //                     .addClass('compact')
                //                     .css('font-size', 'inherit');
                //     }
                //     }
                // ]

            });

        });

    </script>

</body>
</html>
