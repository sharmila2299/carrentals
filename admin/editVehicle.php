<!DOCTYPE html>
<html lang="en">
    <?php
      include('includes/header.php');

      $randomId = $_REQUEST['randomId'] && $_REQUEST['randomId'] != '' ? $_REQUEST['randomId'] : 0;

      $Vehicle_Qry = "SELECT * FROM tbl_vehicles WHERE RANDOM_ID = '".$randomId."'";
      $Vehicle_Data = $crud->getData($Vehicle_Qry);
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
                  <h1 class="m-0">View Vehicles</h1>
                <?php } ?>
                <?php if ($_REQUEST['type'] == 'edit') { ?>
                  <h1 class="m-0">Edit SerVehiclesvice</h1>
                <?php } ?>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="home">Home</a></li>
                  <?php if ($_REQUEST['type'] == 'view') { ?>
                  <li class="breadcrumb-item active">View Vehicles</li>
                  <?php } ?>
                  <?php if ($_REQUEST['type'] == 'edit') { ?>
                  <li class="breadcrumb-item active">Edit Vehicles</li>
                  <?php } ?>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <section class="content">
          <form name="editVehicleForm" id="editVehicleForm" autocomplete="off" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <div class="card card-primary">
                  <div class="card-header">
                    <?php if ($_REQUEST['type'] == 'view') { ?>
                    <h3 class="card-title">View Vehicle Data</h3>
                    <?php } ?>
                    <?php if ($_REQUEST['type'] == 'edit') { ?>
                    <h3 class="card-title">Edit Vehicles Data</h3>
                    <?php } ?>
                  </div>
                  <div class="card-body">
                    <?php if ($_REQUEST['type'] == 'view') { ?>
                    <div class="row">

                     <div class="col-12 mb-2">
                        <label for="">Vehicle</label>
                        <input name="type" id="type" class="form-control"value="<?php echo $Vehicle_Data[0]['VEHICLE_TYPE']; ?>" Readonly>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Brand</label>
                        <input type="text" id="brand" name="brand" class="form-control" value="<?php echo $Vehicle_Data[0]['BRAND']; ?>"Readonly>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Modal</label>
                        <input type="text" id="modal" name="modal" class="form-control" value="<?php echo $Vehicle_Data[0]['MODAL']; ?>"Readonly>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Number Plate</label>
                        <input type="text" id="number" name="number" class="form-control" value="<?php echo $Vehicle_Data[0]['NUMBER_PLATE']; ?>"Readonly>    
                    </div>

                      <div class="col-6 mb-2">
                        <label for="">Rental Price</label>
                        <input type="text" id="price" name="price" class="form-control" value="<?php echo $Vehicle_Data[0]['RENTAL_PRICING']; ?>"Readonly>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Availability Status</label>
                        <input name="status" id="status" class="form-control" value="<?php echo $Vehicle_Data[0]['AVALIBILITY_STATUS']; ?>"Readonly>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Photos</label><br>
                        <img src="<?php echo str_replace('../', '', $Vehicle_Data[0]['PHOTOS']); ?>" height="100">
                      </div>
                    </div>
                    <?php } ?>

                    <?php if ($_REQUEST['type'] == 'edit') {?>
                    <div class="row">

                    <div class="col-12 mb-2">
                        <label for="">Vehicle</label>
                        <input name="type" id="type" class="form-control"value="<?php echo $Vehicle_Data[0]['VEHICLE_TYPE']; ?>">
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Brand</label>
                        <input type="text" id="brand" name="brand" class="form-control" value="<?php echo $Vehicle_Data[0]['BRAND']; ?>" onkeypress="valid_text(event)">
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Modal</label>
                        <input type="text" id="modal" name="modal" class="form-control" value="<?php echo $Vehicle_Data[0]['MODAL']; ?>">
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Number Plate</label>
                        <input type="text" id="number" name="number" class="form-control" value="<?php echo $Vehicle_Data[0]['NUMBER_PLATE']; ?>">    
                    </div>

                      <div class="col-6 mb-2">
                        <label for="">Rental Price</label>
                        <input type="text" id="price" name="price" class="form-control" value="<?php echo $Vehicle_Data[0]['RENTAL_PRICING']; ?>" onkeypress="valid_numbers(event)">
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Availability Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="">--select--</option>
                            <?php  
                            foreach ($Vehicle_Data as $key => $value) { 
                            ?>
                                <option value="Available" <?php if ($value['AVALIBILITY_STATUS'] == 'Available') { echo "selected"; } ?>>Available</option>
                                <option value="UnAvailable" <?php if ($value['AVALIBILITY_STATUS'] == 'UnAvailable') { echo "selected"; } ?>>UnAvailable</option>                            
                            <?php 
                            } 
                            ?>
                        </select>

                      </div>


                      <div class="col-6 mb-2">
                        <label for="">Photo</label>
                        <input type="file" name="image" class="form-control" id="image"><br>
                        <img id="previewImg" src="<?php echo str_replace('../', '', $Vehicle_Data[0]['PHOTOS']); ?>" height="100">
                        <input type="hidden" name="old_image" id="old_image" value="<?php echo $Vehicle_Data[0]['PHOTOS']; ?>">
                      </div>

                    </div>
                    <?php } ?>

                    <div class="row mt-4">
                      <div class="col-6">
                        <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="window.location = 'manageVehicle'">
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
      <script type="text/javascript" src="js/editVehicle.js"></script>
  </body>
</html>
