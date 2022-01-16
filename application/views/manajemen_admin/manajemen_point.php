  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Management Point</h1>
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
                <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr style="text-align: center;">
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Point Reseller</th>            
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php

                  $no = 1;
                  foreach($point as $pt) : ?>

                  <tr style="text-align: center;">
                    <td><?= $no++; ?></td>
                    <td><?= $pt['nama_reseller']; ?></td>
                    <?php if ($pt['bulanan'] == "") { ?>
                        <td>0</td>
                    <?php } else { ?>
                        <td><?= $pt['bulanan']; ?></td>
                    <?php } ?>
                    <td>
                     <a href="<?php echo site_url('point/add_point'); ?>/<?= $pt['id_reseller']?>" class="btn btn-warning btn-xs"><i class="fas fa-plus-circle"></i> Add</a>
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
