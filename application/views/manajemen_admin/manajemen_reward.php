  <div class="content-wrapper">
     <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Management Reward</h1>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
       <!-- Sweet Alert -->
        <?php if ($this->session->flashdata('message')) : ?>
            <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('message'); ?>"></div>
        <?php endif; ?>
      <div class="container-fluid">
        <!-- Default box -->
      <div class="card">
            <div class="card-header" style="background:  #20B2AA; height: 10px;">
              <h3 class="card-title" style=""></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr style="text-align: center;">
                  <th>No</th>
                  <th>Nama Lengkap</th>
                  <th>Kota</th>
                  <th>Reward</th>
                  <th>Keterangan</th>
                  <th>Periode</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                
                <?php 

                $no=1;
                foreach($data_reward as $dr) :
                ?>                

                 <tr style="font-size: 13px;">
                  <td style="text-align: center;"><?= $no++ ?></td>
                  <td style="text-align: center;"><?= $dr->nama_reseller ?></td>
                  <td style="text-align: center;"><?= $dr->kota ?></td>
                  <td style="text-align: center;"><?= $dr->reward ?></td>
                  <td style="text-align: center;"><?= $dr->keterangan ?></td>
                   <td style="text-align: center;"><?= $dr->periode ?></td>
                  <td align="center">
                     <h6>
                      <?php if($dr->status == 0) { ?>
                        <a href="<?php echo site_url('manajemen_admin/update_aktif/' . $dr->id_reseller); ?>" class="badge badge-primary tombol-aktif">Inactive</a>
                      <?php } else { ?>
                       <a class="badge badge-warning" title="Telah Aktif">Active</a>
                      <?php } ?>

                      <?php if($dr->status == 2) { ?>
                        <a class="badge badge-warning" title="Telah NonAktif">Deactive</a>
                      <?php } else if($dr->status == 1) { ?>
                       <a href="<?php echo site_url('manajemen_admin/update_deactive/' . $dr->id_reseller); ?>" class="badge badge-info tombol-deactive">Deactive</a>
                      <?php } ?>

                       <?php if($dr->status_pengambilan == 0) { ?>
                        <a href="<?php echo site_url('manajemen_admin/update_pengambilan/' . $dr->id_reseller); ?>" class="badge badge-info" title="Belum Diambil">Not Yet Taken</a>
                      <?php } else { ?>
                       <a class="badge badge-warning" title="Telah Diambil">Taken</a>
                      <?php } ?>
                     
                    </h6>
                  </td>
                </tr>
              <?php endforeach; ?>
              </tbody>
              </table>
              </div>
            </div>
          </div>  
      </section>
  </div>

