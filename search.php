<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search and Filter Form</title>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    
    <style>
      body {
        background-image: url('images/bg_1.jpg');
        background-size: cover;
        background-position: center;
        position: relative;
        opacity: 0.9;
      }
      body::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: -1;
      }
      .filter-box {
        box-shadow: -20px -19px 15px rgb(0 53 120 / 28%);
        border-radius: 5px;
        background: rgb(18 22 38);
        padding: 20px;
      }
      .filter-box .card-header {
        border-bottom: none;
        font-size: 1.5rem;
        font-weight: bold;
        color: black;
      }
      .filter-box .card {
        border: none;
      }
      .filter-box input, .filter-box select {
        background: #ffffff;
        border: 1px solid #ccc;
        color: #333;
      }
    </style>
  </head>
  <body class="hold-transition login-page">
    <div class="filter-box">
      <div class="card card-outline card-warning">
        <div class="card-header text-center">
          <p class="h1"><b>Search Vehicles</b></p>
        </div>
        <div class="card-body">
          <p class="login-box-msg h4">Filter Your Search</p>

          <!-- Vehicle Type -->
          <div class="form-group mb-3">
            <label for="vehicleType" class="text-white">Vehicle Type</label>
            <select id="vehicleType" name="vehicleType" class="form-control">
              <option value="" selected>Select Vehicle Type</option>
              <option value="Car">Car</option>
              <option value="Bike">Bike</option>
            </select>
          </div>

          <!-- Brand -->
          <div class="form-group mb-3">
            <label for="brand" class="text-white">Brand</label>
            <input type="text" id="brand" name="brand" class="form-control" placeholder="Enter Brand (e.g., Toyota, Yamaha)">
          </div>

          <!-- Rental Price Range -->
          <div class="form-group mb-3">
            <label for="priceRange" class="text-white">Rental Price Range</label>
            <input type="text" id="priceRange" name="priceRange" class="form-control" placeholder="Enter Price Range (e.g., 1000-5000)">
          </div>

          <!-- Availability -->
          <div class="form-group mb-3">
            <label for="availability" class="text-white">Availability</label>
            <select id="availability" name="availability" class="form-control">
              <option value="" selected>Select Availability</option>
              <option value="available">Available</option>
              <option value="unavailable">Unavailable</option>
            </select>
          </div>

          <!-- Buttons -->
          <div class="row mt-3">
            <div class="col-6">
              <button type="reset" class="btn btn-danger btn-block">Reset</button>
            </div>
            <div class="col-6">
              <button type="submit" class="btn btn-success btn-block" onclick="searchVehicles()">Search</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    
    
  </body>
</html>
