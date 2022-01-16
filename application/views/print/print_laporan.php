

      <div align='center' width='750px' class="mt-5" style="float:center">
        <div style="float:center">
            <center style="line-height:8px">
                <h3> OISHII MIDHE INDRAMAYU </h3>
                <p style="font-size: 20px;">LAPORAN PENJUALAN</p>
                <p style="font-size: 18px;">Periode : <?= $filter['bulan']?> - <?= $filter['tahun']?></p>
               
            </center>
        </div>
    </div>
    <hr class="col-sm-12">
    
        <!-- Default box -->
      <div class="card">
           
            <!-- /.card-header -->
            <div class="card-body" >
        <div class="col-md-12">
          <table class="table">
            
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
              <tr style="text-align: center;">
               <td></td>
               <td></td>
               <td><strong>Total Pemasukan</strong></td>
               <td></td>
               <?php foreach($laporan_total as $x) {} ?>
                <td>Rp. <?=number_format($x['d'], 0,',','.'); ?></td>
               
               
             </tr>
              <tr style="text-align: center;">
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
             </tr>
           </tbody>

       
         </div>
          </table>
     
         


<script>
  window.print();
</script>

