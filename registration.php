<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
     include 'crudop/crud.php';
     $crud = new Crud();
    ?>
    <?php $user = ("000"); 
        $countQuery = "SELECT max(ID) as id FROM tbl_users";
        $result = $crud->getData($countQuery);
        $id = $result[0]['id'] + 1;
        $userID = "UserID" . $user . $id;
    ?>
    <title>Registration</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   
   <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

   <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  
   <link rel="stylesheet" href="dist/css/adminlte.min.css">
   
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" crossorigin="anonymous" />

    <link rel="icon" type="image/jpg" sizes="32x32" href="images/sl1.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
      body {
        background-image: linear-gradient(to right, #000000, #ffcc00, #000000);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Arial', sans-serif;
        color: #231d1d;
        margin: 0;
      }

      .main-container {
        width: 91%;
        max-width: 934px;
        border-radius: 25px;
        overflow: hidden;
        display: flex;
        flex-wrap: wrap;
        background: #fff;
        box-shadow: 15px -15px 35px rgb(185 172 172 / 20%);
        transform: scale(1);
        transition: transform 0.3s;
      }

      .main-container:hover {
        transform: scale(1.02);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
      }

      .image-card {
        flex: 1;
        min-width: 424px;
        background: url('https://i.pinimg.com/736x/ab/cc/4a/abcc4aa09757d862ce78e90783af6714.jpg') center / cover no-repeat;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 7px;
        color: #f9f5f5;
        text-align: center;
      }

      .image-card h2 {
        font-size: 2rem;
        font-weight: bold;
        text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
      }

      .image-card p {
        font-size: 1rem;
        margin-top: 10px;
        text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
      }

      .form-card {
        flex: 2;
        padding: 21px;
        background: #fff;
        color: #0d0d0d;
        border-left: 5px solid #61656c;
      }

      .form-card h3 {
        color: black;
        font-weight: bold;
        margin-bottom: 20px;
      }

      .form-control {
        border-radius: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      }

      .btn {
        border-radius: 5px;
        font-weight: bold;
        padding: 13px 50px;
        transition: transform 0.2s, background 0.3s;
      }

      .btn-primary {
        background: green;
        border: none;
        color: black;
      }

      .btn-primary:hover {
        background: green;
        transform: scale(1.05);
      }

      .btn-danger {
        background: red;
        border: none;
        color: black;
      }

      .btn-danger:hover {
        background: red;
        transform: scale(1.05);
      }

      #previewImg,
      #previewImg1 {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 10px;
        margin-top: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        display: none;
      }

      
      @media (max-width: 768px) {
        .main-container {
          flex-direction: column;
        }

        .image-card {
          min-width: 100%;
          padding: 20px;
        }

        .form-card {
          padding: 15px;
        }

        .form-label {
          font-size: 0.9rem;
        }

        .form-control {
          padding: 10px;
        }

        .btn {
          padding: 12px 25px;
          font-size: 0.9rem;
        }

        #previewImg, #previewImg1 {
          width: 60px;
          height: 60px;
        }

        
        .btn-block {
          width: 100%;
        }

        .row .col-md-6 {
          margin-bottom: 10px;
        }
      }

      @media (max-width: 576px) {
        .form-card h3 {
          font-size: 1.4rem;
        }

        .form-control, .btn {
          font-size: 0.85rem;
        }
      }
    </style>
  </head>
  <body>
    <div class="main-container">
      <div class="image-card">
        <h2>Welcome to Our Rentals</h2>
        <p>Join us and explore the endless possibilities!</p>
      </div>

      <div class="form-card">
        <h3 style="text-align:center;">Registration Form</h3>
        <form id="registerForm" name="registerForm" autocomplete="off" method="post" enctype="multipart/form-data">
        <div class="row">
                    
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" onkeypress="valid_text(event)">
                        <small id="nameError" class="error"></small>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email" onkeypress="isValidEmail(email)" >
                        <small id="emailError" class="error"></small>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password" >
                        <small id="passwordError" class="error"></small>
                    </div>
                     
                    <div class="col-md-6 mb-3">
                        <label for="dob" class="form-label">Date Of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" placeholder="Enter your Email" >
                        <small id="emailError" class="error"></small>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <div class="d-flex align-items-center">
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male" >
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female" >
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="other" value="other" >
                                <label class="form-check-label" for="other">Other</label>
                            </div>
                        </div> 
                        <label for="gender" class="error" style="display:none";>please select gender</label>
                    </div>    
                    <div class="col-md-6 mb-3">
                        <label for="dob" class="form-label">Phone number</label>
                        <input type="text" class="form-control" id="number" name="number" minlength="10" maxlength="10" placeholder="Enter your number" onkeypress="valid_numbers(event)" >
                        <small id="numberError" class="error"></small>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="dob" class="form-label">Address</label>
                        <textarea  class="form-control" id="address" name="address" placeholder="Enter your address" rows="2"></textarea>
                        <small id="addressError" class="error"></small>
                    </div>

                    <div class="col-6 mb-2">
                      <label for="image" class="form-label">Aadhar Image</label>
                      <input type="file" name="image" class="form-control p-1" id="image" accept=".jpg, .jpeg, .png">
                      <br>
                      <img id="previewImg" alt="Uploaded Image Preview" width="80px" height="80px" style="display:none;">
                      <small id="imageError" class="error"></small>
                    </div>

                    <div class="col-6 mb-2">
                        <label for="image" class="form-label">Profile Image</label>
                        <input type="file" name="image1" class="form-control p-1" id="image1" accept=".jpg, .jpeg, .png">
                        <br>
                        <img id="previewImg1" alt="Uploaded Image Preview" width="80px" height="80px" style="display:none;">
                        <small id="imageError1" class="error"></small>
                    </div>
                </div>
          <div class="row mt-3">
          <div class="col-6 d-grid">
                          <a href="login" class="btn btn-danger ">Cancel</a>
                        </div>
                    <div class="col-6 d-grid">
                        <input type="hidden" value="<?php echo $userID;?>" name="userid" id="userid">
                        <button type="submit" class="btn btn-primary" >Create User</button>
                    </div>
          </div>
        </form>
      </div>
    </div>

    <script>
      function previewImage(event) {
        const img = document.getElementById('previewImg');
        img.src = URL.createObjectURL(event.target.files[0]);
        img.style.display = 'block';
      }

      function previewImage1(event) {
        const img = document.getElementById('previewImg1');
        img.src = URL.createObjectURL(event.target.files[0]);
        img.style.display = 'block';
      }
    </script>
    <script src="plugins/jquery/jquery.min.js"></script>
    
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    
    <script src="mainjs/myscript.js"></script>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  </body>
</html>
