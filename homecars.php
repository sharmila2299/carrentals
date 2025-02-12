<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php include("includes/header.php");

// $selQry = "SELECT * FROM tbl_vehicles ";
// $resQry =$crud->getData($selQry);

$selbrand = "SELECT * from tbl_vehicles group by BRAND ";
$resbrand = $crud->getData($selbrand);

// $vehicle_type = $_GET['vehicle_type'] ?? 'all';

// if ($vehicle_type == 'Cars') {
//     $sel_querry = "SELECT * FROM tbl_vehicles WHERE VEHICLE_TYPE = 'Car'";
// } elseif ($vehicle_type == 'Bikes') {
//     $sel_querry = "SELECT * FROM tbl_vehicles WHERE VEHICLE_TYPE = 'Bike'";
// } else {
//     $sel_querry = "SELECT * FROM tbl_vehicles";
// }

// $resQry = $crud->getData($sel_querry);

?>
<style>
  #menu-flters li {
    cursor: pointer;
    margin: 0 10px;
    padding: 5px 15px;
    background-color: #f8f9fa;
    /* color:white; */
    border-radius: 5px;
    
}

#menu-flters li.filter-active {
    background-color: lightblue;
    color: #fff !important;
    font-weight: bold;
    
}
.site-btn {
	font-size: 15px;
	color: #ffffff;
	font-weight: 700;
	display: inline-block;
	padding: 15px 35px 12px 38px;
	background: #db2d2e;
	border: none;
	border-radius: 2px;
}

</style>

<body>
  <!-- ======== Navbar Start ======== -->
  <?php include("includes/dashboardnav.php") ?>

  <!-- ======== Navbar End ======== -->

  <!-- ======== SERVICES ======== -->
  
  <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
            <div class="col-md-12 text-center ftco-animate">
                <h1 class="mb-3 bread text-white">Welcome to Spondias Rental's</h1>
                <p class="breadcrumbs">
                    <span><a href="home" class="text-white">Home <i class="ion-ios-arrow-forward"></i></a></span> 
                    <span><a href="#rent" class="text-white">pricing <i class="ion-ios-arrow-forward"></i></a></span> 
                </p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt bg-light" id="car">
      <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading mt-5">What we offer</span>
                <h2 class="mb-2 ">Featured Vehicles</h2>
                <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="menu-flters" class="d-flex">
                        <li class="<?php echo $vehicle_type == 'all' ? 'filter-active' : ''; ?>" data-filter="all">
                            <a href="javascript:void(0)">Show All</a>
                        </li>
                        <li class="<?php echo $vehicle_type == 'Cars' ? 'filter-active' : ''; ?>" data-filter="Cars">
                            <a href="javascript:void(0)">Cars</a>
                        </li>
                        <li class="<?php echo $vehicle_type == 'Bikes' ? 'filter-active' : ''; ?>" data-filter="Bikes">
                            <a href="javascript:void(0)">Bikes</a>
                        </li>
                    </ul>
                </div>
                </div>
            </div>
        </div>

        <!-- Horizontal Scrolling Container -->
        <div class="row menu-container" style="overflow-x: auto; white-space: nowrap;">
    <!-- Left Sidebar for Car Search and Filters -->
    <div class="col-md-3">
        <div style="background-color: #F1F1F1; padding-right: 10px; padding-left: 20px; padding-top: 20px; padding-bottom: 20px;">
            <div class="mb-5">
                <h4>Car Search</h4>
                <input type="text" placeholder="Search.." name="search" style="padding: 10px;">
                <button type="submit"><i class="fa fa-search" style="font-size: 18px; margin-top: 8px; margin-bottom: 9px; padding: 2px;"></i></button>
            </div>
            <div style="margin-right: 20px;">
                <h4 class="mt-2">Car Filter</h4>

                <!-- Car Filters -->
                <select name="" id="" class="form-control mt-2">
                    <option value="selectbrand">Select Brand</option>
                    <?php foreach ($resbrand as $key => $value) { ?>
                    <option value="<?php echo $value['ID']; ?>"><?php echo $value['BRAND']; ?></option>
                    <?php } ?>
                </select>

                <select name="" id="" class="form-control mt-2">
                    <option data-display="Model">Select Model</option>
                    <?php foreach ($resbrand as $key => $value) { ?>
                    <option value="<?php echo $value['ID']; ?>"><?php echo $value['MODAL']; ?></option>
                    <?php } ?>
                </select>

                <select name="" id="" class="form-control mt-2">
                    <option value="">Body Style</option>
                    <option value="">Option 1</option>
                    <option value="">Option 2</option>
                </select>

                <select name="" id="" class="form-control mt-2">
                    <option value="">Condition</option>
                    <option value="">First Hand</option>
                    <option value="">Second Hand</option>
                </select>

                <select name="" id="" class="form-control mt-2">
                    <option value="">Transmission</option>
                    <option value="">Bluetooth</option>
                    <option value="">WiFi</option>
                </select>

                <select name="" id="" class="form-control mt-2">
                    <option value="">Mileage</option>
                    <option value="">27</option>
                    <option value="">20</option>
                    <option value="">15</option>
                    <option value="">10</option>
                </select>

                <select name="" id="" class="form-control mt-2">
                    <option value="">Engine</option>
                    <option value="">BS3</option>
                    <option value="">BS4</option>
                    <option value="">BS5</option>
                    <option value="">BS6</option>
                </select>

                <select name="" id="" class="form-control mt-2">
                    <option value="">Colors</option>
                    <option value="">Red</option>
                    <option value="">Blue</option>
                    <option value="">Black</option>
                    <option value="">Yellow</option>
                </select>
            </div>

            <!-- Rental Pricing Range -->
            <label for="customRange1" class="form-label text-center mt-3 mb-3 ml-5">Rental Pricing</label>
            <br>
            <input type="range" class="form-range text-center mt-3 mb-2 ml-3 px-4" id="customRange1" min="500" max="10000">
            <br>
            <button type="submit" class="site-btn ml-4 mt-3">Reset Filter</button>
        </div>
    </div>

    <!-- Right Sidebar for Vehicle Listing -->
    <div class="col-md-9">
    <div class="row" id="vehicleListing"></div>
    </div>

    <!-- Modal for Car Details -->
    <div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailsModalLabel">Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <label for="brand">Brand</label>
                            <input type="text" id="brand" name="brand" class="form-control">
                        </div>

                        <div class="col-12 mb-2">
                            <label for="modal">Model</label>
                            <input type="text" id="modal" name="modal" class="form-control">
                        </div>

                        <div class="col-12 mb-2">
                            <label for="price">Rental Price</label>
                            <input type="text" id="price" name="price" class="form-control">
                        </div>

                        <div class="col-12">
                            <label for="photos">Photos</label>
                            <!-- Assuming you'd add photo inputs or a gallery here -->
                            <input type="file" id="photos" name="photos" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>
</section>


  <?php include("includes/footer.php") ?>
</body>

<script src="js/index.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    $(document).ready(function() {
    $('#menu-flters li').on('click', function() {
        var filter = $(this).data('filter'); 
        $('#menu-flters li').removeClass('filter-active'); 
        $(this).addClass('filter-active'); 

        $.ajax({
    url: 'getData.php',
    method: 'GET',
    data: { vehicle_type: filter },
    dataType: 'html',  // Force it to treat the response as HTML
    success: function(response) {
        console.log("Response received from server:", response);
        if (response) {
            $('#vehicleListing').html(response);
        } else {
            $('#vehicleListing').html('<p>No vehicles found</p>');
        }
    },
    error: function(xhr, status, error) {
        console.log("AJAX Error:", status, error);
        alert('Error fetching data');
    }
});

    });
});



</script>

</html>
