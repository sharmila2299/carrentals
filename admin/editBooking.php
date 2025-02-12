<!DOCTYPE html>
<html lang="en">
    <?php
      include('includes/header.php');

      $randomId = $_REQUEST['randomId'] && $_REQUEST['randomId'] != '' ? $_REQUEST['randomId'] : 0;

      $booking_qry  = "SELECT * FROM tbl_bookings WHERE RANDOM_ID = '".$randomId."'";
      $booking_data = $crud->getData($booking_qry);
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
                <?php if ($_REQUEST['type'] == 'view') { ?>
                  <h1 class="m-0">View Booking</h1>
                <?php } ?>
                <?php if ($_REQUEST['type'] == 'edit') { ?>
                  <h1 class="m-0">Edit Booking</h1>
                <?php } ?>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="home">Home</a></li>
                  <?php if ($_REQUEST['type'] == 'view') { ?>
                  <li class="breadcrumb-item active">View Booking</li>
                  <?php } ?>
                  <?php if ($_REQUEST['type'] == 'edit') { ?>
                  <li class="breadcrumb-item active">Edit Booking</li>
                  <?php } ?>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <section class="content">
          <form name="editBookingForm" id="editBookingForm" autocomplete="off" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <div class="card card-primary">
                  <div class="card-header">
                    <?php if ($_REQUEST['type'] == 'view') { ?>
                    <h3 class="card-title">View Bookings Data</h3>
                    <?php } ?>
                    <?php if ($_REQUEST['type'] == 'edit') { ?>
                    <h3 class="card-title">Edit Bookings Data</h3>
                    <?php } ?>
                  </div>
                  <div class="card-body">
                    <?php if ($_REQUEST['type'] == 'view') { ?>
                    <div class="row">

                      <div class="col-6 mb-2">
                        <label for="">Booking ID</label>
                        <input type="text" id="bookingid" name="bookingid" class="form-control" value="<?php echo $booking_data[0]['BOOKING_ID']; ?>" readonly>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Vehicle ID</label>
                        <input type="text" id="vehicleid" name="vehicleid" class="form-control" value="<?php echo $booking_data[0]['VEHICLE_ID']; ?>" readonly>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Start Date</label>
                        <input type="text" id="startdate" name="startdate" class="form-control" value="<?php echo $booking_data[0]['START_DATE']; ?>" readonly>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">End Date</label>
                        <input type="text" id="enddate" name="enddate" class="form-control" value="<?php echo $booking_data[0]['END_DATE']; ?>" readonly>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Price</label>
                        <input type="text" id="price" name="price" class="form-control" value="<?php echo $booking_data[0]['PRICE']; ?>" readonly>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Status</label>
                        <input type="text" id="status" name="status" class="form-control" value="<?php echo $booking_data[0]['STATUS']; ?>" readonly>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Notification Message</label>
                        <textarea class="form-control" name="message" id="message" rows="4" readonly><?php echo $booking_data[0]['NOTIFICATION']?></textarea>
                      </div>

                    </div>
                    <?php } ?>

                    <?php if ($_REQUEST['type'] == 'edit') {?>
                    <div class="row">

                    <div class="col-6 mb-2">
                        <label for="">Booking ID</label>
                        <input type="text" id="bookingid" name="bookingid" class="form-control" value="<?php echo $booking_data[0]['BOOKING_ID']; ?>" readonly>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Vehicle ID</label>
                        <input type="text" id="vehicleid" name="vehicleid" class="form-control" value="<?php echo $booking_data[0]['VEHICLE_ID']; ?>" readonly>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Start Date</label>
                        <input type="text" id="startdate" name="startdate" class="form-control" value="<?php echo $booking_data[0]['START_DATE']; ?>" >
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">End Date</label>
                        <input type="text" id="enddate" name="enddate" class="form-control" value="<?php echo $booking_data[0]['END_DATE']; ?>" >
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Price</label>
                        <input type="text" id="price" name="price" class="form-control" min="1000" value="<?php echo $booking_data[0]['PRICE']; ?>" >
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="">--select--</option>
                            <?php  foreach ($booking_data as $key => $value) { ?>
                            <option value="approved" <?php if($value['STATUS'] == 'approved') {echo "selected='selected'";}?>>Approved</option>
                            <option value="reject" <?php if($value['STATUS'] == 'reject') {echo "selected='selected'";}?>>Reject</option>
                            <option value="cancel" <?php if($value['STATUS'] == 'cancel') {echo "selected='selected'";}?>>Cancel</option>
                            <?php } ?>
                          </select>
                      </div>
                      

                      <div class="col-12 mb-2">
                        <label for="">Notification Message</label>
                        <textarea class="form-control" name="message" id="message" rows="4" ><?php echo $booking_data[0]['NOTIFICATION']?></textarea>
                      </div>

                      

                    </div>
                    <?php } ?>

                    <div class="row mt-4">
                      <div class="col-6">
                        <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="window.location = 'manageBooking'">
                      </div>
                      <div class="col-6">
                        <?php if($_REQUEST['type'] == 'edit'){ ?>
                        <input type="hidden" name="hdn_id" id="hdn_id" value="<?php echo $randomId; ?>">
                        <input type="submit" name="submit" value="Update" class="btn btn-success" style="float: right;">
                        <?php } ?>
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
      <script type="text/javascript" src="js/editBooking.js"></script>
  </body>
</html>
