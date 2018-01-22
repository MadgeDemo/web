<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SILVERSTONE</title>

        <link rel="shortcut icon" href="<?php echo base_url('assets/template/images/clientSpecific/silverstone.png'); ?>">
        <link href="<?php echo base_url('assets/template/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/template/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/template/nprogress/nprogress.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/template/build/css/custom.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/template/pnotify/dist/pnotify.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/template/pnotify/dist/pnotify.buttons.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/template/pnotify/dist/pnotify.nonblock.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/custom.css'); ?>" rel="stylesheet">

        <script src="<?php echo base_url('assets/template/jquery/dist/jquery.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/template/pnotify/dist/pnotify.js'); ?>"></script>
        <script src="<?php echo base_url('assets/template/pnotify/dist/pnotify.buttons.js'); ?>"></script>
        <script src="<?php echo base_url('assets/template/pnotify/dist/pnotify.nonblock.js'); ?>"></script>
        <style>
            .overlay{
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 10;
                background-color: rgba(0,0,0,0.5); /*dim the background*/
            }
        </style>
    </head>
    <body class="login" style="">
        <div class="overlay">
            <img src="<?php echo base_url('assets/template/images/clientSpecific/ring-alt.gif');?>" style=" display:block;margin:auto; padding-top: 25%;">
        </div>
        <?= @$this->load->view($content_view); ?>
    </body>
    <script>
        $(document).ready(function(){
            $(".overlay").hide();
            $("#removeNotify").click(function(){
                PNotify.removeAll();
                $("#removeNotify").hide();
            });
            window.validatePassword = function($password) {
                var patt = new RegExp(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/);
                var res = patt.test($password);
                return res;
            }
        });
    </script>
</html>

