<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Spondias - Forgot Password</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  
  <style>
    body {
      font-family: 'Source Sans Pro', sans-serif;
      background: linear-gradient(135deg, #2c2c2c, #4e4e4e, #2c2c2c);
      background-size: cover;
      background-position: center;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
    }

    .login-box {
      background: rgba(255, 255, 255, 0.95);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
      border-radius: 10px;
      width: 100%;
      max-width: 500px;
      padding: 20px;
      text-align: center;
      animation: fadeIn 1s ease;
    }

    .login-box .card-header {
      font-size: 24px;
      font-weight: bold;
      color: #333;
      text-transform: uppercase;
      margin-bottom: 20px;
      border-bottom: 2px solid #ffc107;
      padding-bottom: 5px;
    }

    .btn {
      font-size: 16px;
      padding: 10px 15px;
      border-radius: 5px;
      width: 100%;
    }

    .btn-success {
      background-color: #28a745;
      border: none;
      color: white;
    }

    .btn-success:hover {
      background-color: #218838;
      box-shadow: 0 4px 8px rgba(40, 167, 69, 0.3);
    }

    .btn-danger {
      background-color: #dc3545;
      border: none;
      color: white;
    }

    .btn-danger:hover {
      background-color: #c82333;
      box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
    }

    .form-control {
      border-radius: 5px;
      padding: 10px;
      font-size: 14px;
      border: 1px solid #ddd;
      color: #333;
    }

    .form-control:focus {
      border-color: #ffc107;
      box-shadow: 0 0 10px rgba(255, 193, 7, 0.5);
    }

    .form-label {
      font-weight: bold;
      color: #333;
      display: block;
      margin-bottom: 5px;
    }

    small.error {
      color: red;
      font-size: 12px;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @media (max-width: 576px) {
      .login-box {
        padding: 15px;
      }

      .btn {
        font-size: 14px;
        padding: 8px;
      }

      .card-header {
        font-size: 20px;
      }
    }
  </style>
</head>
<body>
  <div class="login-box">
    <div class="card">
      <div class="card-header">
        <p><b>Update Password</b></p>
      </div>
      <div class="card-body">
        <form id="updatePasswordForm" name="updatePasswordForm" action="">
          <div class="mb-3">
            <label for="password" class="form-label">New Password</label>
            <input type="password" class="form-control" placeholder="Enter New Password" id="password" name="password">
            <small id="passError" class="error"></small>
          </div>

          
          <div class="mb-3">
            <label for="confpass" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" placeholder="Confirm Password" id="confpass" name="confpass">
            <small id="confpassError" class="error"></small>
          </div>

          <div class="row mt-3">
            <div class="col-12 col-sm-6 mb-2 mb-sm-0">
              <button type="button" class="btn btn-danger">
                <a href="login.php" style="text-decoration: none; color: white;">Cancel</a>
              </button>
            </div>
            <div class="col-12 col-sm-6">
              <button type="submit" class="btn btn-success">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="dist/js/adminlte.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
  
  <script>
    $(function() {
      $("form[name='updatePasswordForm']").validate({
        rules: {         
          password: {
            required: true,
            minlength: 6
          },
          confpass: {
            required: true,
            minlength: 6,
            equalTo: "#password"
          }
        },
        messages: {         
          password: {
            required: "Please enter your new password",
            minlength: "Your password must be at least 6 characters long"
          },
          confpass: {
            required: "Please confirm your password",
            minlength: "Your confirm password must be at least 6 characters long",
            equalTo: "Password and confirm password do not match"
          }
        },
        submitHandler: function(form) {
          let formdata = new FormData(form);
          formdata.append('action', 'confrimpassword');

          $.ajax({
            type: "POST",
            url: "actions/Forgotpassword",
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            data: formdata,
            success: function(data) {
              if (data.trim() == 'true') {
                toastr.success('Password updated successfully');
                setTimeout(() => location.href = "login.php", 1000);
              } else {
                toastr.error('Error updating password');
              }
            },
            error: function(xhr, status, error) {
              toastr.error('Error: ' + error);
            }
          });
        },
        errorPlacement: function(error, element) {
          error.insertAfter(element);
        }
      });
    });
  </script>
</body>
</html>
