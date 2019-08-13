<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    <?php $this->layout->get_title(); ?>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-users"></i> User</a></li>
    <li class="active">index</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <?php echo alert_flash_data($this->session->flashdata('message')); ?>
            <div class="box">
                <div class="box-header">            
                    <h3 class="box-title">List user</h3>
                    <div class="pull-right box-tools">
                        <a class="btn btn-sm btn-success" href="<?php echo site_url('user/tambah') ?>">Tambah user baru</a>
                    </div>
                </div>
                <div class="box-body table-responsive">
                    <table id="data-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Hak akses</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach($users as $user) :?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $user->full_name ?></td>
                                <td><?php echo $user->email ?></td>
                                <td>
                                <?php foreach ($user->groups as $group):?>
                                    <span class="badge"><?php echo $group->name ?></span>
                                <?php endforeach?>
                                </td>
                                <td>
                                    <?php echo $user->active ? anchor("user/nonaktifkan/".$user->id, "Aktif") : anchor("user/aktifkan/".$user->id, "Nonaktif") ?>
                                </td>
                                <td>
                                    <a href="<?php echo site_url('user/hapus/') . $user->id ?>" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
