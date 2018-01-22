<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Jan 2018 13:26:01 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Huduma Pay | Register</title>

    <link href="<?= @base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= @base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= @base_url(); ?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?= @base_url(); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?= @base_url(); ?>assets/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <h3>Huduma Pay</h3>
            <p>Create account to access our services.</p>
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
                <form class="m-t" role="form" action="<?= @base_url(); ?>auth/register" method="post">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Name" required="">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" required="">
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" class="form-control" placeholder="Phone" required="">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required="">
                    </div>
                    <div class="form-group">
                        <input type="password" name="confirm_password" class="form-control" placeholder="Confirm password" required="">
                    </div>
                    <div class="form-group">
                            <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Agree the terms and policy </label></div>
                    </div>
                    <button type="submit" id="registerBtn" class="btn btn-primary block full-width m-b">Register</button>

                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="<?= @base_url(); ?>">Login</a>

                </form>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?= @base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?= @base_url(); ?>assets/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?= @base_url(); ?>assets/js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Jan 2018 13:26:01 GMT -->
</html>
