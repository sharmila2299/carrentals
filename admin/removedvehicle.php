<!DOCTYPE html>
<html lang="en">
  <?php include('includes/header.php'); 
  $rev_qry = "SELECT * FROM tbl_vehicles WHERE DELETE_STATUS = 0;";
  $rev_data = $crud->getData($rev_qry);?>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <?php include('includes/navbar.php'); ?>
      <?php include('includes/sidebar.php'); ?>
      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Removed Vehicles</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="home">Home</a></li>
                  <li class="breadcrumb-item active">Removed Vehicles</li>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class = "col-12">
                <div class = "card">
                  <div class="card-header" style="background: #007bff;color: #fff;padding: 5px 15px;">
                    <div class = "row">
                      <div class = "col-6">
                        <h3 style="line-height: 20px;" class="card-title p-2">Removed Vehicles Data</h3>
                      </div>
                      
                    </div>
                  </div>
                     
                  <div class="card-body">
                    <div class = row>
                      <div class = "col-12 table-responsive">

                        <table width="100%" align="center" id="RemoveTable" class="table table-striped">
                          <thead>
                            <tr>
                              <th align="center">S.No</th>
                              <th>Vehicle Type</th>
                              <th>Brand</th>
                              <th>Number Plate</th>
                              <th>Rental Pricing</th>
                              <th>Image</th>
                              <th align="center">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $i=1; foreach ($rev_data as $data) { ?>
                              <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $data['VEHICLE_TYPE'] ;?></td>
                                <td><?php echo $data['BRAND']; ?></td>
                                <td><?php echo $data['NUMBER_PLATE'] ;?></td>
                                <td><?php echo $data['RENTAL_PRICING'] ;?></td>
                                <td><img src="<?php echo str_replace('../', '', $data['PHOTOS']); ?>" height="100"> </td>
                                 <td><a href=""><i class="fa-solid fa-pen mt-3 text-info" onclick = "RemoveAccount(<?php echo $data['ID'] ?>);" ></i></a></td>
                              </tr>  
                            <?php $i++; } ?>
                          </tbody>
                        </table>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <?php include('includes/footer.php'); ?>
      <script>
    var table = $('#RemoveTable').DataTable({
    "processing": true,
    "serverSide": false,
    "pagingType": "full_numbers",
    "ordering": false
    });
    
    

    function RemoveAccount(id) {
    let check = confirm('Are You Sure You want To Restore ?');
    if(check) {
    $.ajax({
      url  : "actions/Vehicles",
      type : "post",
      data : { 'id' : id, 'action' : 'restore' },
      success: function(data) {
        if(data == 'true') {
          toastr.success('Restored Successfully...!');
          setTimeout(function(){
            loadData();
          },1000);
        }
      }
    });
  }
  return false;
}

</script>
  </body>
</html>
