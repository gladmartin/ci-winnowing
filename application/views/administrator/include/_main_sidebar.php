<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">

<!-- Sidebar user panel (optional) -->
<div class="user-panel">
  <div class="pull-left image">
    <img src="<?php echo base_url('assets/admin/') ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
  </div>
  <div class="pull-left info">
    <p><?php echo $this->otentikasi->userdata()->full_name ?></p>
    <!-- Status -->
    <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $this->otentikasi->userdata()->email ?></a>
  </div>
</div>

<!-- search form (Optional) -->
<form action="#" method="get" class="sidebar-form">
  <div class="input-group">
    <input type="text" name="q" class="form-control" placeholder="Search...">
    <span class="input-group-btn">
        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
        </button>
      </span>
  </div>
</form>
<!-- /.search form -->

<!-- Sidebar Menu -->
<ul class="sidebar-menu" data-widget="tree">
  <li class="header">HEADER</li>
    <?php $main_menu = $this->db->get_where('menus', array('parent_id' => NULL)); ?>
    <?php foreach ($main_menu->result() as $main) : ?>
        <?php $sub_menu = $this->db->get_where('menus', array('parent_id' => $main->id)); ?>
        <?php if ($sub_menu->num_rows() > 0) : ?>
            <li class='treeview'>
                <a href="<?php echo site_url('administrator/') . $main->url ?>">
                    <i class="<?php echo $main->icon; ?>"></i>
                    <span><?php echo $main->name ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class='treeview-menu'>
                <?php foreach ($sub_menu->result() as $sub) : ?>                    
                    <?php $sub_menu2 = $this->db->get_where('menus', array('parent_id' => $sub->id)); ?>
                    <?php if ($sub_menu2->num_rows() > 0) : ?>
                        <li class='treeview'>
                            <a href="<?php echo site_url('administrator/') . $sub->url ?>">
                                <i class="<?php echo $sub->icon; ?>"></i>
                                <span><?php echo $sub->name ?></span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class='treeview-menu'>
                            <?php foreach ($sub_menu2->result() as $sub2) : ?>
                                <li>
                                    <a href="<?php echo site_url('administrator/') . $sub2->url ?>">
                                        <i class="<?php echo $sub2->icon ?>"></i>
                                        <?php echo $sub2->name ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php else : ?>
                        <li>
                            <a href="<?php echo site_url('administrator/') . $sub->url ?>">
                                <i class="<?php echo $sub->icon ?>"></i>
                                <?php echo $sub->name ?>
                            </a>
                        </li>          
                    <?php endif; ?>
                <?php endforeach; ?>
                </ul>
            </li>
        <?php else : ?>
            <li>
                <a href="<?php echo site_url('administrator/') . $main->url; ?>">
                    <i class="<?php echo $main->icon; ?>"></i> 
                    <span><?php echo $main->name; ?></span>
                </a>
            </li>            
        <?php endif; ?>
    <?php endforeach; ?>
</ul>
<!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->