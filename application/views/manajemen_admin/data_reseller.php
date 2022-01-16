  <div class="content-wrapper">
     <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Management Reseller</h1>
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
      <div class="card">
        <div class="card-header" style="background:  #20B2AA; height: 10px;">
            <h3 class="card-title" style=""></h3>
        </div>
        <div class="card-body" >
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr style="text-align: center;">
                  <th>No</th>
                  <th>Nama Lengkap</th>
                  <th>Alamat</th>
                  <th>Kota</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <?php
                  $no=1;
                  foreach($data_reseller as $dr ) : ?>

                <?php if($dr->status_reseller == 1) { ?>
                <tr style="font-size: 13px;">
                  <td style="text-align: center;"><?= $no++; ?></td>
                  <td><?= $dr->nama_reseller; ?></td>
                  <td><?= $dr->alamat; ?></td>
                  <td style="text-align: center;"> <?= $dr->kota; ?></td>
                  <td align="center">
                    <a href="<?php echo site_url('manajemen_admin/detail_reseller'); ?>/<?= $dr->id_reseller?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Detail</a>
                    <a href="<?php echo site_url('manajemen_admin/hapus_reseller'); ?>/<?= $dr->id_reseller?>" class="btn btn-danger btn-xs tombol-hapus"><i class="fa fa-trash"></i> Delete</a>
                  </td>
                </tr>
              <?php } ?>
                <?php endforeach; ?>
              </table>
            </div>
          </div>  
      </section>
    </div>