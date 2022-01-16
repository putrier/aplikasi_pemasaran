<section class="about-sec section-wrapper description responsive" >
        <div class="container">
            <div class="row">
                <!-- Section Header -->
                <div class="col-md-12 col-sm-12 col-xs-12 section-header wow fadeInDown mt-5">
                    <h2><span class="highlight-text" >Cart</span></h2>
                </div>
                <!-- End Section Header -->
            </div>

          <div class="card mb-2 ml-5" style="box-shadow: 5px 0px 15px 5px #cccccc;">
            <div class="row mb-3 mt-3">
              <?php
                  $no=1;
                  foreach($this->cart->contents() as $items) :
                      $grand_total = 0;
                      $total = ($items['price'] * $items['qty']);
                      $grand_total += $total;
              ?> 
              <div class="col-sm-4 mt-2">
                 <img src="<?= base_url('upload/product/')?><?=$items['foto_product'] ?>" class="card-img-top ml-4 mb-2 mt-4" style="width: 200px; height: 170px; ">
              </div>
              <div class="col-sm-7 mb-2">
                <div class="card-body " >

                  <a href="<?= site_url('tampilan_produk/delete') ?>/<?= $items['rowid']  ?>" onclick="return confirm ('Are you sure you want to delete this order?')"><p style="text-align: right;"><i class="fa fa-trash" style="margin-right: 40px; color: #FF650B; font-size: 20px;"></i></p></a>

                  <p class="card-title ml-2" style="font-size: 25px;"><strong><?= $items['name']; ?></strong></p>
                   <span class="card-title mb-1 ml-2" style="font-size: 17px;"><?= $items['kategori']; ?></span>
                  <p class="card-text ml-2" style="font-size: 20px; ">Rp. <?= number_format($items['price'], 0,',','.') ?></p>

                  <div class="btn btn-sm mb-2 ml-2" href="javascript:void(0)" onclick="tambahcart('<?= $items['rowid']?>',<?= $items['qty']?>,<?= $items['qty'] ?>)" style="background: #FF650B; color: white;"><i class="icon-plus"></i>+</div>

                  <input class="span1 mb-2 ml-2" style="max-width:40px; max-height: 5px;" readonly="true" placeholder="20" id="appendedInputButtons<?= $items['id'] ?>" size="16" value="<?= $items['qty'] ?>">

                  <div class="btn btn-sm mb-2 ml-2" href="javascript:void(0)" onclick="kurangcart('<?= $items['rowid']?>',<?= $items['qty'] ?>, <?= $items['qty'] ?>)" style="background: #FF650B; color: white;"><i class="icon-plus"></i>-</div>

                  <a style="font-size: 18px;" readonly="true" id="appendedInputButtons ?>" name="point" class="ml-5" value="<?= $items['point'] * $items['qty'] ?>">Point : <?= $items['point'] * $items['qty'] ?></a> 

                  <p class="card-text ml-2" style="font-size: 22px; ">Sub-Total : Rp. <?= number_format($items['subtotal'], 0,',','.') ?> </p>    
                </div>
              </div>
                 <!-- <div class="ml-3 mb-2" style="width: 95%; box-shadow: 5px 0px 15px 5px #cccccc; "></div> -->
                  <hr color="#cccccc" width="90%" class="ml-5">
                <?php endforeach; ?>
            </div>
          </div>
              
 <script type="text/javascript">

        function tambahcart(row,qty, point){ 
     
      if(qty != "" || point != ""){
        $.ajax({
          url:'<?php echo base_url(); ?>tampilan_produk/tambahcart',
          type:'POST',
          dataType:'json',
         data:{ 
                  'row' : row, 
                  'qty' : qty,
                  'point' : point, 
               },

          success: function(data) {
location.reload();
          }
        });
      } else {
        return false;
      }
      return false;
  }  


  function kurangcart(row,qty,point){ 
     
      if(qty != "" || point !=""){
        $.ajax({
          url:'<?php echo base_url(); ?>tampilan_produk/kurangcart',
          type:'POST',
          dataType:'json',
         data:{ 
                  'row' : row, 
                  'qty' : qty, 
                  'point' : point,
               },

          success: function(data) {
location.reload();
          }
        });
      } else {
        return false;
      }
      return false;
  }  
    </script>

              <a href="<?= base_url('tampilan_produk/product') ?>" ><p style="text-align: right;" class="btn btn-sm btn-info ml-5">Add Product (+)</p></a> 
                          
              <hr color="#cccccc" width="95%" class="ml-5">

              <div>
                <a style="color: #FF650B; font-size: 25px;"class="ml-5">Total Payment : Rp. <?= number_format($this->cart->total(), 0,',','.') ?></a>
                <a data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" ><p style="text-align: right; background: #FF650B; color: white;" class="btn btn-sm ml-2">Checkout</p></a>
              </div>
              <div class="collapse  col-sm-5" id="collapseExample">
              <div class="card card-body" style="text-align: center;">
                  <p style="text-align: center;">Metode Pembayaran</p>
                  <a href="<?= base_url('manajemen_invoice/invoice') ?>"><button>Transfer (Bank BRI)</button></a>
                  <a href="<?= base_url('manajemen_invoice/invoice_cash') ?>"><button>Cash</button></a>
              </div>
              </div>
        </div>
</section>