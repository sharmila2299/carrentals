<!DOCTYPE html>
<html lang="en">
  <?php include('includes/header.php');
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
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <?php include('includes/navbar.php'); ?>
      <?php include('includes/sidebar.php'); ?>
      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-md-6">
                <h1 class="m-0">Add Booking</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="home">Home</a></li>
                  <li class="breadcrumb-item active">Add Booking</li>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <section class="content">
          <form name="addBookingForm" id="addBookingForm" autocomplete="off" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Add New Booking Details</h3>
                  </div>
                  <div class="card-body">
                    <div class="row">

                      <div class="col-6 mb-2">
                        <label for="">Booking ID</label>
                        <input type="text" id="bookingid" name="bookingid" class="form-control" value="<?php echo $bookingID ?>" readonly>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Vehicle ID</label>
                        <input type="text" id="vehicleid" name="vehicleid" class="form-control" value="<?php echo $vehicleID ?>" readonly>
                      </div>

                      <div class="col-6 mb-2">
                         <label for="date">Start Date</label>
                         <input class="form-control" type="date" name="startdate" id="startdate" min="<?php echo date('Y-m-d'); ?>">
                       </div>

                         <div class="col-6 mb-2">
                           <label for="date1">End Date</label>
                           <input class="form-control" type="date" name="enddate" id="enddate" min="<?php echo date('Y-m-d'); ?>">
                         </div>

                      <div class="col-6 mb-2">
                        <label for="">Price</label>
                        <input type="text" id="price" name="price" class="form-control" onkeypress="valid_numbers(event);" min = "1000">
                        <span class="text-danger">*Please provide the cost per day</span>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="">--select--</option>
                            <option value="approved">Approved</option>
                            <option value="reject">Reject</option>
                            <option value="cancel">Cancel</option>
                        </select>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Notification Message</label>
                        <textarea class="form-control" name="message" id="message" rows="2"></textarea>
                      </div>

                    </div>

                    <div class="row mt-4">
                      <div class="col-6">
                        <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="window.location = 'manageBooking'">
                      </div>
                      <div class="col-6">
                        <input type="submit" name="submit" value="Save" class="btn btn-success" style="float: right;">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-2"></div>
            </div>
          </form>
        </section>
      </div>
      <?php include('includes/footer.php'); ?>
      <script type="text/javascript" src="js/addBooking.js"></script>
  </body>
</html>
