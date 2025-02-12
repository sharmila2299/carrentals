<?php
session_start();
include_once("crudop/crud.php");
$crud = new Crud();

if (isset($_GET['vehicle_type'])) {
    $vehicle_type = $_GET['vehicle_type'] ?? 'all'; // Default to 'all' if no value is provided
    $sel_query = "";

    if ($vehicle_type === 'Cars') {
        $sel_query = "SELECT * FROM tbl_vehicles WHERE VEHICLE_TYPE = 'Car'";
    } elseif ($vehicle_type === 'Bikes') {
        $sel_query = "SELECT * FROM tbl_vehicles WHERE VEHICLE_TYPE = 'Bike'";
    } elseif ($vehicle_type === 'all') {
        $sel_query = "SELECT * FROM tbl_vehicles"; // Show all vehicles
    }

    if (!empty($sel_query)) {
        $resQry = $crud->getData($sel_query); // Get data from the database

        if ($resQry) {
            $html = '';

            foreach ($resQry as $key => $value) {
                $images = $value['PHOTOS'];
                $image = str_replace('../', '', $images); // Clean the image path
                
                // Debugging - print the image path to check if it's correct
                // echo '<pre>' . $image . '</pre>';

                // Check if image path is valid before using it
                if (file_exists('admin/' . $image)) {
                    $html .= '<div class="col-lg-4 col-md-6 col-sm-12 menu-item filter-' . $value['VEHICLE_TYPE'] . '">
                                <div class="car-wrap rounded ftco-animate">
                                    <div class="img rounded d-flex align-items-end">
                                        <img src="admin/' . $image . '" alt="Vehicle Image" class="img-fluid" style="width:100%; height:99%;">
                                    </div>
                                    <div class="text">
                                        <h2 class="mb-0"><a href="#">' . $value['BRAND'] . '</a></h2>
                                        <div class="d-flex mb-3">
                                            <span class="cat" style="font-size:15px;">' . $value['MODAL'] . '</span>
                                            <p class="price ml-auto">' . $value['RENTAL_PRICING'] . '<span>/day</span></p>
                                        </div>
                                        <p class="d-flex mb-0 d-block">
                                            <a href="#" class="btn btn-primary py-2 mr-1">Book now</a>
                                            <a href="#" class="btn btn-secondary py-2 ml-1" data-bs-toggle="modal" data-bs-target="#detailsModal">Details</a>
                                        </p>
                                    </div>
                                </div>
                            </div>';
                } else {
                    // If the image file doesn't exist, set a default image
                    $html .= '<div class="col-lg-4 col-md-6 col-sm-12 menu-item filter-' . $value['VEHICLE_TYPE'] . '">
                                <div class="car-wrap rounded ftco-animate">
                                    <div class="img rounded d-flex align-items-end">
                                        <img src="path_to_default_image/default.jpg" alt="No Image Available" class="img-fluid" style="width:100%; height:99%;">
                                    </div>
                                    <div class="text">
                                        <h2 class="mb-0"><a href="#">' . $value['BRAND'] . '</a></h2>
                                        <div class="d-flex mb-3">
                                            <span class="cat" style="font-size:15px;">' . $value['MODAL'] . '</span>
                                            <p class="price ml-auto">' . $value['RENTAL_PRICING'] . '<span>/day</span></p>
                                        </div>
                                        <p class="d-flex mb-0 d-block">
                                            <a href="#" class="btn btn-primary py-2 mr-1">Book now</a>
                                            <a href="#" class="btn btn-secondary py-2 ml-1" data-bs-toggle="modal" data-bs-target="#detailsModal">Details</a>
                                        </p>
                                    </div>
                                </div>
                            </div>';
                }
            }

            echo $html;
        } else {
            echo '<p>No vehicles found</p>';
        }
    } else {
        echo '<p>Error: Invalid query.</p>';
    }
} else {
    echo '<p>Error: Invalid action. No vehicle type selected.</p>';
}
