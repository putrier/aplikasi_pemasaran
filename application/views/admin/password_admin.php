  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Change Password</h1>  
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
      <div class="col-sm-8" style="left: 150px;">
      <div class="card">
          <div class="card-header" style="background:  #20B2AA; height: 10px;">
            <h3 class="card-title" style=""></h3>
          </div>
          <div class="ml-3" style="color: red;">
            <?php echo $this->session->flashdata('message'); ?>
          </div>
        <div class="card-body">
            <table class="table">
              <form method="post" enctype="multipart/form-data" action="<?= site_url('profile_admin/change_password/' . $admin['id_admin']); ?>" class="form-horizontal">
                  <input type="hidden" name="id" value="<?= $admin['id_admin'] ?>">
              <div class="form-group form-inline">
                      <label for="nama_product" class="col-sm-3">Password Lama</label>
                      <input type="password" id="pw_lama" name="pw_lama" placeholder="Masukkan Password Lama" class="form-control col-sm-9" value="<?= set_value('pw_lama'); ?>">
                      <?php echo form_error('pw_lama', '<small class="text-danger pl-3">', '</small>') ?>
              </div>
              <div class="form-group form-inline">
                      <label for="nama_product" class="col-sm-3">Password Baru</label>
                      <input type="password" id="pw_baru" name="pw_baru" placeholder="Masukkan Password Baru" class="form-control col-sm-9" value="<?= set_value('pw_baru'); ?>">
                      <?php echo form_error('pw_baru', '<small class="text-danger pl-3">', '</small>') ?>
              </div>
              <div class="form-group form-inline">
                      <label for="nama_product" class="col-sm-3">Ulangi Password</label>
                      <input type="password" id="pw_baru2" name="pw_baru2" placeholder="Ulangi Password Baru" class="form-control col-sm-9" value="<?= set_value('pw_baru2'); ?>">
                      <?php echo form_error('pw_baru2', '<small class="text-danger pl-3">', '</small>') ?>
              </div>
        </div>
              <div class="modal-footer">
                      <a href="<?php echo site_url('profile_admin/profile'); ?>"><button type="button" class="btn btn-danger" data-dismiss="modal">Back</button></a>
                      <button type="submit" class="btn btn-primary" ><i class="fa fa-save"></i> Save</button>
              </div>
        </form>                       
      </table>
    </div>
    </div>
  </section>
  </div>