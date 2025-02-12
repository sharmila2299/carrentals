<?php 
session_start();
include_once("../crudop/crud.php");
$crud = new Crud();
$tableName = 'tbl_service';

extract($_POST);

$title       = isset($title) ? $title :'';
$description = isset($description) ? $description : '';
$old_image   = isset($old_image) ? $old_image : '';
$hdn_id      = isset($hdn_id) ? $hdn_id : '';

$randomId  = uniqid(substr(0, 10));
$image = '';
$image_targetDir = "../uploads/service/";

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

    $Service_Qry = "SELECT * FROM ".$tableName."";
    $Service_Data = $crud->getData($Service_Qry);

    $response = array(
        "draw" => 1,
        "recordsTotal" => count($Service_Data),
        "data" => $Service_Data
    );

    echo json_encode($response);
}

/*--------------------------------------------------------------
                        Save Data
--------------------------------------------------------------*/
if(isset($_POST['action']) && $_POST['action'] == 'save') {

    $Service_Qry = "INSERT INTO ".$tableName." SET TITLE = '".$title."', DESCRIPTION = '".$description."', IMAGE = '".$image."', RANDOM_ID = '".$randomId."'";
    $Service_Data = $crud->execute($Service_Qry);

    if ($Service_Data) {
        echo 'true';
    } else {
        echo 'false';
    }
}

/*--------------------------------------------------------------
                        Update Data
--------------------------------------------------------------*/
if(isset($_POST['action']) && $_POST['action'] == 'update') {

    $Service_Qry = "UPDATE ".$tableName." SET TITLE = '".$title."', DESCRIPTION = '".$description."', IMAGE = '".$image."' WHERE RANDOM_ID = '".$hdn_id."'";
   
    $Service_Data = $crud->execute($Service_Qry);

    if ($Service_Data) {
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

?>