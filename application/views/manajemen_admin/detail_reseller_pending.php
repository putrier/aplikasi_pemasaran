  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Reseller</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
      <div class="row">
      <div class="col-md-3">
        <div class="card">
          <div class="card-header" style="background:  #20B2AA; height: 10px;">
            <h3 class="card-title" style=""></h3>
          </div>
          <div class="card-body">
             <img class="profile-user-img img-responsive img-circle img-center mx-auto d-block" src="<?= base_url() ?>upload/foto_reseller/<?= $reseller['foto_reseller'] ?>" alt="User profile picture">
              <h3 class="profile-username text-center"><?= $reseller['nama_reseller']?></h3>
              <h3 class="profile-username text-center">(<?= $reseller['username']?>)</h3>
              <p class="text-muted text-center"><?= $reseller['level']; ?></p>
          </div>
        </div>
      </div>
      <div class="col-sm-9">
        <div class="card">
          <div class="card-header" style="background:  #20B2AA; height: 10px;">
            <h3 class="card-title" style=""></h3>
          </div>
          <div class="card-body">
            <h4 class="box-title">Profile Reseller (ID Reseller <?= $reseller['id_reseller']; ?>)</h4>
            <table class="table">
              <tr>
                <td>Nama Lengkap</td>
                <td>: <?= $reseller['nama_reseller']; ?></td>
              </tr>
              <tr>
                <td>Nomer KTP</td>
                <td>: <?= $reseller['no_ktp']; ?></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>: <?= $reseller['alamat']; ?></td>
              </tr>
              <tr>
                <td>Kota</td>
                <td>: <?= $reseller['kota']; ?></td>
              </tr>
              <tr>
                <td>Nomer Telephone</td>
                <td>: <?= $reseller['telp_reseller']; ?></td>
              </tr>
              <tr>
                <td>Akun Dibuat Pada</td>
                 <?php
                     date_default_timezone_set('Asia/Jakarta');
                 ?>
                <td>: <?= date('d F Y', $reseller['tgl_buat']); ?></td>
              </tr>                 
            </table>    
          </div> 
        </div>
        <div class="box-footer">
            <div class="pull-left mb-3">
                <a href="<?php echo site_url('dashboard_admin/pending_reseller'); ?>" type="submit" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i> Kembali</a>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>