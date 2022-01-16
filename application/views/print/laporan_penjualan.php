<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Management Sales Report</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
          <div class="card">
            <div class="card-header" style="background:  #20B2AA; height: 10px;">
              <h3 class="card-title" style=""></h3>
            </div>
              <p class="card-title ml-3" style="font-size: 20px;">Filter Data</p>

            <div class="card-body">
               <form action="<?php echo site_url('laporan/laporan_penjualan'); ?>" method="post" class="form-horizontal">

                <div class="form-group row">
                  <div style="margin-left: 230px;" class="mt-2"></div>
                <div class="col-sm-3">
                  <select name="bulan" class="form-control">
                    <option>-- Month --</option>
                      <?php
                        foreach($bulan as $bln) :
                      ?>      
                    <option value="<?=$bln['a'] ?>"><?=$bln['a'] ?></option>
                      <?php endforeach; ?>
                  </select>  
                
                </div>

                <div class="col-sm-2">      
                <select name="tahun" class="form-control">
                <option>-- Year --</option>
                  <?php
                    foreach($tahun as $thn) :
                  ?>
                  <option value="<?= $thn['b']?>"><?= $thn['b']?></option>
                <?php endforeach; ?>  
                </select>
                </div>

                 <div class="col-md-3 col-sm-4">
                        <button type="submit" class="btn btn-primary col-sm-4"><i class="fa fa-search"></i> Cari</button>
                  </div>
                </div>
                </form>
                
            </div>
          </div>
          <br>


          
           <div class="card">
            <div class="card-header" style="background:  #20B2AA; height: 10px;">
              <h3 class="card-title" style=""></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="<?php echo site_url('laporan/print_laporan') ?>" method="post" target="_blank" >
                      <input type="hidden" name="bulan" value="<?= $filter['bulan'] ?>">
                      <input type="hidden" name="tahun" value="<?= $filter['tahun'] ?>">
                               
                      <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Print</button>
                </form>
               <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr style="text-align: center;">
                  <th>No</th>
                  <th>Nama Produk</th>
                  <th>Kategori</th>
                  <th>Jumlah</th>
                  <th>Harga</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;

                  foreach($laporan as $lp) :

                  ?>
                  <tr style="text-align: center;">
                    <td><?= $no++ ?></td>
                    <td><?= $lp['nama_produk'] ?></td>
                    <td><?= $lp['kategori'] ?></td>
                    <td><?= $lp['jml'] ?></td>
                    <td>Rp. <?= number_format($lp['harga'], 0,',','.') ?></td>
                  </tr>

                <?php endforeach; ?>

                    <center><p style="font-size: 24px;"><strong>Periode : <?= $filter['bulan'] ?> - <?= $filter['tahun'] ?></strong></p></center>
                   
 
            </tbody>
              </table>
            </div>
          </div>



      </div>
    </section>
  </div>
