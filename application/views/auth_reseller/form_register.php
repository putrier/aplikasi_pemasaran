<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registrasi | Oishii Midhe</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="shortcut icon" href="<?= base_url()?>assets/icon.png">
</head>

<body class="hold-transition register-page" style="background-image: url('assets/background1.jpg')">
<div class="register-box">
  <div class="card o-hidden border-0 shadow-lg my-3">
    <div class="card-body login-card-body" style="background-image: url('assets/background1.jpg')">
      <div class="login-logo">
        <a style="font-family: cursive;"><b>Oishii - </b>Midhe</a>
      </div>
      <p class="login-box-msg mt-1" style="font-family: serif; font-size: 35px;">REGISTRASI</p>
      <form action="<?= base_url('registrasi') ?>" method="post">
        <div class="form-group mb-3">
          <input style="background: transparent; color: white" type="text" class="form-control" placeholder="Nama Lengkap" name="nama_reseller" value="<?= set_value('nama_reseller'); ?>">
          <?= form_error('nama_reseller','<small class="text-danger">','</small>'); ?>
        </div>
        <div class="form-group mb-3">
          <input style="background: transparent; color: white" type="text" class="form-control" placeholder="Nomer KTP" name="no_ktp" value="<?= set_value('no_ktp'); ?>">
          <?= form_error('no_ktp','<small class="text-danger">','</small>'); ?>
        </div>
        <div class="form-group mb-3">
          <input style="background: transparent; color: white" type="text" class="form-control" placeholder="Username" name="username" value="<?= set_value('username'); ?>">
          <?= form_error('username','<small class="text-danger">','</small>'); ?>
        </div>
        <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input style="background: transparent; color: white" type="password" class="form-control form-control-user" id="password1" placeholder="Password" name="password1">
                      <?= form_error('password1','<small class="text-danger">','</small>'); ?>
                  </div>

                  <div class="col-sm-6">
                    <input style="background: transparent; color: white" type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Ulangi Password" name="password2" id="password2">
                  </div>
        </div>
        <div class="form-group mb-3">
          <input style="background: transparent; color: white" type="text" class="form-control" placeholder="Nomer Telephone" name="telp_reseller" value="<?= set_value('telp_reseller'); ?>">
           <?= form_error('telp_reseller','<small class="text-danger">','</small>'); ?>
        </div>
        <div class="form-group mb-3">
          <input style="background: transparent; color: white" type="text" class="form-control" placeholder="Alamat Lengkap" name="alamat" value="<?= set_value('alamat'); ?>">
           <?= form_error('alamat','<small class="text-danger">','</small>'); ?>
        </div>
        <div class="form-group mb-3">
          <input style="background: transparent; color: white" type="text" class="form-control" placeholder="Kota" name="kota" value="<?= set_value('kota'); ?>">
          <?= form_error('kota','<small class="text-danger">','</small>'); ?>
        </div>
        <div class="row">
          <div class="col-4" style="left: 120px;">
            <button type="submit" class="btn" style="background: rgb(254, 75, 9);color: black;">Register</button>
          </div>
        </div>
      </form>
      <p class="text-center mt-1 mb-0">
        <a href="<?= base_url('auth')?>" style="color: rgb(254, 75, 9);">I already have an account? Login!</a>
      </p>
    </div>
  </div>
</div>

<script src="<?= base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/admin/dist/js/adminlte.min.js"></script>
</body>
</html>
