  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
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
            <div class="col-md-12">
              <table class="table">
                 <div class="pull-left">
                        <a href="<?= site_url('manajemen_invoice/tampil_invoice'); ?>" type="submit" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i> Kembali</a>
                  </div>
                <thead>
                   <tr style="text-align: center;">
                     <th>No</th>
                     <th>Produk</th>
                     <th>Jumlah</th>
                     <th>Point</th>
                     <th>Harga</th>
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
                <p><?= $dv->tgl_pesanan ?></p>
                <div style="letter-spacing: 3px; text-align: center;">
                   <p><?= $dv->no_invoice?></br>
                   <?= $dv->nama_reseller?></br>
                    (<?= $dv->username?>)</br>
                   <?= $dv->alamat ?></br>
                   <?= $dv->telp_reseller?></p>
                </div>
            </table>
          </div>  
        </div>
      </div>
    </div>
</div>
</section>
</div>