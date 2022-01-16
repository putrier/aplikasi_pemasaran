<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Top Reseller</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-4">
            <div class="card">
              <div class="card-header" style="background:  #20B2AA; height: 10px;">
                <h3 class="card-title" style=""></h3>
              </div>
                <div class="card-body">
                   <img class="profile-user-img img-responsive img-circle img-center mx-auto d-block" src="<?= base_url() ?>upload/foto_reseller/<?= $point['foto_reseller'] ?>" alt="User profile picture" style="height: 110px;">
                    <h3 class="profile-username text-center mb-4">ID Reseller : <?= $point['id_reseller']; ?></h3>
                    <?php
                     date_default_timezone_set('Asia/Jakarta');
                      $thn = date('Y');
                      $bln = date('m');
                      $bulan = date('m-Y');

                      if ($bln == date('m')) {
                        $month = date('F');
                        $month2 = date('F, Y');
                      }
                    ?>
                    <h3 class="profile-username text-center ">Periode (<?= $month?>, <?= $thn ?>)</h3>
                    <h3 class="profile-username text-center">Point Reseller : <?php if ($point['bulanan'] == "") { 0 ?>
                    <?php } else { ?> 
                    <?= $point['bulanan'] ?></h3>
                    <?php } ?>
                    <p class="text-muted text-center"></p>
                </div>
              </div>
            </div>
          <div class="col-sm-8">
            <div class="card">
              <div class="card-header" style="background:  #20B2AA; height: 10px;">
                <h3 class="card-title" style=""></h3>
              </div>
              <div class="card-body">
                <h4 class="box-title"></h4>
               <table class="table">
                   <form method="post" enctype="multipart/form-data" action="<?= site_url('point/proses_add_point/' . $point['id_reseller']) ?>" class="form-horizontal">
                          <input type="hidden" id="id_reseller" name="id_reseller" class="form-control col-sm-9" value="<?= $point['id_reseller']; ?>" readonly> 
                    <div class="form-group form-inline">
                          <label for="nama_reseller" class="col-sm-3">Nama Reseller</label>
                          <input type="text" id="nama_reseller" name="nama_reseller" class="form-control col-sm-9" value="<?= $point['nama_reseller']; ?>" readonly>
                    </div>
                          <input type="hidden" id="periode" name="periode" class="form-control col-sm-9" value="<?= $month2?>" readonly>
                          <input type="hidden" id="top_point" name="top_point" class="form-control col-sm-9" value="   <?= $point['bulanan'] ?>" readonly>
                    <div class="form-group form-inline">
                          <label class="col-sm-3">Alamat</label>
                          <input type="text" name="alamat" class="form-control col-sm-9" value="<?= $point['alamat'] ?>" readonly>   
                    </div>
                    <div class="form-group form-inline">
                          <label class="col-sm-3">Kota</label>
                          <input type="text" name="kota" class="form-control col-sm-9" value="<?= $point['kota'] ?>" readonly>   
                    </div>
                    <div class="form-group form-inline">
                          <label class="col-sm-3">Reward</label>
                          <select name="reward" class="form-control col-sm-9">
                            <option value="">-- Select Reward --</option>
                            <option value="Top Reseller 1">Top Reseller 1</option>
                            <option value="Top Reseller 2">Top Reseller 2</option>
                            <option value="Top Reseller 3">Top Reseller 3</option>
                          </select>
                       <?php echo form_error('kategori_id', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group form-inline">
                          <label class="col-sm-3">Keterangan</label>
                          <input type="text" name="keterangan" class="form-control col-sm-9" value="">   
                    </div>    
              </div>
                    <div class="modal-footer">
                          <a href="<?php echo site_url('point/manajemen_point'); ?>"><button type="button" class="btn btn-danger" data-dismiss="modal">Back</button></a>
                          <button type="submit" class="btn btn-primary" ><i class="fa fa-save"></i> Save</button>
                    </div>
              </form>                       
            </table>   
            </div> 
          </div>
        </div>
      </div>
    </div>
</section>
</div>