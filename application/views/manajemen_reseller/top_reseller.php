 <section id="product" class="about-sec section-wrapper description" style="">
        <div class="container">
            <div class="row">
                <!-- Section Header -->
                <div class="col-md-12 col-sm-12 col-xs-12 section-header wow fadeInDown mt-5">
                    <h2><span class="highlight-text">TOP RESELLER</span></h2>



                     <?php foreach($top_reseller as $tp) {} ?>
            
                    <?php if($tp->status == 1) { ?>

                        <h3><?= $tp->periode ?></h3>

                    <?php } ?>

                </div>
                <!-- Section Header End -->
            </div>

        <div class="row text-center mt-3">

            <?php foreach($top_reseller as $tp) : ?>

            <?php if ($tp->status == 1) {?>

               <div class="col-md-4 col-sm-4 col-xs-4 custom-sec-img wow fadeInDown">
                    <div class="card" style="box-shadow: 5px 0px 15px 5px #cccccc;">
                      <div class="card-header" style="background: #FF650B; height: 10px;">
                        <h3 class="card-title" style=""></h3>
                      </div>
                      <div class="card-body" style="text-align: center;" >
                            <div style="text-align: right;" class="mr-2"> 
                                <img class="profile-user-img img-responsive img-circle img-center mx-auto d-block mt-3 mb-3" src="<?= base_url() . '/upload/foto_reseller/' . $tp->foto_reseller ?>" alt="User profile picture" style="width: 150px; height: 150px;">
                            </div>
                            <div class="mb-3">
                                <span style="font-size: 24px; color: #FF650B;"><strong>Reward : <?= $tp->reward; ?></strong></span>
                                <br></br>
                                <span class="" style="font-size: 22px;"><?= $tp->nama_reseller; ?></span>
                                <br>
                                <span class="" style="font-size: 17px;"><?= $tp->kota; ?></span>
                                <br></br>
                                <span class="" style="font-size: 21px; color: #FF650B;"><?= $tp->keterangan; ?></span>
                            </div>
                       </div>
                    </div>
                </div>
        <?php } else {} ?>

            <?php endforeach; ?>
                   
        </div>
        <br>
            <p style="font-size: 18px;"><strong>*Untuk para reseller yang namanya tercantum, silahkan segera mengambil hadiah di tempat produksi (alamat yang tercantum pada website ini).</strong></p>
        </div> 
</section> 