<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php include("includes/header.php");
$booking = ("000"); 
$countQuery = "SELECT max(ID) as id FROM tbl_bookings";
$result = $crud->getData($countQuery);
$id = $result[0]['id'] + 1;
$bookingID = "BookingID" . $booking . $id;

$vehicle = ("000"); 
$countQuery = "SELECT max(ID) as id FROM tbl_bookings";
$result = $crud->getData($countQuery);
$id = $result[0]['id'] + 1;
$vehicleID = "VehicleID" . $vehicle . $id;


?>
<style>
 body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background: linear-gradient(135deg, #1a1a1a, #4e4e4e, #1a1a1a); 
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
}

@media (max-width: 768px) {
    body {
        background: linear-gradient(135deg, #1a1a1a, #333, #1a1a1a); 
        background-size: auto; 
        background-position: top center; 
    }
}

@media (max-width: 480px) {
    body {
        background: linear-gradient(to bottom, #1a1a1a, #4e4e4e); 
        background-attachment: fixed; 
    }
}

.right-aligned-container {
    display: flex;
    justify-content: space-between;
    padding: 20px;
    gap: 20px;
    flex-wrap: wrap;
    justify-content: center; 
    /* margin-top:20px; */
}

.booking-card {
    background: white;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
    padding: 20px;
    width: 100%; 
    max-width: 600px; 
    overflow: hidden;
    transition: transform 0.3s, box-shadow 0.3s;
    
}

.booking-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
}

.booking-header {
    font-size: 20px;
    font-weight: bold;
    color: #fff;
    background: linear-gradient(45deg, #4CAF50, #2196F3);
    padding: 15px;
    text-align: center;
    border-radius: 10px 10px 0 0;
}

.form-group {
    margin-bottom: 15px;
}

.form-label {
    font-weight: bold;
    color: #555;
    margin-bottom: 5px;
    display: block;
}

.form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
    color: #333;
}

.form-control:focus {
    box-shadow: 0 0 10px rgba(33, 150, 243, 0.5);
    border-color: #2196F3;
}

.action-buttons {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.btn {
    font-size: 16px;
    padding: 10px 15px;
    border-radius: 5px;
    width: 48%;
    text-align: center;
    cursor: pointer;
    text-decoration: none;
    transition: background-color 0.3s, box-shadow 0.3s;
}

.btn-primary {
    background-color: #2196F3;
    color: white;
    border: none;
}

.btn-primary:hover {
    background-color: #1769aa;
    box-shadow: 0 4px 10px rgba(33, 150, 243, 0.4);
}

.btn-danger {
    background-color: #f44336;
    color: white;
    border: none;
}

.btn-danger:hover {
    background-color: #c62828;
    box-shadow: 0 4px 10px rgba(244, 67, 54, 0.4);
}

</style>

<body>
  <!-- ======== Navbar Start ======== -->
  <?php include("includes/dashboardnav.php") ?>
  <!-- ======== Navbar End ======== -->

  <!-- ======== Booking Form Card ======== -->
  <div class="right-aligned-container ">
    <div class="booking-card">
      <div class="booking-header">Booking Details</div>
      <div class="booking-body">
        <form>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="bookingId" class="form-label">Booking ID</label>
                <input type="text" id="bookingId" name="bookingId" class="form-control"   value="<?php echo $bookingID ?>" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="vehicleId" class="form-label">Vehicle ID</label>
                <input type="text" id="vehicleId" name="vehicleId" class="form-control"  value="<?php echo $vehicleID ?>" readonly>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="price" class="form-label">Price</label>
                <input type="number" id="price" name="price" class="form-control" placeholder="Enter Price" onkeypress="valid_numbers(event);" min = "1000" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="startDate" class="form-label">Start Date</label>
                <input type="date" id="startdate" name="startdate" class="form-control" min="<?php echo date('Y-m-d');?>" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="endDate" class="form-label">End Date</label>
                <input type="date" id="enddate" name="enddate" class="form-control" min="<?php echo date('Y-m-d');?>" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="status" class="form-label">Status</label>
                <select id="status" name="status" class="form-control" required>
                  <option value="" disabled selected>Select Status</option>
                            <option value="approved">Approved</option>
                            <option value="reject">Reject</option>
                            <option value="cancel">Cancel</option>
                </select>
              </div>
            </div>
          </div>

          <div class="action-buttons">
            <input type="button" class="btn btn-danger" value="Cancel" onclick="location.href='home.php';">
            <input type="button" class="btn btn-success" value="Book" onclick="book(event)">
          </div>
        </form >
      </div>
    </div>
  </div>
</div>

  <?php include("includes/footer.php") ?>
</body>

<script src="js/Booking.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
</html>