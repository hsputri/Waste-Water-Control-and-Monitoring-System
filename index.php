<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/index.css">

</head>
<body  style="background-color:#001a38;">
<div class="logo">
  <img src="dist/images/logo.png" alt="" style="height:60px; margin:16px">
</div>
<div class="hold-transition login-page"style="background-color:#001a38;">

  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary" style="background-color:#002550">
      <div class="card-header text-center">
        <a href="#" class="h1" style="color:white; margin:5px;"><b>Sign In</b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg" style="color:white">Sign in to start your session</p>
  
        <form action="models/login.php?op=in" method="post">
          <div class="input-group mb-3">
            <input name="username" type="text" class="form-control" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="password" type="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button name="login" type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
  
        <p class="mt-4 mb-0" style="color:white">
          Don't have an account?
          <a href="register.php" class="text-center"style="color:white; text-decoration:underline; font-weight:bold;">Create Account</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->
</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
