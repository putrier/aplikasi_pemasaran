<section id="invoice" class="about-sec section-wrapper description">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 section-header wow fadeInDown mt-5">
                    <h2><span class="highlight-text">Invoice</span></h2>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 section-header wow fadeInDown mt-2 alert alert-success" role="alert">
                    <p style="text-align: center; color: red; font-size: 20px;">Informasi Pembayaran</p>
                    <p style="text-align: center;">Nomer Hp : 087720418964</p>
                    <p style="text-align: center;">Atas Nama : Arif Rakhman </p>
                      <br>
                    <p style="text-align: center; color: red; font-size: 20px;"><strong>Keterangan Pemesanan (Wajib dibaca)</strong></p>
                    <ol class="continuous-list" style="text-align: left">
                      <li class="mb-2">Silahkan lakukan perjanjian pembayaran dengan pihak oishii midhe indramayu (pada nomer telephone yang tertera pada bagian informasi).</li>
                      <li class="mb-2">Setelah klik "Order", mohon tunggu maksimal 3 jam untuk dilakukan verifikasi pesanan oleh admin.</li>
                      <li class="mb-2">Silahkan lihat "History Pesanan", untuk melihat keterangan pesanan.</li>
                      <li class="mb-2">Jika keterangan "Terverifikasi", maka pesanan telah diproses .</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-2 col-sm-12 col-xs-12 customized-text wow fadeInDown black-ed mb-5">
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12 customized-text wow fadeInDown black-ed mb-5">
                  <div class="card" style="box-shadow: 5px 0px 15px 5px #cccccc;">
                      <div class="card-body mb-3">
                        <table class="table mt-3">
                          <form method="post" enctype="multipart/form-data" action="<?= site_url('manajemen_invoice/proses_pesanan2/')?>" class="form-horizontal">
                            <input type="hidden" name="id_reseller" value="<?= $reseller['id_reseller']; ?>">
                          <div style="margin-left: 5px;">
                            <label style="margin-left: 5px; font-weight: bold; font-size: 20px; ">No.Invoice :<input type="text" style="height: 30px; border: 1px; font-weight: bold; font-size: 20px; " name="noinvoice" id="noinvoice" value="OMI<?php echo sprintf("%05s", $no_invoice)?>" readonly></label>
                          </div>
                          <div class="form-group">
                            <label for="telp_reseller" class="col-sm-3">Nama Lengkap</label>
                            <input type="text" id="nama_reseller" name="nama_reseller" class="form-control col-sm-8 mb-2" value="<?= $reseller['nama_reseller'] ?>" style="height: 20px;" readonly>
                          </div>
                          <div class="form-group">
                            <label for="alamat" class="col-sm-3">Alamat</label>
                            <input type="text" id="alamat" name="alamat" class="form-control col-sm-8 mb-2" value="<?= $reseller['alamat'] ?>" style="height: 20px;" >
                          </div>
                          <div class="form-group">
                            <label for="telp_reseller" class="col-sm-3">No.Telephone</label>
                            <input type="text" id="telp_reseller" name="telp_reseller" class="form-control col-sm-8 mb-2" value="<?= $reseller['telp_reseller'] ?>" style="height: 20px;" >
                          </div>
                          <div class="form-group">
                              <label for="telp_reseller" class="col-sm-3">Metode Pembayaran</label>
                              <input type="text" id="metode_pembayaran" name="metode_pembayaran" class="form-control col-sm-8 mb-2" value="Cash" style="height: 20px;" readonly>
                          </div>
                          <div class="col-sm-12 mb-2" style="text-align: center; margin-left: 5px;">
                            <div style="text-align: center; color:#FF650B; ">
                              <?php
                                $grand_total = 0;
                                if ($keranjang = $this->cart->contents()) {
                                  foreach ($keranjang as $item)
                                  {
                                    $grand_total = $grand_total + $item['subtotal'];
                                  }
                                 echo '<h4 style="text-align: center; font-size:20px;" class="text-bold"> Total Pembayaran : Rp. '.number_format($grand_total,0,',','.'); 
                              ?>
                              <input type="hidden" id="total_pembayaran" name="total_pembayaran" class="form-control col-sm-8 mb-2" value="<?= $grand_total;?>" style="height: 20px;" readonly>
                            </div>
                          </div>
                            <div class="form-group">
                                <label for="alamat" class="col-sm-5"></label>
                                <a href="<?= site_url('tampilan_produk/cart') ?>" class="btn btn-sm btn-success mb-2">Back to cart</a>
                                <button  class="btn btn-sm mb-2" style="background: #FF650B; color:white;">Order</button>
                            </div>
                        </form>
                        <?php
                          } else {
                            echo "<h3  >Empty Cart!</h3>";
                          }
                        ?>
                        </table>
                      </div> 
                  </div>
              </div>
          </div>
        </div>
</section>
