<?php
$dashboard = "";
$manajemen_reseller = "";
$manajemen_product = "";
$manajemen_point = "";
$manajemen_reward = "";
$profile_admin = "";
$invoice = "";
$laporan_penjualan = "";




$uri_segment1 = $this->uri->segment(2);

  if($uri_segment1 == "" || $uri_segment1 == "detail_invoice_pending" || $uri_segment1 == "pending_orders" || $uri_segment1 == "completed_orders" || $uri_segment1 == "detail_invoice_completed" || $uri_segment1 == "pending_reseller" || $uri_segment1 == "detail_reseller_pending") {
    $dashboard = "active";
  } else if ($uri_segment1 == "data_reseller" || $uri_segment1 == "detail_reseller") {
    $manajemen_reseller = "active";
  } else if ($uri_segment1 == "data_product" || $uri_segment1 == "tambah_product" || $uri_segment1 == "detail_product" || $uri_segment1 == "edit_product") {
    $manajemen_product = "active";
  } else if ($uri_segment1 == "manajemen_point" || $uri_segment1 == "add_point" ) {
    $manajemen_point = "active";
  } else if ($uri_segment1 == "profile" || $uri_segment1 == "edit_profile" || $uri_segment1 == "change_password") {
    $profile_admin = "active";
  } else if ($uri_segment1 == "manajemen_reward") {
    $manajemen_reward = "active";
  } else if ($uri_segment1 == "tampil_invoice" || $uri_segment1 == "detail_invoice" || $uri_segment1 == "b_invoice") {
    $invoice = "active";
  } else if ($uri_segment1 == "laporan_penjualan") {
    $laporan_penjualan = "active";
  }


?>




  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link text-center text-light">
      <img src="<?= base_url() ?>assets/admin/logo1.png" alt="AdminLTE Logo"
           style="text-align: center; margin-left: 3px; margin-top: 10px; width: 130px;">
         </br>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-2 d-flex">
        <div class="image">
          <img src="<?php if ($this->session->userdata('level_id') == 1) {
                                        echo base_url('assets/admin/dist/img/profile/' . $adm['foto_admin']);
                                    } ?>" class="img-circle" alt="User Image" style="height: 60px; width: 60px;">
        </div>
        <div class="info">
          <a class="d-block" style="color: white; margin-top: 15px;">
            <strong>
            <?php if ($this->session->userdata('level_id') == 1) {
                                echo $adm['nama_admin'];
            } ?>
            </strong>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
             <span class="brand-text active" style="color: white; font-size: 12px;">MAIN MENU</span>
         <li class="nav-item has-treeview menu-open">
              <li class="nav-item">
                <a href="<?= base_url('dashboard_admin') ?>" class="nav-link <?= $dashboard; ?>">
                 <i class="fa-fw nav-icon fas fa-tachometer-alt"></i>
                 <p class="brand-text">Dashboard</p>
                </a>
              </li> 
          </li>


           <li class="nav-item has-treeview menu-open">
              <li class="nav-item">
                <a href="<?= base_url('manajemen_admin/data_reseller') ?>" class="nav-link <?= $manajemen_reseller; ?>">
                  <i class="fa-fw nav-icon fas fa-user"></i>
                 
                 <p class="brand-text">Management Reseller</p>
                </a>
              </li> 
          </li>

          <li class="nav-item has-treeview menu-open">
              <li class="nav-item">
                <a href="<?= base_url('produk/data_product') ?>" class="nav-link <?= $manajemen_product; ?>">
                  <i class="fa-fw nav-icon fas fa-book"></i>
                 
                 <p class="brand-text">Management Product</p>
                </a>
              </li> 
          </li>

          <li class="nav-item has-treeview menu-open">
              <li class="nav-item">
                <a href="<?= base_url('point/manajemen_point') ?>" class="nav-link <?= $manajemen_point ?>">
                 <i class="fa-fw nav-icon fas fa-coins"></i>
                 <p class="brand-text">Management Point</p>
                </a>
              </li> 
          </li>

          <li class="nav-item has-treeview menu-open">
              <li class="nav-item">
                <a href="<?= base_url('manajemen_admin/manajemen_reward') ?>" class="nav-link <?= $manajemen_reward ?>">
                <i class="fa-fw nav-icon fas fa-users"></i>
                 <p class="brand-text">Management Reward</p>
                </a>
              </li> 
          </li>

          <li class="nav-item has-treeview menu-open">
              <li class="nav-item">
                <a href="<?= base_url('manajemen_invoice/tampil_invoice') ?>" class="nav-link <?= $invoice; ?>">
                 <i class="fa-fw nav-icon fas fa-file-alt"></i>
                 <p class="brand-text">Management Invoice</p>
                </a>
              </li> 
          </li>
          
          <li class="nav-item has-treeview menu-open">
              <li class="nav-item">
                <a href="<?= base_url('laporan/laporan_penjualan')?>" class="nav-link <?= $laporan_penjualan ?>">
                 <i class="fa-fw nav-icon fas fa-file"></i>
                 <p class="brand-text">Management Sales Report</p>
                </a>
              </li> 
          </li>
 <div class="user-panel pb-3 mb-2 d-flex"></div>
 <span class="brand-text active" style="color: white; font-size: 12px;">UTILITIES</span>
 
      <li class="nav-item has-treeview menu-open">
              <li class="nav-item">
                <a href="<?= base_url('profile_admin/profile') ?>" class="nav-link <?= $profile_admin; ?>">
                 <i class="fa-fw nav-icon fas fa-user-circle"></i>
                 <p class="brand-text">Profile</p>
                </a>
              </li> 
          </li>

       <li class="nav-item has-treeview menu-open">
              <li class="nav-item">
                <a href="<?php if ($this->session->userdata('level_id') == 1) {
                                                echo site_url('auth/logout_admin');
                                            } else {
                                                echo site_url('auth');
                                            } ?>" class="nav-link tombol-logout">
                   <i class="fa-fw fas nav-icon fa-sign-out-alt"></i><p class="brand-text">Logout</p>
                </a>
              </li> 
        </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>