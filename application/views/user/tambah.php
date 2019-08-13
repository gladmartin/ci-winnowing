<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php $this->layout->get_title(); ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i> User</a></li>
        <li class="active">tambah</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Form tambah</h3>
                </div>
                <?php echo form_open() ?>
                <div class="box-body">
                    <div class="row">
                        <div class="form-group col-lg-4 <?php echo has_error_form('full_name'); ?>">
                            <label for="full_name">Nama lengkap</label>
                            <input type="text" class="form-control" id="full_name" value="<?php echo  set_value('full_name') ?>" name="full_name">
                            <span class="help-block"><?php echo form_error('full_name') ?></span>
                        </div>
                        <div class="form-group col-lg-4 <?php echo has_error_form('email'); ?>">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" value="<?php echo  set_value('email') ?>" name="email">
                            <span class="help-block"><?php echo form_error('email') ?></span>
                        </div>
                        <div class="form-group col-lg-4 <?php echo has_error_form('username'); ?>">
                            <label for="username">User name</label>
                            <input type="text" class="form-control" id="username" value="<?php echo  set_value('username') ?>" name="username">
                            <span class="help-block"><?php echo form_error('username') ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-4 <?php echo has_error_form('group'); ?>">
                            <label for="group">Hak akses</label>
                            <?php echo form_dropdown('group', $groups, set_value('group'), ['class' => has_error_form('group', false) . " form-control"]) ?>
                            <span class="help-block"><?php echo form_error('group') ?></span>
                        </div>
                        <div class="form-group col-lg-4 <?php echo has_error_form('password'); ?>">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" value="<?php echo  set_value('password') ?>" name="password">
                            <span class="help-block"><?php echo form_error('password') ?></span>
                        </div>
                        <div class="form-group col-lg-4 <?php echo has_error_form('password_confirm'); ?>">
                            <label for="password_confirm">Konfirmas password</label>
                            <input type="password" class="form-control" id="password_confirm" value="<?php echo set_value('password_confirm') ?>" name="password_confirm">
                            <span class="help-block"><?php echo form_error('password_confirm') ?></span>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->