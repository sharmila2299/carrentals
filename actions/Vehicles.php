<?php 
session_start();
include_once("../crudop/crud.php");
$crud = new Crud();
$tableName = 'tbl_vehicles';

extract($_POST);

$type        = isset($type) ? $type :'';
$brand       = isset($brand) ? $brand : '';
$modal       = isset($modal) ? $modal :'';
$number      = isset($number) ? $number : '';
$price       = isset($price) ? $price :'';
$status      = isset($status) ? $status : '';
$old_image   = isset($old_image) ? $old_image : '';
$hdn_id      = isset($hdn_id) ? $hdn_id : '';

$randomId  = uniqid(substr(0, 10));
$image = '';
$image_targetDir = "../uploads/Vehicles/";

if(isset($_FILES['image'])) {

    $imagefileName = basename($_FILES["image"]["name"]);
    $targetimageFilePath = $image_targetDir.$randomId. "image".$imagefileName;
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetimageFilePath)) {
        $image = $targetimageFilePath;
        if ($_POST['action'] == 'update') {
            unlink($old_image);
        }
    }
} else {
    $image = $old_image;
}

/*--------------------------------------------------------------
                        Display Data
--------------------------------------------------------------*/
if(isset($_POST['action']) && $_POST['action'] == 'show') {

    $Vehicle_Qry = "SELECT * FROM ".$tableName." WHERE DELETE_STATUS = 1 ORDER BY ID DESC";
    $Vehicle_Data = $crud->getData($Vehicle_Qry);

    $response = array(
        "draw" => 1,
        "recordsTotal" => count($Vehicle_Data),
        "data" => $Vehicle_Data
    );

    echo json_encode($response);
}

/*--------------------------------------------------------------
                        Save Data
--------------------------------------------------------------*/
if(isset($_POST['action']) && $_POST['action'] == 'save') {

    $Vehicle_Qry = "INSERT INTO ".$tableName." SET VEHICLE_TYPE = '".$type."', BRAND = '".$brand."', MODAL = '".$modal."', NUMBER_PLATE = '".$number."', RENTAL_PRICING = '".$price."', AVALIBILITY_STATUS = '".$status."', PHOTOS = '".$image."', RANDOM_ID = '".$randomId."'";
    $Vehicle_Data = $crud->execute($Vehicle_Qry);

    if ($Vehicle_Data) {
        echo 'true';
    } else {
        echo 'false';
    }
}

/*--------------------------------------------------------------
                        Update Data
--------------------------------------------------------------*/
if(isset($_POST['action']) && $_POST['action'] == 'update') {

   $Vehicle_Qry = "UPDATE ".$tableName." SET VEHICLE_TYPE = '".$type."', BRAND = '".$brand."', MODAL = '".$modal."', NUMBER_PLATE = '".$number."', RENTAL_PRICING = '".$price."', AVALIBILITY_STATUS = '".$status."', PHOTOS = '".$image."' WHERE RANDOM_ID = '".$hdn_id."'";

    $Vehicle_Data = $crud->execute($Vehicle_Qry);

    if ($Vehicle_Data) {
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

    $Vehicle_Qry = "UPDATE ".$tableName." SET DELETE_STATUS = 0 WHERE ID = '".$id."'";
    $Del_Vehicle = $crud->execute($Vehicle_Qry);

    if ($Del_Vehicle ) {
        echo 'true';
    } else {
        echo 'false';
    }
}
/*--------------------------------------------------------------
                        Restore Data
--------------------------------------------------------------*/

if(isset($_POST['action']) && $_POST['action'] == 'restore') {

    $id        = $_POST['id'];

    $Vehicle_Qry = "UPDATE ".$tableName." SET DELETE_STATUS = 1 WHERE ID = '".$id."'";
    
    $Del_Vehicle = $crud->execute($Vehicle_Qry);

    if ($Del_Vehicle ) {
        echo 'true';
    } else {
        echo 'false';
    }
}

/*--------------------------------------------------------------
                        Display Data
--------------------------------------------------------------*/
if(isset($_POST['action']) && $_POST['action'] == 'details') {
    

    $id          = isset($id) ? $id :'';

    $Vehicle_Qry = "SELECT * FROM ".$tableName." WHERE ID='".$id."'";
    $Vehicle_Data = $crud->getData($Vehicle_Qry);

    $response = array(
        "draw" => 1,
        "recordsTotal" => count($Vehicle_Data),
        "data" => $Vehicle_Data
    );

    echo json_encode($response);
}


/*--------------------------------------------------------------
                        Brand Data
// --------------------------------------------------------------*/


// if (isset($_POST['action']) && $_POST['action'] == 'filterByBrand') {
//     $id = $_POST['id'] ?? '';

//     if ($id) {
//         // Query to fetch vehicles based on the brand ID
//         $Vehicle_Qry = "SELECT * FROM tbl_vehicles WHERE BRAND_ID = '".$id."'";
//         $Vehicle_Data = $crud->getData($Vehicle_Qry);

//         $response = array(
//             "recordsTotal" => count($Vehicle_Data),
//             "data" => $Vehicle_Data
//         );

//         echo json_encode($response);
//     } else {
//         echo json_encode(array("recordsTotal" => 0, "data" => []));
//     }
// }


?>