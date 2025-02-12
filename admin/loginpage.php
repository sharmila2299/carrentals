<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Spondias</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="card card-outline card-warning">
        <div class="card-header text-center">
          <p class="h1"><b>Admin Panel</p>
        </div>
        <div class="card-body">
          <p class="login-box-msg h4">Cars And Bikes</p>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="UserName" id="username" name="username">
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" id="password" name="password">
          </div>
          <div class="row">
              
              <div class="col-12 mb-2 text-center" style="margin-top:-10px;">
              Forgot Password ? <a href="forgotpassword">Click Here</a>
              </div>
          </div>
          <div class="row mt-3 ">
            <div class="col-4">
            <button type = "button" class="btn btn-danger btn-block" name="cancel"  onclick="window.location = ''" >Cancel</button>
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-success btn-block" onclick="loginval()" name="submit" style="margin-left:100px;">Login</button>
            </div>
            <div class="col-4"></div>
          </div>
        </div>
        <div class = "card-footer text-center">
              <div>Don't Have account?<a href="register">Register</a></div>
            </div>
      </div>
    </div>

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- Tosatr -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- custom -->
    <script type="text/javascript" src="js/login.js"></script>
  </body>
</html>