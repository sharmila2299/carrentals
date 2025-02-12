<?php 
session_start();
include_once("../crudop/crud.php");
$crud = new Crud();
$tableName = 'tbl_bookings';

extract($_POST);
$bookingid   = isset($bookingId) ? $bookingId :'';
$vehicleid   = isset($vehicleId) ? $vehicleId :'';
$startdate   = isset($startdate) ? $startdate :'';
$enddate     = isset($enddate) ? $enddate :'';
$price       = isset($price) ? $price :'';
$status      = isset($status) ? $status :'';
$message     = isset($message) ? $message : '';

$hdn_id      = isset($hdn_id) ? $hdn_id : '';

$randomId  = uniqid(substr(0, 10));


/*--------------------------------------------------------------
                        Display Data
--------------------------------------------------------------*/
if(isset($_POST['action']) && $_POST['action'] == 'show') {

    $booking_qry = "SELECT * FROM ".$tableName."";
    $booking_data = $crud->getData($booking_qry);

    $response = array(
        "draw" => 1,
        "recordsTotal" => count($booking_data),
        "data" => $booking_data
    );

    echo json_encode($response);
}

/*--------------------------------------------------------------
                        Save Data
--------------------------------------------------------------*/
if(isset($_POST['action']) && $_POST['action'] == 'save') {

     $booking_qry = "INSERT INTO ".$tableName." SET BOOKING_ID = '".$bookingid."', VEHICLE_ID = '".$vehicleid."',START_DATE = '".$startdate."', END_DATE = '".$enddate."',PRICE = '".$price."', STATUS = '".$status."', NOTIFICATION = '".$message."', RANDOM_ID = '".$randomId."'";

    $booking_data = $crud->execute($booking_qry);

    if ($booking_data) {
        echo 'true';
    } else {
        echo 'false';
    }
}

/*--------------------------------------------------------------
                        Update Data
--------------------------------------------------------------*/
if(isset($_POST['action']) && $_POST['action'] == 'update') {

    $booking_qry = "UPDATE ".$tableName." SET  BOOKING_ID = '".$bookingid."', VEHICLE_ID = '".$vehicleid."',START_DATE = '".$startdate."', END_DATE = '".$enddate."',PRICE = '".$price."', STATUS = '".$status."', NOTIFICATION = '".$message."' WHERE RANDOM_ID = '".$hdn_id."'";
   
    $booking_data = $crud->execute($booking_qry);

    if ($booking_data) {
        echo 'true';
    } else {
        echo 'false';
    }
}

/*--------------------------------------------------------------
                        Delete Data
--------------------------------------------------------------*/
if(isset($_POST['action']) && $_POST['action'] == 'delete') {

    $id        = $_POST['id'];
    $imagePath = $_POST['image'];

    $RemovedImage = false;
    if (file_exists($imagePath)) {
        $RemovedImage = unlink($imagePath);
    }

    $Del_Contact = "DELETE FROM ".$tableName." WHERE ID = '".$id."'";
    $Del_Data    = $crud->execute($Del_Contact);

    if ($Del_Data && $RemovedImage ) {
        echo 'true';
    } else {
        echo 'false';
    }
}

/*--------------------------------------------------------------
                        Save Data
--------------------------------------------------------------*/
if(isset($_POST['action']) && $_POST['action'] == 'book') {
 

 $booking_qry = "INSERT INTO ".$tableName." SET BOOKING_ID = '".$bookingid."', VEHICLE_ID = '".$vehicleid."',START_DATE = '".$startdate."', END_DATE = '".$enddate."',PRICE = '".$price."', STATUS = '".$status."',  RANDOM_ID = '".$randomId."'";

   $booking_data = $crud->execute($booking_qry);

   if ($booking_data) {
       echo 'true';
   } else {
       echo 'false';
   }
}


?>