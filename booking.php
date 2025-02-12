<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php include("includes/header.php") ?>
<style>
      body {
        background-color: #f4f6f9;
      }
      .profile-box {
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        padding: 20px;
        background: white;
        max-width: 500px;
        margin: 40px auto;
      }
      .profile-box .card-header {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
      }
      .form-control{
        height:auto !important;

      }
    </style>

<body>
  <!-- ======== Navbar Start ======== -->
  <?php include("includes/dashboardnav.php") ?>

  <!-- ======== Navbar End ======== -->

  <!-- ========  Booking profile======== -->
  <div class="container mt-5 mb-3">
  <div class="card card-outline card-primary">
    <div class="card-header bg-primary">Booking Form</div>
    <div class="card-body">
      <form>
        <div class="mb-3">
          <label for="startDate" class="form-label">Start Date</label>
          <input type="date" class="form-control" id="startDate" name="startDate" required>
        </div>

        <div class="mb-3">
          <label for="endDate" class="form-label">End Date</label>
          <input type="date" class="form-control" id="endDate" name="endDate" required>
        </div>

        <div class="mb-3">
          <label for="vehicleId" class="form-label">Vehicle Type</label>
          <select class="form-select" id="vehicleId" name="vehicleId" required>
            <option value="" disabled selected>Select a Vehicle</option>
            <option value="1">car</option>
            <option value="2">Bike</option>
            <option value="3">Goods Carrier</option>
            
          </select>
        </div>

        <div class="row">
        <div class="col-6">
              <a href="home.php" class="btn btn-danger btn-block">Cancel</a>
            </div>
          <div class="col-6">
            <button type="submit" class="btn btn-primary btn-block">Book</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

 

  <?php include("includes/footer.php") ?>
</body>

<script src="js/index.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
</html>
