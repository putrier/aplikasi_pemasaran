  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <!-- Sweet Alert -->
        <?php if ($this->session->flashdata('message')) : ?>
            <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('message'); ?>"></div>
        <?php endif; ?>
      <div class="container-fluid">
        <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-header" style="background: #20B2AA; height: 10px;">
              <h3 class="card-title" style=""></h3>
            </div>
            <div class="card-body">
               <img class="profile-user-img img-responsive img-circle img-center mx-auto d-block" src="<?= base_url() ?>assets/admin/dist/img/profile/<?= $admin['foto_admin'] ?>" alt="User profile picture">
                <h3 class="profile-username text-center"><?= $admin['nama_admin']?></h3>
                <p class="text-muted text-center"><?= $admin['level']; ?></p>
            </div>
          </div>
        </div>
        <div class="col-sm-9">
          <div class="card">
            <div class="card-header" style="background: #20B2AA; height: 10px;">
              <h3 class="card-title" style=""></h3>
            </div>
            <div class="card-body">
              <h4 class="box-title">Profile Admin</h4>
              <table class="table">
                    <tr>
                      <td>Nama Lengkap</td>
                      <td>: <?= $admin['nama_admin']; ?></td>
                    </tr>
                    <tr>
                      <td>Username</td>
                      <td>: <?= $admin['username']; ?></td>
                    </tr>
                    <tr>
                      <td>Akun Dibuat Pada</td>
                      <td>: <?= date('d F Y', $admin['tgl_buat']); ?></td>
                    </tr>                 
              </table>    
            </div> 
          </div>
          <div class="box-footer">
              <div class="pull-left">
                <a href="<?php echo site_url('profile_admin/edit_profile'); ?>" type="submit" class="btn btn-info btn-sm"><i class="far fa-edit"></i> Edit Profile</a>
                <a href="<?php echo site_url('profile_admin/change_password'); ?>" type="submit" class="btn btn-info btn-sm"><i class="fas fa-sync"></i> Change Password</a>     
              </div>
          </div>
        </div>
      </div>
    </div>
</section>
</div>