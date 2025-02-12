<?php
session_start();
include_once("../crudop/crud.php");
$crud = new Crud();
$tableName = 'tbl_custmoreservice';

extract($_POST);

$name        = isset($name) ? $name :'';
$email       = isset($email) ? $email :'';
$issue       = isset($issue) ? $issue : '';
$old_image   = isset($old_image) ? $old_image : '';
$hdn_id      = isset($hdn_id) ? $hdn_id : '';

$randomId  = uniqid(substr(0, 10));
$attachment = '';
$image_targetDir = "../images/Custmores/";

if(isset($_FILES['attachment'])) {

    $imagefileName = basename($_FILES["attachment"]["name"]);
    $targetimageFilePath = $image_targetDir.$randomId. "attachment".$imagefileName;
    if(move_uploaded_file($_FILES["attachment"]["tmp_name"], $targetimageFilePath)) {
        $image = $targetimageFilePath;
        
    }
} else {
    $image = $old_image;
}

/*--------------------------------------------------------------
                        Save Data
--------------------------------------------------------------*/
if(isset($_POST['action']) && $_POST['action'] == 'save') {

    $Service_Qry = "INSERT INTO ".$tableName." SET NAME = '".$name."', EMAIL = '".$email."', ISSUE_DESCRIPTION = '".$issue."',ATTACHMENT ='".$image."', RANDOM_ID = '".$randomId."'";
//  exit;
    $Service_Data = $crud->execute($Service_Qry);

    if ($Service_Data) {
        echo 'true';
    } else {
        echo 'false';
    }
}

?>