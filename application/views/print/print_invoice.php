

      <div align='center' width='750px' class="mt-5" style="float:center">
        <div style="float:center">
            <center style="line-height:8px">
                <h3> OISHII MIDHE INDRAMAYU </h3>
                <p> JL.KH.Khasbullah Ds.Tenajar Lor Blok.Kapulandak Rt/Rw 08/02 Kec.Kertasemaya Kab.Indramayu.</p>
                <p style="font-size:18px; "> 087720418964</p>
                <i class="fab fa-instagram" style="font-size:18px; "> oishii_midhe</i></li>
                <i class="fab fa-facebook" style="font-size:18px; "> Teh Tarik Jelly 'Oishii' Indramayu</i></li>
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

           <?php date_default_timezone_set('Asia/Jakarta'); ?>
           <p> Tanggal Pemesanan : <?= $dv->tgl_pesanan ?><br>
               Tanggal Pengambilan : <?= date('Y-m-d H:i:s'); ?>
           </p>

           <div style="letter-spacing: 3px; text-align: center;">
           <p><?= $dv->no_invoice?></br>
           <?= $dv->nama_reseller?></br>
           <?= $dv->alamat ?></br>
          
         </div>
          </table>
     
         


<script>
  window.print();
</script>

