<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <title>User Profile</title>
  <?php include("includes/header.php");
  $email = $_SESSION['username'];
  $user_qry = "SELECT * FROM tbl_users WHERE EMAIL = '".$email."'";

   $user_data = $crud->getData($user_qry); 


   $rand =$user_data[0]['RANDOM_ID'];
   
  
   ?>
  <style>
  body {
    background-image: url('https://images3.alphacoders.com/890/89045.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    background-position: center;
    margin: 0;
    padding: 0;
    font-family: 'Arial', sans-serif;
  }

  .profile-container {
    margin: 50px auto;
    max-width: 900px;
  }

  .card {
    border: none;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
  }

  .card-header {
    background: #e3e1d5;
    color: black;
    text-align: center;
    padding: 20px;
    font-size: 1.5rem;
    font-weight: bold;
  }

  .card-body {
    background: white;
    border-radius: 20px;
    padding: 30px;
  }

  .form-label {
    font-size: 1rem;
    color: black;
  }

  .form-control {
    border: 2px solid #ddd;
    transition: border-color 0.3s, box-shadow 0.3s;
  }

  .form-control:focus {
    border-color: #6a11cb;
    box-shadow: 0 0 10px rgba(106, 17, 203, 0.5);
  }

  .btn {
    transition: transform 0.2s, box-shadow 0.2s;
  }

  .btn:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
  }

  .btn-danger {
    background: red;
    border: none;
    color: white;
  }

  .btn-primary {
    background: linear-gradient(45deg, #6a11cb, #2575fc);
    border: none;
    color: white;
  }

  .image-card img {
    border-radius: 20px;
    max-width: 100%;
    height: auto;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
  }

  /* Responsive Design */
  @media (max-width: 768px) {
    .profile-container {
      padding: 10px;
      max-width: 100%;
    }

    .card-header {
      font-size: 1.25rem;
      padding: 15px;
    }

    .card-body {
      padding: 20px;
    }

    .btn {
      font-size: 0.9rem;
    }

    .btn-danger, .btn-primary {
      font-size: 0.95rem;
    }
  }

  @media (max-width: 576px) {
    .profile-container {
      margin: 20px 5px;
    }

    .row.g-4 > div {
      margin-bottom: 20px;
    }

    .card-body {
      padding: 15px;
    }

    .form-control {
      font-size: 0.9rem;
    }

    .btn {
      font-size: 0.85rem;
      padding: 10px;
    }

    .image-card img {
      max-width: 90%;
      margin: 0 auto;
    }
  }
</style>

</head>
<body>
 
  <?php include("includes/dashboardnav.php") ?>

  <div class="container profile-container">
    <div class="row g-4">
     
      <div class="col-md-4">
  <div class="card image-card text-center">
    <img 
      src="https://img.freepik.com/premium-vector/businessman-avatar-illustration-cartoon-user-portrait-user-profile-icon_118339-4394.jpg" 
      alt="User Profile Image" 
      class="img-fluid"
    >
    <div class="card-body">
      <h5 class="card-title" ><?php echo $user_data[0]['NAME'];?></h5>
      <p class="card-text">Embarking on journeys with Spondias, where every adventure is crafted with care and passion.  Unforgettable travel experiences,</p>
    </div>
  </div>
</div>


      
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">User Profile</div>
          <div class="card-body">
            <form>

              <div class="mb-4">
                <label for="userName" class="form-label fw-bold">Name</label>
                <input 
                  type="text" 
                  class="form-control form-control-lg rounded-pill shadow-sm" 
                  id="userName" 
                  name="userName" 
                  placeholder="Enter your name" 
                  value="<?php echo $user_data[0]['NAME'];?>"  onkeypress="valid_text(event)" 
                  required>
                  <input type="hidden" name="hidrand" id="hidrand" value="<?php echo $rand; ?>">
              </div>



              <div class="mb-4">
                <label for="contactNumber" class="form-label fw-bold">Contact Number</label>
                <input 
                  type="text" 
                  class="form-control form-control-lg rounded-pill shadow-sm" 
                  id="contactNumber" 
                  name="contactNumber" 
                  placeholder="Enter your contact number" 
                  value="<?php echo $user_data[0]['PHONE_NUMBER'];?>"  onkeypress="valid_numbers(event)" minlength="10" maxlength="10"
                  required>
              </div>

              <div class="mb-4">
                <label for="email" class="form-label fw-bold">Email</label>
                <input 
                  type="email" 
                  class="form-control form-control-lg rounded-pill shadow-sm" 
                  id="email" 
                  name="email" 
                  placeholder="Enter your email" 
                  value="<?php echo $user_data[0]['EMAIL'];?>" readonly >
              </div>

              <div class="row">
                <div class="col-6">
                  <a 
                    href="home.php" 
                    class="btn btn-danger btn-lg rounded-pill w-100 shadow-sm"
                  >
                    Back
                  </a>
                </div>
                <div class="col-6">
                  <button 
                    type="submit" 
                    class="btn btn-primary btn-lg rounded-pill w-100 shadow-sm"
                    onclick="update(event)"
                  >
                    Update
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

 
  <?php include("includes/footer.php") ?>
  
  <script src="js/index.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
</body>
</html>