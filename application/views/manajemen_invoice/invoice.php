  <div class="content-wrapper">
     <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Management Invoice</h1>
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
            <div class="card-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr style="text-align: center;">
                  <th>No</th>
                  <th>Nomer Invoice</th>
                  <th>Tanggal Pesanan</th>
                  <th>Nama Lengkap</th>
                  <th>Metode Pembayaran</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php

                  $no = 1;
                  foreach($invoice as $iv) :

                  ?>

                  <?php if($iv->status_verifikasi == 1 || $iv->status_verifikasi == 2) { ?>
                <tr style="text-align: center;">
                    <td><?= $no++; ?></td>
                    <td><?= $iv->no_invoice ?></td>
                    <td><?= $iv->tgl_pesanan ?></td>
                    <td><?= $iv->nama_reseller ?></td>
                    <td><?= $iv->metode_pembayaran ?></td>
                    <td>
                      <a href="<?= site_url('bukti_invoice/print_invoice') ?>/<?= $iv->no_invoice ?>"  class="btn btn-primary btn-xs" target="_blank" name="<?= $iv->no_invoice?>" type="button" ><i class="fa fa-print"></i> Print</a>
                    
                      <?php if ($iv->status_verifikasi ==  1) { ?>
                        <a class="badge badge-warning">Verified</a>
                         
                      <?php } ?>

                       <?php if ($iv->status_pesanan ==  1) { ?>
                        <a class="badge badge-warning">Completed</a>
                      <?php } else { ?>
                        <a href="<?php echo site_url('manajemen_invoice/update_status_orders/' . $iv->no_invoice); ?>" class="badge badge-info">Uncompleted</a>
                      <?php } ?>

                     
                      <a href="<?= site_url('manajemen_invoice/detail_invoice') ?>/<?= $iv->no_invoice ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Detail</a>
                      <?php if ($iv->foto_bukti == "cash") { ?>
                      <?php } else { ?>
                        <a href="<?= base_url('upload/transfer/' . $iv->foto_bukti); ?>" class="btn btn-info btn-xs" target="blank" title="Bukti Transfer"><i class="fa fa-download"></i></a>
                      <?php }?>

                       <?php if($iv->metode_pembayaran == "Cash") { ?>
                        <a href="<?= site_url('dashboard_admin/delete_invoice2') ?>/<?= $iv->no_invoice ?>" class="btn btn-danger btn-xs tombol-hapus"><i class="fa fa-trash"></i></a>
                      <?php } ?>

                    </td>
                  </tr>
                <?php } ?>
               <?php endforeach; ?>
                </tbody>
              </table>
              </div>
            </div>
          </div>  
      </section>
    </div>