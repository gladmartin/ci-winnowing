<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php $this->layout->get_title(); ?> | <?php $this->starter_ci->app_name() ?> </title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/'); ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/'); ?>bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/'); ?>bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/'); ?>dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/') ?>dist/css/skins/_all-skins.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    
  <?php $this->layout->get_css(); ?>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-green layout-top-nav ">


<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">
      <?php include "include/_main_header.php"; ?>
  </header>
  
  <div class="content-wrapper">
    <div class="container">
      <?php echo $contents; ?>
    </div>
  </div>

  <footer class="main-footer">
    <div class="container">
    <?php include "include/_main_footer.php"; ?>
    </div>
  </footer>
</div>


<script src="<?php echo base_url('assets/admin/'); ?>bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>dist/js/adminlte.min.js"></script>
<?php $this->layout->get_js(); ?>
</body>
</html>