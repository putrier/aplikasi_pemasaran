 <section id="profile" class="about-sec section-wrapper description" style="">
        <div class="container">
            <div class="row">
                <!-- Section Header -->
                <div class="col-md-12 col-sm-12 col-xs-12 section-header wow fadeInDown mt-5">
                    <h2><span class="highlight-text">PROFILE</span></h2>
                </div>
           <!-- Sweet Alert -->
           
        <?php if ($this->session->flashdata('message')) : ?>
            <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('message'); ?>"></div>
        <?php endif; ?>
                <!-- Section Header End -->

                <div class="col-md-4 col-sm-6 col-xs-12 custom-sec-img wow fadeInDown">
                    <div class="card" style="box-shadow: 5px 0px 15px 5px #cccccc;">
                      <div class="card-header" style="background: #FF650B; height: 10px;">
                        <h3 class="card-title" style=""></h3>
                      </div>


                      <div class="card-body" style="text-align: center;" >
                        <div style="text-align: right;" class="mr-2"> 
                             <a href="<?php echo site_url('profile_reseller/edit_profile'); ?>" type="submit" class="modal-fade" data-toggle="modal" data-target="#exampleModal"><i class="far fa-edit" style="font-size: 20px;"></i></a>
                        </div>
                         <img class="profile-user-img img-responsive img-circle img-center mx-auto d-block mt-3 mb-3" src="<?= base_url() ?>upload/foto_reseller/<?= $reseller['foto_reseller'] ?>" alt="User profile picture" style="width: 150px; height: 150px;">
                         <h3 class="mb-4"><?= $reseller['level']; ?> (ID : <?= $reseller['id_reseller'] ?>)</h3>
                         <div class="alert ml-4 mr-4" role="alert" style="background: #FF650B; color: white; ">
                          Total Point (Bulanan) : 
                        <?php if ($point['bulanan'] == "") {?>
                          0
                        <?php } else { ?>
                          <?= $point['bulanan'] ?>
                        <?php } ?>
                         </div>
                             
                      </div>
                    </div>
                </div>

                <div class="col-md-8 col-sm-12 col-xs-12 customized-text wow fadeInDown black-ed">
                
                     <div class="card" style="box-shadow: 5px 0px 15px 5px #cccccc;">
                      <div class="card-header" style="background: #FF650B; height: 10px;">
                        <h3 class="card-title" style=""></h3>
                      </div>
                      <div class="card-body">
                        <h4 class="box-title" style="text-align: center; font-size: 20px;"><strong>Profile Reseller</strong></h4>
                        <table class="table" style="color: black">
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

                      <div class="box-footer mb-3 ml-2">
                          <div class="pull-left">
                              <a href="<?php echo site_url('profile_reseller/edit_profile'); ?>" type="submit" class="btn btn-sm modal-fade" data-toggle="modal" data-target="#passwordModal" style="background: #FF650B; color: white;"><i class="fas fa-sync"></i> Change Password</a>
                   
                          </div>
                      </div>
                </div>
       
    </section>

<!-- Modal Edit Profile -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content mb-5">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-size: 20px; text-align: center;"><strong>Edit Profile</strong></h5>
        
      </div>
      <div class="modal-body mb-3">
         <form method="post" enctype="multipart/form-data" action="<?= site_url('profile_reseller/update_reseller/' . $reseller['id_reseller']); ?>">
          <input type="hidden" name="id" value="<?= $reseller['id_reseller']; ?>">
            <div class="form-group">
              <label for="nama_reseller" class="col-sm-3">Nama Reseller</label>
              <input type="text" id="nama_reseller" name="nama_reseller" class="form-control col-sm-9 mb-2" value="<?= $reseller['nama_reseller'] ?>" style="height: 20px;" readonly>
            </div>
             <div class="form-group">
              <label for="nama_reseller" class="col-sm-3">Nomer KTP</label>
              <input type="text" id="no_ktp" name="no_ktp" class="form-control col-sm-9 mb-2" value="<?= $reseller['no_ktp'] ?>" style="height: 20px;">
            </div>
            <div class="form-group">
              <label for="telp_reseller" class="col-sm-3">No.Telephone</label>
              <input type="text" id="telp_reseller" name="telp_reseller" class="form-control col-sm-9 mb-2" value="<?= $reseller['telp_reseller'] ?>" style="height: 20px;">
            </div>
            <div class="form-group">
              <label for="alamat" class="col-sm-3">Alamat</label>
              <input type="text" id="alamat" name="alamat" class="form-control col-sm-9 mb-2" value="<?= $reseller['alamat'] ?>" style="height: 20px;">
            </div>
            <div class="form-group">
              <label for="kota" class="col-sm-3">Kota</label>
              <input type="text" id="kota" name="kota" class="form-control col-sm-9 mb-2" value="<?= $reseller['kota'] ?>" style="height: 20px;">
            </div>
            <div class="form-group">
              <label for="foto_reseller" class="col-sm-3">Foto Reseller</label>
              <input type="file" id="foto_reseller" value="" name="foto_reseller" class="form-control col-sm-9 mb-2" style="height: 50px;">
            </div>
            <div style="text-align: center;">
              <button type="button" class="btn" data-dismiss="modal" style="background: #A9A9A9;">Close</button>
              <button type="submit" class="btn" style="background:  #00BFFF;">Save changes</button>
         </form>
          </div>
      </div>
    </div>
  
</div>
</div>
<!-- Modal Change Password -->
<div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content mb-5">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-size: 20px; text-align: center;"><strong>Change Password</strong></h5>
      </div>
      <div class="modal-body mb-3">
         <form method="post" enctype="multipart/form-data" action="<?= site_url('profile_reseller/change_password/' . $reseller['id_reseller']); ?>">
          <input type="hidden" name="id" value="<?= $reseller['id_reseller']; ?>">
          <p style="font-size: 15px; color:red;">Password baru, <strong style="color: red;">Tidak boleh sama dengan password lama!</strong></p>

          <button id="show-password" type="button" class="btn-sm mb-3">Lihat Password</button>

            <div class="form-group">
              <label for="pw_lama" class="col-sm-3">Old Password</label>
              <input type="password" id="pw_lama" name="pw_lama" class="form-control col-sm-9 mb-2"  style="height: 20px;" value="<?= set_value('pw_lama'); ?>">
              <?php echo form_error('pw_lama', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="pw_baru" class="col-sm-3">New Password</label>
              <input type="password" id="pw_baru" name="pw_baru" class="form-control col-sm-9 mb-2"  style="height: 20px;" value="<?= set_value('pw_baru'); ?>">
              <?php echo form_error('pw_baru', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="pw_baru2" class="col-sm-3">New Password</label>
              <input type="password" id="pw_baru2" name="pw_baru2" class="form-control col-sm-9 mb-2"  style="height: 20px;" value="<?= set_value('pw_baru2'); ?>">
              <?php echo form_error('pw_baru', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
          
            <div style="text-align: center;">
              <button type="button" class="btn" data-dismiss="modal" style="background: #A9A9A9;">Close</button>
              <button type="submit" class="btn" style="background:  #00BFFF;">Save changes</button>
         </form>
          </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>

<script>
  $(document).ready(function() {
    $("#show-password").click(function(){
      if($('#pw_lama').attr('type') == 'password') {
          $('#pw_lama').attr('type','text');
          $('#pw_baru').attr('type','text');
          $('#pw_baru2').attr('type','text');
      } else {
        $('#pw_lama').attr('type','password');
        $('#pw_baru').attr('type','password');
        $('#pw_baru2').attr('type','password');
      }

    });
  });
</script>