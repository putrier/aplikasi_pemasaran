<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Login | Oishii-Midhe</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="<?= base_url() ?>assets/admin/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="shortcut icon" href="<?= base_url()?>assets/icon.png">
</head>
<body class="hold-transition login-page" style="background-image: url('../assets/background1.jpg')">
  

  <div class="login-box">
  <!-- /.login-logo -->
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body login-card-body" style="background-image: url('../assets/background1.jpg')">
      <div class="login-logo">
        <a style="font-family: cursive;"><b>Oishii - </b>Midhe</a>
      </div>
      <div style="text-align: center;">
          <div class="spinner-grow" role="status" style="background: rgb(254,75,9);"></div>
          <div class="spinner-grow" role="status" style="background: rgb(254,75,9);"></div>
          <div class="spinner-grow" role="status" style="background: rgb(254,75,9);"></div>
          <div class="spinner-grow" role="status" style="background: rgb(254,75,9);"></div>
          <div class="spinner-grow" role="status" style="background: rgb(254,75,9);"></div>
          <div class="spinner-grow" role="status" style="background: rgb(254,75,9);"></div>
      </div>
          <p class="login-box-msg mt-1" style="font-family: serif; font-size: 35px;">LOGIN</p>
          <small><?= $this->session->flashdata('message'); ?></small>
           <?= $this->session->flashdata('pesan'); ?>
      <form action="<?= base_url('auth/admin') ?>" method="post">
          <div class="form-group mb-3">
            <input type="text" class="form-control form-control-user" placeholder="Username" name="username" style="background: transparent; color: white">
          </div>
          <div class="form-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" style="background: transparent; color: white">
          </div>
          <div class="row">
            <div class="col-4" style="left: 110px;">
              <button type="submit" class="btn btn-block" style="background: rgb(254,75,9); color: black;">Sign In</button>
            </div>
          </div>
            <p class="text-center mb-0 mt-3">
              <a href="<?= base_url('dashboard') ?>" style="color: rgb(254,75,9);">Back to home</a>
            </p>
      </form>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="<?= base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/admin/dist/js/adminlte.min.js"></script>
</body>
</html>
