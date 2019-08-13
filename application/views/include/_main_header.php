<nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo site_url(); ?>" class="navbar-brand"><?php $this->starter_ci->app_name() ?></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo site_url('tes-kemiripan') ?>">Tes Kemiripan <span class="sr-only">(current)</span></a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">User <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo site_url('user') ?>">Data user</a></li>
                <li><a href="<?php echo site_url('user/tambah') ?>">Tambah user</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <!-- <img src="<?php echo base_url('assets/admin') ?>/dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?php echo $this->otentikasi->userdata()->full_name; ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="text-center">
                    <a href="<?php echo site_url('auth/logout')?>" class="btn btn-default btn-flat">Keluar dari aplikasi</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>