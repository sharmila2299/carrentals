<!DOCTYPE html>
<html lang="en">
  <?php include('includes/header.php'); ?>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
   
  <style>
  .form-label {
    color: black;
  }

  body {
    background: linear-gradient(to right, black, grey, black);
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
  }

  .card {
    transition: box-shadow 0.3s ease, transform 0.3s ease;
  }

  .card:hover {
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    transform: translateY(-5px);
  }

  /* Responsive Design */
  @media (max-width: 768px) {
    .card-header {
      font-size: 1.25rem;
    }

    .card-body {
      padding: 2rem;
    }

    .btn {
      font-size: 0.9rem;
    }

    .row.mt-4 .col-6 {
      margin-bottom: 15px;
    }

    .card-body input {
      font-size: 0.9rem;
    }
  }

  @media (max-width: 576px) {
    .card {
      margin: 0 10px;
    }

    .row.mt-4 .col-6 {
      margin-bottom: 10px;
    }

    .btn {
      font-size: 0.85rem;
      padding: 10px;
    }

    .card-header h4 {
      font-size: 1.2rem;
    }
  }
</style>


  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <?php include('includes/dashboardnav.php'); ?>

      <section class="content py-5">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card shadow-lg border-0">
            <div class="card-header text-black text-center fw-bold">
              <h4 class="mb-0">Change Password</h4>
            </div>
            <div class="card-body p-4">
              <form id="changePasswordForm" method="post">
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" id="username" name="username" class="form-control" 
                         value="<?php echo $_SESSION['username'] ?>" readonly>
                </div>
                <div class="mb-3">
                  <label for="old_password" class="form-label">Old Password</label>
                  <input type="password" id="old_password" name="old_password" class="form-control" 
                         placeholder="Enter your old password">
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">New Password</label>
                  <input type="password" name="password" id="password" class="form-control" 
                         placeholder="Enter a new password">
                </div>
                <div class="mb-3">
                  <label for="confPassword" class="form-label">Confirm New Password</label>
                  <input type="password" name="confPassword" id="confPassword" class="form-control" 
                         placeholder="Re-enter the new password">
                </div>
                <div class="row mt-4">
                  <div class="col-6 d-grid">
                    <button type="button" class="btn btn-danger btn-block" 
                            onclick="window.location = 'home.php'">
                      Back
                    </button>
                  </div>
                  <div class="col-6 d-grid">
                    <button type="submit" class="btn btn-success btn-block">
                      Change Password
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script type="text/javascript" src="js/changePassword.js"></script>


    <?php include('includes/footer.php'); ?>

    <script>
      $(function () {
        $('[data-toggle="tooltip"]').tooltip();
      });
    </script>
  </body>
</html>