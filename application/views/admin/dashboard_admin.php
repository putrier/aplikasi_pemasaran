  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
        </div>
      </div>
    </section>

      <section class="content">
        <div class="container-fluid">
          <div class="col-sm-12" >
              <div class="card" >
                    <div class="card-body">
                      <p style="text-align: center; font-size: 25px;">UD.OISHII MIDHE INDRAMAYU</p>
                       <img class="img-responsive mb-2" src="<?= base_url() ?>assets/admin/oishii-midhe.png" style="height: 100px; position: center; margin-left: 200px;">
                        <p style="text-align: center; font-size: 20px;">Jalan KH.Khasbullah Ds.Tenajar Lor Blok.Kapulandak Rt/Rw 08/02 Kec.Kertasemaya Kab.Indramayu.</p>
                    </div>
              </div>
          </div>
        </div>
      </section>

    <section class="content">
      <div class="container-fluid" >
      <div>
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $jumlah_pending_reseller ?></h3>
                <p>Pending Reseller</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-alt"></i>
              </div>
              <a href="<?= base_url('dashboard_admin/pending_reseller'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $jumlah_pending ?></h3>
                <p>Pending Orders</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-cart"></i>
              </div>
              <a href="<?= base_url('dashboard_admin/pending_orders') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">  
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $jumlah_received ?></h3>
                <p>Orders Received</p>
              </div>
              <div class="icon">   
                 <i class="fas fa-receipt"></i>
              </div>
              <a href="<?= base_url('manajemen_invoice/tampil_invoice') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $jumlah_completed ?></h3>
                <p>Completed Orders</p>
              </div>
              <div class="icon">
                  <i class="far fa-check-circle"></i>
              </div>
              <a href="<?= base_url('dashboard_admin/completed_orders') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          </div> 
        </div>
      </div>
  </div>