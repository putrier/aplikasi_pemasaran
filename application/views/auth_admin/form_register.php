<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registrasi Admin | Oishii Midhe</title>
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

<body class="hold-transition register-page">
<div class="register-box">
  <div class="card o-hidden border-0 shadow-lg my-3">
    <div class="card-body login-card-body">
      <div class="login-logo">
        <a style="font-family: cursive;"><b>Oishii - </b>Midhe</a>
      </div>
      <p class="login-box-msg mt-1" style="font-family: serif; font-size: 35px;">REGISTER</p>
      <form action="<?= base_url('registrasi/admin') ?>" method="post">
        <div class="form-group mb-3">
          <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_admin" value="<?= set_value('nama_admin'); ?>">
          <?= form_error('nama_admin','<small class="text-danger">','</small>'); ?>
        </div>
        <div class="form-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username" value="<?= set_value('username'); ?>">
          <?= form_error('username','<small class="text-danger">','</small>'); ?>
        </div>
        <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password1" placeholder="Password" name="password1">
                      <?= form_error('password1','<small class="text-danger">','</small>'); ?>
                  </div>

                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Ulangi Password" name="password2" id="password2">
                  </div>
        </div>
        <div class="row">
          <div class="col-4" style="left: 120px;">
            <button type="submit" class="btn btn-primary">Register</button>
          </div>
        </div>
      </form>
        <p class="text-center mt-1 mb-0">
          <a href="<?= base_url('auth')?>">I already have an account? Login!</a>
        </p>
    </div>
  </div>
</div>
<script src="<?= base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/admin/dist/js/adminlte.min.js"></script>
</body>
</html>
