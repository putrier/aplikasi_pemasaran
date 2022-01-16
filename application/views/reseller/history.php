<section id="profile" class="about-sec section-wrapper description" >
        <div class="container">
            <div class="row">
                <!-- Section Header -->
                <div class="col-md-12 col-sm-12 col-xs-12 section-header wow fadeInDown mt-5">
                    <h2><span class="highlight-text">History Order</span></h2>
                </div>
            </div>
        <!-- Sweet Alert -->   
        <?php if ($this->session->flashdata('message')) : ?>
         	<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('message'); ?>"></div>
        <?php endif; ?>
        </div>
         <div class="container-fluid">
          <div style="margin-left: 80px;">
                <p>* Silahkan tunggu maksimal 3 jam, untuk mendapatkan konfirmasi pesanan oleh admin.</p>
                <p>* Jika status keterangan sudah "Verified", silahkan lihat tanggal pengambilan pada tombol detail.</p>
                 <p>(Note : standar pengambilan pesanan, dapat dilakukan 1 hari setelah tanggal pemesanan).</p>
          </div>
        <!-- Default box -->
      <div class="card mr-5 ml-5" style="box-shadow: 5px 0px 15px 5px #cccccc; left: 30px;">
            <div class="card-header" style="background: #FF650B; height: 10px;">
              <h3 class="card-title" style=""></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
             
              <table id="example1" class="table table-responsive table-hover table-striped" style="max-width: 5000px;">
                <thead>
                <tr>
                  <th style="text-align: center">No</th>
                  <th style="text-align: center">Nomer Invoice</th>
                  <th style="text-align: center">Tanggal Pesanan</th>
                  <th style="text-align: center">Nama Lengkap</th>
                  <th style="text-align: center">Metode Pembayaran</th>
                  <th style="text-align: center">Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;

                    foreach($invoice as $iv) :?>
                 <tr style="text-align: center;">
                     <td><?= $no++;?></td>
                     <td><?= $iv->no_invoice ?></td>
                     <td><?= $iv->tgl_pesanan ?></td>
                     <td><?= $iv->nama_reseller ?></td>
                     <td><?= $iv->metode_pembayaran ?></td>
                     <td>
                      <?php if ($iv->status_verifikasi ==  1) { ?>
                        <a class="btn btn-sm mb-2 mr-4" style="font-size: 11px; width: 85px; height: 30px; background: #FF650B; color: white" title="Pesanan Sedang Diproses">Verified</a>
                      <?php } else { ?>
                        <a class="btn btn-sm btn-danger mb-2 mr-4" style="font-size: 11px; width:85px; height: 30px;" title="Tunggu Konfimasi Dari Admin">Not Verified</a>
                      <?php } ?> 
                       <?php if ($iv->status_pesanan ==  1) { ?>
                        <a class="btn btn-sm mb-2 mr-4" style="font-size: 11px; width: 85px; height: 30px; background: #FF650B; color: white" title="Pesanan Selesai">Completed</a>
                      <?php } else { ?>
                         <a class="btn btn-sm btn-danger mb-2 mr-4" style="font-size: 11px; width: 95px; height: 30px;">Uncompleted</a>
                      <?php } ?>

                      <a href="<?= site_url('history_order/detail_history') ?>/<?= $iv->no_invoice ?>" class="btn btn-sm btn-info mb-2 mr-4" style="font-size: 13px; width: 90px; height: 30px;"><i class="fa fa-eye"></i> Detail</a>

                      <?php if ($iv->foto_bukti == "cash") { ?>
                        <a class="btn btn-sm mb-2 mr-4" style="width: 50px; height: 30px; background: #D3D3D3; color: white;" target="blank" title="Tidak Ada File"><i class="fa fa-download" style="color: white;"></i></a>
                      <?php } else { ?>
                        <a href="<?= base_url('upload/transfer/' . $iv->foto_bukti); ?>" class="btn btn-sm mb-2 mr-4" style="width: 50px; height: 30px; background: #FF650B; color: white" target="blank" title="Bukti Transfer"><i class="fa fa-download"></i></a>
                      <?php }?>
                     
                     </td>
                 </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>  
      </section>
  