
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Profile Admin</h1>  
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
                <form method="post" enctype="multipart/form-data" action="<?= site_url('profile_admin/update_admin/' . $admin['id_admin']) ?>" class="form-horizontal">
                      <input type="hidden" name="id" value="<?php echo $admin['id_admin']; ?>">
                  <div class="form-group form-inline">
                      <label for="nama_admin" class="col-sm-3">Nama Admin</label>
                      <input type="text" id="nama_admin" name="nama_admin" class="form-control col-sm-9" value="<?= $admin['nama_admin'] ?>">
                  </div>
                  <div class="form-group form-inline">
                    <label class="col-sm-3">Foto Admin</label><br>
                    <input type="file" id="foto_admin" value="<?= $admin['foto_admin'] ?>" name="foto_admin" class="form-control col-sm-9" style="height: 45px;"> 
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