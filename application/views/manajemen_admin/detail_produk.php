  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Product</h1>
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
        <div class="card-body">
          <div class="row mt-5">
            <div class="col-md-4">
              <img src="<?= base_url(). '/upload/product/'.$detail_product['foto_product'] ?>" class="card-img-top" style="width: 300px; height: 300px;">
            </div>
            <div class="col-md-8">
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <td>Nama Produk</td>
                    <td><strong><?= $detail_product['nama_produk']; ?></strong></td>
                  </tr>
                  <tr>
                    <td>Keterangan</td>
                    <td><strong><?= $detail_product['keterangan']; ?></strong></td>
                  </tr>
                  <tr>
                    <td>Kategori</td>
                    <td><strong><?= $detail_product['kategori']; ?></strong></td>
                  </tr>
                  <tr>
                    <td>Harga</td>
                    <td><strong><?= $detail_product['harga']; ?></strong></td>
                  </tr>
                  <tr>
                    <td>Point kategori</td>
                    <td><strong><?= $detail_product['point_kategori']; ?></strong></td>
                  </tr>
                </div>
              </table>
            </div>
            <div class="box-footer">
                  <div class="pull-left">
                      <a href="<?php echo site_url('produk/data_product'); ?>" type="submit" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i> Kembali</a>
                  </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
</div>