<!DOCTYPE html>
<html lang="en">
    <?php
      include('includes/header.php');

      $randomId = $_REQUEST['randomId'] && $_REQUEST['randomId'] != '' ? $_REQUEST['randomId'] : 0;

      $user_qry = "SELECT * FROM tbl_users WHERE RANDOM_ID = '".$randomId."'";
      $user_data = $crud->getData($user_qry);
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
                  <h1 class="m-0">View User</h1>
                <?php } ?>
                <?php if ($_REQUEST['type'] == 'edit') { ?>
                  <h1 class="m-0">Edit User</h1>
                <?php } ?>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="home">Home</a></li>
                  <?php if ($_REQUEST['type'] == 'view') { ?>
                  <li class="breadcrumb-item active">View User</li>
                  <?php } ?>
                  <?php if ($_REQUEST['type'] == 'edit') { ?>
                  <li class="breadcrumb-item active">Edit User</li>
                  <?php } ?>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <section class="content">
          <form name="editUserForm" id="editUserForm" autocomplete="off" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <div class="card card-primary">
                  <div class="card-header">
                    <?php if ($_REQUEST['type'] == 'view') { ?>
                    <h3 class="card-title">View Users Data</h3>
                    <?php } ?>
                    <?php if ($_REQUEST['type'] == 'edit') { ?>
                    <h3 class="card-title">Edit Users Data</h3>
                    <?php } ?>
                  </div>
                  <div class="card-body">
                    <?php if ($_REQUEST['type'] == 'view') { ?>
                    <div class="row">

                    <div class="col-12 mb-2">
                        <label for="">User ID</label>
                        <input type="text" id="userid" name="userid" class="form-control" value="<?php echo $user_data[0]['USER_ID']; ?>" readonly>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" value="<?php echo $user_data[0]['NAME']; ?>" readonly>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email" value="<?php echo $user_data[0]['EMAIL']; ?>" readonly>
                      </div>

                      <div class="col-6 mb-2">
                       <label for="password" class="form-label">Password</label>
                       <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo $user_data[0]['PASSWORD']; ?>" readonly>
                      </div>

                      <div class="col-6 mb-2">
                        <label class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phonenumber" name="phonenumber" placeholder="Phone number"  value="<?php echo $user_data[0]['PHONE_NUMBER']; ?>" readonly>
                      </div>


                      <div class="col-12 mb-2">
                        <label for="">Address</label>
                        <textarea class="form-control" name="address" id="address" rows="2" readonly><?php echo $user_data[0]['ADDRESS']; ?></textarea>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Aadhar Image</label><br>
                        <img src="<?php echo str_replace('../', '', $user_data[0]['AADHAR_PHOTO']); ?>" height="100">
                      </div>
                        
                      <div class="col-6 mb-2">
                        <label for="">Profile Image</label><br>
                        <img src="<?php echo str_replace('../', '', $user_data[0]['PROFILE_PHOTO']); ?>" height="100">
                      </div>
                    </div>
                    <?php } ?>

                    <?php if ($_REQUEST['type'] == 'edit') {?>
                    <div class="row">

                    <div class="col-12 mb-2">
                        <label for="">User ID</label>
                        <input type="text" id="userid" name="userid" class="form-control" value="<?php echo $user_data[0]['USER_ID']; ?>" readonly>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" value="<?php echo $user_data[0]['NAME']; ?>" onkeypress="valid_text(event)" >
                      </div>

                      <div class="col-6 mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email" value="<?php echo $user_data[0]['EMAIL']; ?>" >
                      </div>

                      <div class="col-6 mb-2">
                       <label for="password" class="form-label">Password</label>
                       <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo $user_data[0]['PASSWORD']; ?>" >
                      </div>

                      <div class="col-6 mb-2">
                        <label class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phonenumber" name="phonenumber" placeholder="Phone number"  value="<?php echo $user_data[0]['PHONE_NUMBER']; ?>" >
                      </div>


                      <div class="col-12 mb-2">
                        <label for="">Address</label>
                        <textarea class="form-control" name="address" id="address" rows="2" ><?php echo $user_data[0]['ADDRESS']; ?></textarea>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Aadhar Image</label><br>
                        <input type="file" name="aadhar" class="form-control p-1" id="aadhar" accept="image/*" onclick="validateFileType()">
                        <img id="previewImg" src="<?php echo str_replace('../', '', $user_data[0]['AADHAR_PHOTO']); ?>" height="100">
                        <input type="hidden" name="old_image" id="old_image" value="<?php echo $user_data[0]['AADHAR_PHOTO']; ?>">
                      </div>
                        
                      <div class="col-6 mb-2">
                        <label for="">Profile Image</label><br>
                        <input type="file" name="profile" class="form-control p-1" id="profile" accept="image/*" onclick="validateFileType1()">
                        <img id="previewImg1" src="<?php echo str_replace('../', '', $user_data[0]['PROFILE_PHOTO']); ?>" height="100">
                        <input type="hidden" name="old_image1" id="old_image1" value="<?php echo $user_data[0]['PROFILE_PHOTO']; ?>">
                      </div>

                    </div>
                    <?php } ?>

                    <div class="row mt-4">
                      <div class="col-6">
                        <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="window.location = 'manageUser'">
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
      <script type="text/javascript" src="js/editUser.js"></script>
  </body>
</html>
