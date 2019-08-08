<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title; ?></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php $this->layout->get_title()?> | <?php $this->starter_ci->app_name(); ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/') ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/') ?>bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/') ?>bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/') ?>dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="shortcut icon" href="<?php $this->starter_ci->icon() ?>" type="image/x-icon">
  <?php $this->layout->get_css(); ?>  
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/') ?>plugins/iCheck/square/green.css">
  
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Login </b><?php $this->starter_ci->app_name() ?></a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Silahkan login untuk memulai sesi anda</p>
            <?php echo $message;?>
            <?php echo form_open();?>
                <div class="form-group has-feedback <?php echo has_error_form('identity'); ?>">
                    <?php echo form_input($identity);?>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <span class="help-block"><?php echo form_error('identity') ?></span>
                </div>
                <div class="form-group has-feedback <?php echo has_error_form('password'); ?>">
                    <?php echo form_input($password);?>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>                    
                    <span class="help-block"><?php echo form_error('password') ?></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                        <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
                        Ingat saya
                        </label>
                    </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                    <button type="submit" class="btn btn-success btn-block btn-flat">Masuk</button>
                    </div>
                    <!-- /.col -->
                </div>
            <?php echo form_close();?>

            <a href="#">I forgot my password</a><br>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

<script src="<?php echo base_url('assets/admin/'); ?>bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-green',
      radioClass: 'iradio_square-green',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
