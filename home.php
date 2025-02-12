<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php
include("includes/header.php");

 $selbrand = "SELECT * from tbl_vehicles GROUP BY BRAND";
 $resbrand = $crud->getData($selbrand);

 $vehicle_type = $_GET['vehicle_type'] ?? 'all';
 $rand   = $_REQUEST['rand'] ?? '';
 $modal  = $_REQUEST['modal'] ?? '' ;
 $search = $_REQUEST['search'] ?? '' ;

 $where = "";
  if($vehicle_type == "all" && !empty($rand) && !empty($modal)){
      $where = "WHERE BRAND = '" .$rand . "'AND MODAL = '" .$modal . "'";
  } elseif($vehicle_type == "Cars" && !empty($rand) && !empty($modal)){
      $where = "WHERE VEHICLE_TYPE = 'Car' AND BRAND = '" .$rand . "' AND MODAL = '".$modal."'";
  } elseif ($vehicle_type == "Bikes" && !empty($rand) && !empty($modal)){
      $where = "WHERE VEHICLE_TYPE = 'Bike' AND BRAND = '" .$rand . "' AND MODAL = '".$modal."'";
  } elseif ($vehicle_type == "Cars" && !empty($rand)) {
      $where = "WHERE VEHICLE_TYPE = 'Car' AND BRAND = '" .$rand . "'";
  } elseif ($vehicle_type == "Bikes" && !empty($rand)) {
      $where = "WHERE VEHICLE_TYPE = 'Bike' AND BRAND = '" .$rand . "'";
  } elseif ($vehicle_type == "all" && !empty($rand)) {
      $where = "WHERE BRAND = '" .$rand . "'";
  } elseif($vehicle_type == "all" && !empty($search)){
     $where = "WHERE  BRAND LIKE '%".$search."' OR MODAL LIKE '%".$search."'";
  } elseif($vehicle_type == "Cars" && !empty($search)){
    $where = "WHERE VEHICLE_TYPE = 'Car' AND BRAND LIKE '%".$search."' OR MODAL LIKE '%".$search."'";
  }elseif($vehicle_type == "Bikes" && !empty($search)){
    $where = "WHERE VEHICLE_TYPE = 'Bike' AND BRAND LIKE '%".$search."' OR MODAL LIKE '%".$search."'";
  } elseif ($vehicle_type == "Cars") {
      $where = "WHERE VEHICLE_TYPE = 'Car'";
  } elseif ($vehicle_type == "Bikes") {
      $where = "WHERE VEHICLE_TYPE = 'Bike'";
  }
    $sel_querry = "SELECT * FROM tbl_vehicles $where";
    $resQry     = $crud->getData($sel_querry);
?>


 <style>
 
  body {
    margin: 0;
    font-family: Arial, sans-serif;
  }

  #menu-flters {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding: 0;
    list-style: none;
  }

  #menu-flters li {
    cursor: pointer;
    margin: 5px 10px;
    padding: 8px 15px;
    background-color: #f8f9fa;
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
    padding: 15px 35px;
    background: #db2d2e;
    border: none;
    border-radius: 2px;
  }

  .slide-content {
    background: #023b6d;
    color: #fff;
    padding: 10px 0;
    font-weight: bold;
  }

  .breakingNews {
    display: flex;
    align-items: center;
  }

  .bn-title {
    display: inline-flex;
    align-items: center;
    font-size: 20px;
  }

  .bn-title h2 {
    margin: 0;
    color: red;
    font-size: 22px;
    font-weight: bold;
    animation: blink 1.5s step-start infinite;
  }

  @keyframes blink {
    50% {
      opacity: 0;
    }
  }

  .marquee-container {
    font-size: 16px;
    display: flex;
    align-items: center;
  }

  .marquee-container i {
    color: #ffff9e;
    margin: 0 10px;
    font-size: 18px;
  }

  marquee {
    width: 100%;
    color: #fff;
  }

 
  @media (max-width: 992px) {
    .bn-title {
      justify-content: center;
      font-size: 18px;
    }

    marquee {
      font-size: 14px;
    }

    .car-wrap img {
      max-height: 180px;
    }

    #menu-flters {
      justify-content: space-evenly;
    }
  }

  @media (max-width: 768px) {
    .marquee-container {
      font-size: 14px;
    }

    .car-wrap {
      margin-bottom: 20px;
    }

    .modal-dialog {
      max-width: 95%;
    }

    .modal-body input {
      font-size: 14px;
    }

    .site-btn {
      font-size: 14px;
      padding: 10px 20px;
    }

    #menu-flters {
      display: grid;
      gap: 10px;
    }
  }

  @media (max-width: 576px) {
    #menu-flters {
      gap: 5px;
    }

    .bn-title h2 {
      font-size: 18px;
    }

    .site-btn {
      font-size: 12px;
      padding: 8px 18px;
    }

    .modal-dialog {
      max-width: 90%;
    }

    marquee {
      font-size: 12px;
    }

    .car-wrap img {
      max-height: 150px;
    }

    .form-control {
      font-size: 14px;
    }
  }
</style>



<body>
  <!-- ======== Navbar Start ======== -->
  <?php include("includes/dashboardnav.php") ?>

  <!-- ======== Navbar End ======== -->

  

  <section class="slide-content">
    <div class="container-fluid">
      <div class="row align-items-center">
        
        <div class="col-12 col-sm-1">
          <div class="breakingNews bn-bordernone bn-red">
            <div class="bn-title">
              <h2> Book!</h2>
            </div>
          </div>
        </div>

        
        <div class="col-12 col-sm-11 marquee-container">
        <marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="7">
            <span>
              <i class="fa fa-car"></i> <!-- Font Awesome car icon -->
              <i class="fa fa-hand-o-right"></i>
              "Exciting Offers on Car & Bike Rentals! Book now and enjoy exclusive discounts on daily, weekly, and monthly rentals. Limited time only!"
            </span>
          </marquee>

        </div>

       
        <div class="col-12 col-sm-2 text-end"></div>
      </div>
    </div>
  </section>
  
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
                        <li class="<?php echo $vehicle_type == 'all' ? 'filter-active' : ''; ?>">
                            <a href="?vehicle_type=all<?php echo !empty($rand) ? '&rand=' . urlencode($rand) : '' ; ?><?php echo !empty($modal) ? '&modal=' . urlencode($modal) : '' ; ?><?php echo !empty($search) ? '&search=' . urlencode($search) : '' ; ?>">Show All</a>
                        </li>
                        <li class="<?php echo $vehicle_type == 'Cars' ? 'filter-active' : ''; ?>">
                            <a href="?vehicle_type=Cars<?php echo !empty($rand) ? '&rand=' . urlencode($rand) : ''; ?><?php echo !empty($modal) ? '&modal=' . urlencode($modal) : '' ; ?><?php echo !empty($search) ? '&search=' . urlencode($search) : '' ; ?>">Cars</a>
                        </li>
                        <li class="<?php echo $vehicle_type == 'Bikes' ? 'filter-active' : ''; ?>">
                            <a href="?vehicle_type=Bikes<?php echo !empty($rand) ? '&rand=' . urlencode($rand) : ''; ?><?php echo !empty($modal) ? '&modal=' . urlencode($modal) : '' ; ?><?php echo !empty($search) ? '&search=' . urlencode($search) : '' ; ?>">Bikes</a>
                        </li>
                    </ul>

                    </div>
                </div>
            </div>
        </div>

        
        <div class="row menu-container" style="overflow-x: auto; white-space: nowrap;">
            <div class="col-md-3">
                <div  style = "background-color:#F1F1F1;padding-right : 10px; padding-left : 20px; padding-top:20px;padding-bottom:20px; ">
                     <div class="mb-5">
                        <h4>Car search</h4>
                         <input type="text" placeholder="Search.." name="search" style="padding:10px; width:180px;" />
                           <button type="button" onclick="search()">
                            <i class="fa fa-search" style="font-size:18px;margin-top:8px; margin-bottom:9px; padding:3px"></i>
                          </button>
                    </div>
                    <div style ="margin-right : 20px;">
                        <h4 class="mt-2" >Car Filter</h4>
                        
                        <select name="brand" id="brand" class="form-control mt-2" onchange="updateBrand(this.value)">

                            <option value="">Select Brand</option>
                            <?php
                            // PHP code to populate brands
                            foreach ($resbrand as $key => $value) {
                                echo "<option value='{$value['BRAND']}'>{$value['BRAND']}</option>";
                            }
                            ?>
                          </select>
                        
                        <select name="" id="" class="form-control mt-2" onchange="modal(this.value)">
                            <option data-display="Model">Select Model</option>
                            <?php
                               foreach ($resbrand as $key => $value) {
                               echo "<option value='{$value['MODAL']}'>{$value['MODAL']}</option>";
                               }
                           ?>
                        </select>
                        
                    </div>
                    <!-- <label for="customRange1" class="form-label text-center mt-4 mb-1 ml-5">Rental Pricing</label> <br>
                     <input type="range" class=" mt-2 form-control" id="customRange1" ><br>
                     <button type="reset" class="site-btn ml-4">Reset FIlter</button> -->

                </div>

            </div>
            <div class="col-md-9">
                <div class="row">
                    <?php foreach ($resQry as $key => $value) { 
                        $images = $value['PHOTOS'];
                        $image = str_replace('../', '', $images);
                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 menu-item filter-cars">
                        <div class="car-wrap rounded ftco-animate">
                            <div class="img rounded d-flex align-items-end">
                                <img src="admin/<?php echo $image; ?>" alt="Car Image" class="img-fluid" style=" width:100%; height :99%;">
                            </div>
                            <div class="text">
                                <h2 class="mb-0"><a href="#"><?php echo $value['BRAND']; ?></a></h2>
                                <div class="d-flex mb-3">
                                    <span class="cat" style="font-size:15px;"><?php echo $value['MODAL']; ?></span>
                                    <p class="price ml-auto"><?php echo $value['RENTAL_PRICING']; ?><span>/day</span></p>
                                </div>
                                <p class="d-flex mb-0 d-block">
                                    <a href="Book" class="btn btn-primary py-2 mr-1">Book now</a>
                                    <a href="#" class="btn btn-secondary py-2 ml-1" data-bs-toggle="modal" data-bs-target="#detailsModal" onclick="modaldetails('<?php echo $value['ID'] ?>')">Details</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
           </div>

         


           <div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 shadow-lg">
            <div class="modal-header bg-primary text-white rounded-top">
                <h5 class="modal-title fw-bold" id="detailsModalLabel">Car Details</h5>
                <button type="button" class="btn text-white p-0" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-circle fs-4"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <label for="">Brand</label>
                            <input type="text" id="brand1" name="brand1" class="form-control" readonly>
                        </div>
                        <div class="col-12 mb-2">
                            <label for="">Model</label>
                            <input type="text" id="modal" name="modal" class="form-control" readonly>
                        </div>
                        <div class="col-12 mb-2">
                            <label for="">Rental Price</label>
                            <input type="text" id="price" name="price" class="form-control" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-danger shadow" data-bs-dismiss="modal">Close</button>
            </div>
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
</html>