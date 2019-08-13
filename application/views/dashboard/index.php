<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    <?php $this->layout->get_title(); ?>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Index</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <h3>Selamat datang di aplikasi ini.</h3>
    <p>Untuk mengubah caption ini, silahkan buka di <span class="badge">application/views/dashboard/index.php</span></p>
<div class="row">
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
        <div class="inner">
            <h3><?php echo $this->db->get('users')->num_rows() ?></h3>

            <p>User Registrations</p>
        </div>
        <div class="icon">
            <i class="ion ion-person-add"></i>
        </div>
        <a href="<?php echo site_url('user') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</section>
<!-- /.content -->
