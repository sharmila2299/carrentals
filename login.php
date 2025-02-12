<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Spondias</title>

    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
   
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  
    <style>
      body {
        background:#393535;
        
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Roboto', sans-serif;
        color: #231d1d;
        margin: 0;
      }

      
      .main-card {
        width: 91%;
        max-width: 934px;
        border-radius: 25px;
        overflow: hidden;
        display: flex;
        background: #fff;
        box-shadow: 15px -15px 35px rgb(185 172 172 / 20%);
        transform: scale(1);
        transition: transform 0.3s;
      }

      .main-card:hover {
        transform: scale(1.03);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
      }

      
      .image-card {
        flex: 1;
        background: url('images/l2.jpeg') center / cover no-repeat;
        padding: 30px;
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        text-align: center;
      }

      .image-card h2 {
        font-size: 2.2rem;
        font-weight: bold;
        margin-bottom: 10px;
        text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
      }

      .image-card p {
        font-size: 1rem;
        margin-bottom: 20px;
        text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
      }

      
      .login-card {
        flex: 1;
        padding: 40px 30px;
        background: #f9f9f9;
        border-left: 5px solid #282931;
      }

      .login-card h2 {
        font-size: 1.8rem;
        color: #007bff;
        margin-bottom: 20px;
        text-align: center;
      }

      .login-card p {
        color: #6c757d;
        text-align: center;
        margin-bottom: 30px;
      }

      .form-control {
        border-radius: 25px;
        padding: 10px 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      }

      
      .btn {
        border-radius: 25px;
        padding: 10px 20px;
        font-weight: bold;
        transition: background 0.3s, transform 0.2s;
      }

      .btn-primary {
        background: #007bff;
        border: none;
        color: white;
      }

      .btn-primary:hover {
        background: #0056b3;
        transform: scale(1.05);
      }

      .btn-danger {
        background: #dc3545;
        border: none;
        color: white;
      }

      .btn-danger:hover {
        background: #bd2130;
        transform: scale(1.05);
      }

    
      .footer-link {
        text-align: center;
        margin-top: 20px;
      }

      .footer-link a {
        color: #007bff;
        font-weight: bold;
        text-decoration: none;
      }

      .footer-link a:hover {
        text-decoration: underline;
      }
     
      @media (max-width: 768px) {
        .main-card {
          flex-direction: column;
        }

        .image-card {
          text-align: center;
          padding: 20px;
        }

        .login-card {
          padding: 20px;
        }
      }
    </style>

  </head>
  <body>
  <div class="main-card d-flex">
      
      <div class="image-card">
        <h2>Welcome to Spondias!</h2>
        <p>Your gateway to seamless connections and services.</p>
      </div>

      <div class="login-card">
        <h2>Login to Your Account</h2>
        <p>Please enter your credentials to access your account.</p>
        <form>
          <div class="form-group">
            <label for="email" class="font-weight-bold">Email Address</label>
            <input type="email" class="form-control" id="username" name="username" placeholder="Enter your email" required>
          </div>
          <div class="form-group">
            <label for="password" class="font-weight-bold">Password</label>
            <input type="password" class="form-control"  id="password" name="password" placeholder="Enter your password" required>
          </div>
          <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="forgotpassword.php" class="text-primary">Forgot Password?</a>
          </div>
          <div class="row">
            <div class="col-6">
            <button type = "button" class="btn btn-danger btn-block" name="cancel"  onclick="window.location = 'index.php'" >Cancel</button>

            </div>
            <div class="col-6">
            <button type="submit" class="btn btn-success btn-block" onclick="loginval(event)" name="submit" >Login</button>

            </div>
          </div>
        </form>
        <div class="footer-link">
          <p class="mt-4">Don't have an account? 
            <a href="registration.php">Register</a>
          </p>
        </div>
      </div>
    </div>

   
    <script src="plugins/jquery/jquery.min.js"></script>
    
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   
    <script src="dist/js/adminlte.min.js"></script>
   
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
   
    <script type="text/javascript" src="js/login.js"></script>
  </body>
</html>
