<!doctype html>
<html lang="en">


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/pages/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:32:19 GMT -->
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/assetlogin/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/ico.ico" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Login Admin</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="<?php echo base_url(); ?>assets/assetlogin/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/assetlogin/css/material-dashboard.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/assetlogin/css/demo.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/google-roboto-300-700.css" rel="stylesheet" />
</head>


<body>

    <div class="wrapper wrapper-full-page">
        <div class="full-page login-page" filter-color="black" data-image="<?php echo base_url(); ?>assets/assetlogin/img/background2.jpg">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="content" style="padding-top: 5vh;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3 text-center">
                            <div style="margin-bottom: 12vh;">
                                <img class="img" src="<?php echo base_url(); ?>assets/assetlogin/img/applogo.png">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                            <div class="card card-profile">
                                <div class="card-avatar">
                                    <img class="img" src="<?php echo base_url(); ?>assets/assetlogin/img/userlogo.jpg">
                                </div>
                                <div class="card-content">
                                    <form class="form-horizontal needs-validation" action="<?php echo base_url('login'); ?>" method="post">
                                        <?=showFlashMessage();?>
                                        <?php
                                            if(isset($_SESSION['error']))
                                            {
                                            showFlashMessage();
                                            unset($_SESSION['error']);
                                            }
                                      ?>
                                      <h3>Login Admin</h3>
                                        <div class="form-group">
                                            <div class="input-group has-feedback <?=setValidationStyle('username') ?>">
                                              <div class="input-group-addon" style="border: 0px;padding: 2px 9px 0px 12px;border-radius: 30px 0px 0px 30px;background-color: #1b7fa1;color: #ffffff;"><i class="fa  fa-user"></i></div>
                                              
                                              <input type="text" class=" form-control" name="username" value="<?php echo $input->username ?>" placeholder="Username" style="border-radius: 0px 30px 30px 0px;" autofocus = 'autofocus' >
                                              <?= setValidationIcon('username') ?>
                                            </div>
                                        </div>

                                              <?= form_error('username') ?>
                                        <div class="form-group">
                                            <div class="input-group has-feedback <?=setValidationStyle('password') ?>">
                                              <div class="input-group-addon" style="border: 0px;padding: 2px 10px 0px 12px;border-radius: 30px 0px 0px 30px;background-color: #1b7fa1;color: #ffffff;"><i class="fa  fa-lock"></i></div>
                                              <?= form_password('password', $input->password, ['class' => "form-control ",'style'=>'border-radius: 0px 30px 30px 0px;', 'placeholder' => 'Password', 'autofocus' => 'autofocus']) ?>
                                              
                                            <?= setValidationIcon('password') ?>
                                            </div>
                                        </div>

                                            <?= form_error('password') ?>
                                      <button type="submit" class="btn" style="border-radius: 30px; background-color: #1b7fa1; width: 50%;">Login</button>
                                    </form>
                                    <p><a href="<?php echo base_url('register');?>" style="color:#1b7fa1"><strong>Registrasi</strong></a> atau <a href="#" class="text-danger"><strong>Lupa Password?</strong></a></p>
                                </div>

                            </div>
                        </div>
                        </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container">
                    <!-- <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3 text-center">
                        <img class="img" src="assets/img/alwusthodesignby.png">
                    </div> -->
                    <p class="copyright text-center">
                        Designed by <strong><span style="color: #f7763c;">AL WUSTHO</span> TECHNOLOGIES</strong> 
                    </p>
                </div>
            </footer>
        </div>
    </div>
</body>
</body>
<!--   Core JS Files   -->
<script src="<?php echo base_url(); ?>assets/assetlogin/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/assetlogin/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/assetlogin/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/assetlogin/js/material.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/assetlogin/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Material Dashboard javascript methods -->
<!-- <script src="<?php echo base_url(); ?>assets/assetlogin/js/material-dashboard.js"></script> -->
<script type="text/javascript">
    $().ready(function() {
        $page = $('.full-page');
        image_src = $page.data('image');

        if(image_src !== undefined){
            image_container = '<div class="full-page-background" style="background-image: url(' + image_src + ') "/>'
            $page.append(image_container);
        }
    });
</script>
<script>

</script>


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/pages/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:32:19 GMT -->
</html>

