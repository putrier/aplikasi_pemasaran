  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Management Product</h1>
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
            <!-- /.card-header -->
            <div class="card-body" >
               <a href="<?= base_url('produk/tambah_product') ?>"><button class="btn btn-sm mb-3 btn-info"><i class="fas fa-plus fa-sm"></i> Tambah Produk</button></a>
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr style="text-align: center;">
                  <th>No</th>
                  <th>Nama Produk</th>
                  <th>Keterangan</th>
                  <th>kategori</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php

                  $no = 1;
                  foreach($data_produk as $dp) : ?>

                <tr style="font-size: 13px;">
                  <td style="text-align: center;"><?= $no++; ?></td>
                  <td style="text-align: center;"><?= $dp->nama_produk; ?></td>
                  <td style="text-align: center;"><?= $dp->keterangan; ?></td>
                  <td style="text-align: center;"> <?= $dp->kategori; ?></td>
                  <td align="center">
                      <a href="<?= site_url('produk/detail_product'); ?>/<?= $dp->id_product?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Detail</a>
                      <a href="<?php echo site_url('produk/edit_product'); ?>/<?php echo $dp->id_product; ?>" class="btn btn-success btn-xs"><i class="far fa-edit"></i> Edit</a>
                      <a href="<?php echo site_url('produk/hapus_product'); ?>/<?= $dp->id_product?>" class="btn btn-danger btn-xs tombol-hapus"><i class="fa fa-trash"></i> Delete</a>
                  </td>
                </tr>
                <?php endforeach; ?>   
                </tbody>
                </table>
            </div>
          </div>
      </section>
    </div>

