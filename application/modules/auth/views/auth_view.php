<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/login_two_columns.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Jan 2018 13:26:01 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Huduna Pay | Login 2</title>

    <link href="<?= @base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= @base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?= @base_url(); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?= @base_url(); ?>assets/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">
            <center><h2 class="font-bold">Welcome to Huduma Pay</h2></center>
            <div class="col-md-6 col-md-offset-3">
                <?php 
                    if ($this->session->flashdata('error_message')) {
                ?>
                <div class="alert alert-danger"><?= @$this->session->flashdata('error_message');?></div>
                <?php } ?>
                <?php 
                    if ($this->session->flashdata('succes_message')) {
                ?>
                <div class="alert alert-success"><?= @$this->session->flashdata('succes_message');?></div>
                <?php } ?>
                <div class="ibox-content">
                    <form class="m-t" role="form" action="<?= @base_url(); ?>auth/verify" method="post">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" required="">
                        </div>
                        <button type="submit" id="loginBtn" class="btn btn-primary block full-width m-b">Login</button>

                        <a href="#">
                            <small>Forgot password?</small>
                        </a>

                        <p class="text-muted text-center">
                            <small>Do not have an account?</small>
                        </p>
                        <a class="btn btn-sm btn-white btn-block" href="<?= @base_url(); ?>auth/signup">Create an account</a>
                    </form>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Huduma Pay
            </div>
            <div class="col-md-6 text-right">
               <small>© 2014-2015</small>
            </div>
        </div>
    </div>

</body>
<script src="<?= @base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

    });
</script>

</html>
