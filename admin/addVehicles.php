<!DOCTYPE html>
<html lang="en">
  <?php include('includes/header.php'); ?>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <?php include('includes/navbar.php'); ?>
      <?php include('includes/sidebar.php'); ?>
      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-md-6">
                <h1 class="m-0">Add Vehicles</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="home">Home</a></li>
                  <li class="breadcrumb-item active">Add Vehicles</li>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <section class="content">
          <form name="addVehicleForm" id="addVehicleForm" autocomplete="off" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Add New Vehicles Details</h3>
                  </div>
                  <div class="card-body">
                    <div class="row">

                      <div class="col-12 mb-2">
                        <label for="">Vehicle</label>
                        <select name="type" id="type" class="form-control">
                            <option value="">----SELECT VEHICLE----</option>
                            <option value="Car">Car</option>
                            <option value="Bike">Bike</option>
                        </select>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Brand</label>
                        <input type="text" id="brand" name="brand" class="form-control" onkeypress="valid_text(event)">
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Modal</label>
                        <input type="text" id="modal" name="modal" class="form-control">
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Number Plate</label>
                        <input type="text" id="number" name="number" class="form-control">    
                    </div>

                      <div class="col-6 mb-2">
                        <label for="">Rental Price</label>
                        <input type="text" id="price" name="price" class="form-control" onkeypress="valid_numbers(event)">
                        <span class="text-danger">Please provide the cost per day</span>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Availability Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="">Select</option>
                            <option value="Available">Available</option>
                            <option value="UnAvailable">UnAvailable</option>
                        </select>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Photos</label>
                        <input type="file" name="image" class="form-control p-1" id="image" accept="image/*">
                        <br>
                        <img id="previewImg" alt="Uploaded Image Preview" width="80px" height="80px" style="display:none;">
                      </div>

                     


                    </div>

                    <div class="row mt-4">
                      <div class="col-6">
                        <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="window.location = 'manageVehicle'">
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
      <script type="text/javascript" src="js/addVehicles.js"></script>
  </body>
</html>
