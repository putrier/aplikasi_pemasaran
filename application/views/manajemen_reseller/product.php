 <section id="product" class="about-sec section-wrapper description" style="">
        <div class="container">
            <div class="row">
                <!-- Section Header -->
                <div class="col-md-12 col-sm-12 col-xs-12 section-header mt-5">
                    <h2><span class="highlight-text">PRODUCT</span></h2>
                </div>
                <!-- Section Header End -->
            </div>

        <div class="row text-center mt-3">
            <?php foreach($menu_product as $mp) : ?>
                <input type="hidden" name="qty" value="20" />
                <div class="card ml-4 mt-3 custom-sec-img shadow-lg p-10 mb-3 bg-white rounded" style="width: 16rem; box-shadow: 5px 0px 15px 5px #cccccc;">
                    <img src="<?= base_url() . '/upload/product/' . $mp->foto_product ?>" class="card-img-top" style="width: 300px; height: 290px;">
                        <div class="card-body">
                            <h5 class="card-title mb-2 mt-3" style="text-align: center; font-size: 20px; color: #FF650B;"><strong><?= $mp->nama_produk; ?></strong></h5>
                            <h5 class="card-title mb-2 mt-2" style="text-align: center; font-size: 20px; color: #2F4F4F;">(<?= $mp->kategori; ?>)</h5>
                            <h5 style="font-size: 12px; text-align: center; color: #2F4F4F;"><?= $mp->keterangan ?></h5>
                            <div style="text-align: center;">
                                <a style="width: 60px; height: 30px; color: #2F4F4F; border-radius: 2px; font-size: 20px;"><strong>Rp. <?= number_format($mp->harga, 0,',','.' ) ?></strong></a><br>
                            </div>

                        <div class="mt-2 mb-2" style="text-align: center;">
                        <?= anchor('tampilan_produk/add_to_cart/'.$mp->id_product,'<div class="btn btn-sm " style="background: #FF650B; color: white;">Add to cart</div>') ?>
                        </div>
                        </div>
                </div>
            <?php endforeach; ?>
        </div>
        </div> 
</section> 