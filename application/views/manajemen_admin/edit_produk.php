<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Data Product</h1>  
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
      <div class="col-sm-8" style="left: 150px;">
        <div class="card">
            <div class="card-header" style="background:  #20B2AA; height: 10px;">
              <h3 class="card-title" style=""></h3>
            </div>
            <div class="ml-3" style="color: red;">
              <?php echo $this->session->flashdata('message'); ?>
            </div>
            <div class="card-body">
              <table class="table">
                <form method="post" enctype="multipart/form-data" action="<?= site_url('produk/update_product/' . $produk['id_product']) ?>" class="form-horizontal">
                    <input type="hidden" name="id" value="<?php echo $produk['id_product']; ?>">
                  <div class="form-group form-inline">
                    <label for="nama_product" class="col-sm-3">Nama Produk</label>
                    <input type="text" id="nama_produk" name="nama_produk" class="form-control col-sm-9" value="<?= $produk['nama_produk'] ?>">     
                  </div>
                  <div class="form-group form-inline">
                        <label class="col-sm-3">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control col-sm-9" value="<?php echo $produk['keterangan']; ?>">
                  </div>
                  <div class="form-group form-inline">
                        <label class="col-sm-3">Kategori</label>
                          <select name="kategori_id" class="form-control col-sm-9" value="<?php echo set_value('kategori_id'); ?>">
                            <?php foreach($kategori as $kg) : ?>
                              <option <?php if($produk['kategori_id'] == $kg->id_kategori){ echo "selected";} ?> value="<?= $kg->id_kategori; ?>"><?= $kg->kategori; ?></option>
                            <?php endforeach; ?>
                          </select>
                        <?php echo form_error('kategori_id', '<small class="text-danger">', '</small>') ?>
                  </div>
                  <div class="form-group form-inline">
                        <label class="col-sm-3">Harga</label>
                        <input type="text" name="harga" class="form-control col-sm-9" value="<?php echo $produk['harga']; ?>">
                  </div>
                  <div class="form-group form-inline">
                        <label class="col-sm-3">Gambar Produk</label><br>
                        <input type="file" id="foto_product" value="<?= $produk['foto_product']; ?>" name="foto_product" class="form-control col-sm-9" style="height: 45px;"> 
                  </div>
        </div>
                  <div class="modal-footer">
                        <a href="<?php echo site_url('produk/data_product'); ?>"><button type="button" class="btn btn-danger" data-dismiss="modal">Close</button></a>
                        <button type="submit" class="btn btn-primary" ><i class="fa fa-save"></i> Save</button>
                  </div>
              </form>                       
      </table>
    </div>
  </div>
</section>
</div>