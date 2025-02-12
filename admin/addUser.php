<!DOCTYPE html>
<html lang="en">
  <?php include('includes/header.php'); 
  $user = ("000"); 
  $countQuery = "SELECT max(ID) as id FROM tbl_users";
  $result = $crud->getData($countQuery);
  $id = $result[0]['id'] + 1;
  $userID = "UserID" . $user . $id;?>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <?php include('includes/navbar.php'); ?>
      <?php include('includes/sidebar.php'); ?>
      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-md-6">
                <h1 class="m-0">Add User</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="home">Home</a></li>
                  <li class="breadcrumb-item active">Add User</li>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <section class="content">
          <form name="addUserForm" id="addUserForm" autocomplete="off" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Add New User Details</h3>
                  </div>
                  <div class="card-body">
                    <div class="row">
                     
                    <div class="col-12 mb-2">
                        <label for="">User ID</label>
                        <input type="text" id="userid" name="userid" class="form-control" value="<?php echo $userID ?>" readonly>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" onkeypress="valid_text(event)">
                      </div>

                      <div class="col-6 mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email">
                      </div>

                      <div class="col-6 mb-2">
                       <label for="password" class="form-label">Password</label>
                       <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                      </div>

                      <div class="col-6 mb-2">
                        <label class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phonenumber" name="phonenumber" placeholder="Phone number"  onkeypress="valid_numbers(event);" minlength="10" maxlength = "10">
                      </div>


                      <div class="col-12 mb-2">
                        <label for="">Address</label>
                        <textarea class="form-control" name="address" id="address" rows="2"></textarea>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Aadhar Image</label>
                        <input type="file" name="aadhar" class="form-control p-1" id="aadhar" accept="image/*" onclick="validateFileType()">
                        <br>
                        <img id="previewImg" alt="Uploaded Image Preview" width="80px" height="80px" style="display:none;" >
                      </div>
                        
                      <div class="col-6 mb-2">
                        <label for="">Profile Image</label>
                        <input type="file" name="profile" class="form-control p-1" id="profile" accept="image/*" onclick="validateFileType1()">
                        <br>
                        <img id="previewImg1" alt="Uploaded Image Preview" width="80px" height="80px" style="display:none;">
                      </div>


                    </div>

                    <div class="row mt-4">
                      <div class="col-6">
                        <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="window.location = 'manageUser'">
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
      <script type="text/javascript" src="js/addUser.js"></script>
  </body>
</html>
