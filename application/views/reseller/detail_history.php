<section id="profile" class="about-sec section-wrapper description">
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
        <!-- Default box -->
      <div class="card">
            <div class="card-header" style="background: #FF650B; height: 10px;">
              <h3 class="card-title" style=""></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
             <div class="row mt-2">
        <div class="col-md-12">
          <table class="table table-fixed">
            <thead>
           <tr style="text-align: center;">
             <th style="text-align: center">No</th>
             <th style="text-align: center">Produk</th>
             <th style="text-align: center">Jumlah</th>
             <th style="text-align: center">Point</th>
             <th style="text-align: center">Harga</th>
           </tr>
           </thead>
           <tbody>
            <?php

            $no=1;

            foreach($detail_invoice as $dv) :

             ?>
             <tr style="text-align: center;">
               <td><?= $no++; ?></td>
               <td><?= $dv->nama_produk ?></td>
               <td><?= $dv->jumlah ?></td> 
               <td><?= $dv->point_pesanan ?></td>
               <td>Rp. <?= number_format($dv->harga, 0,',','.') ?></td>               
             </tr>

           <?php endforeach; ?>
  
              <tr style="text-align: center;">
               <td></td>
               <td></td>
               <td><strong>Total Pembayaran</strong></td>
               <td></td>

               <td><strong> Rp. <?= number_format($dv->total_pembayaran, 0,',','.' ) ?></strong></td>
             </tr>
              <tr style="text-align: center;">
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
             </tr>
           </tbody>
           <p class="ml-3"><?= $dv->tgl_pesanan ?></p>
           <div style="letter-spacing: 3px; text-align: center;">
           <p><?= $dv->no_invoice?></br>
           <?= $dv->nama_reseller?></br>
           <?= $dv->alamat ?></br>
           <?= $dv->telp_reseller?></p>

           </div>

           <?php 
            $cenvertedTime = date('Y-m-d',strtotime('+1 day',strtotime($dv->tgl_pesanan)));
           ?>
           <?php if($dv->status_verifikasi == 1) { ?>
              <p class="ml-3"><strong>(Pesanan dapat diambil pada tanggal : <?= $cenvertedTime?>)</strong></p>
           <?php } ?>
         </table>
              <div class="box-footer">
                <div class="pull-left ml-3 mb-3">
                    <a href="<?= site_url('history_order/history'); ?>" type="submit" class="btn btn-info btn-sm"><i class="fa fa-undo"></i> Kembali</a>
                </div>
          </div>
            </div>
          </div>  
      </section>
  