<?php 
session_start();
include_once("../crudop/crud.php");
$crud = new Crud();
$tableName = 'tbl_users';

extract($_POST);
$userid        = isset($userid) ? $userid :'';
$name          = isset($name) ? $name :'';
$email         = isset($email) ? $email :'';
$password      = isset($password) ? $password :'';
$phonenumber   = isset($phonenumber) ? $phonenumber :'';
$address       = isset($address) ? $address : '';
$old_image     = isset($old_image) ? $old_image : '';
$old_image1    = isset($old_image1) ? $old_image1 : '';
$hdn_id        = isset($hdn_id) ? $hdn_id : '';

$randomId  = uniqid(substr(0, 10));
$aadhar = '';
$aadhar_targetDir = "../uploads/users/";

$profile = '';
$profile_targetDir = "../uploads/users/";

if(isset($_FILES['aadhar'])) {

    $aadharfileName = basename($_FILES["aadhar"]["name"]);
    $targetaadharFilePath = $aadhar_targetDir.$randomId. "aadhar".$aadharfileName;
    if(move_uploaded_file($_FILES["aadhar"]["tmp_name"], $targetaadharFilePath)) {
        $aadhar = $targetaadharFilePath;
        if ($_POST['action'] == 'update') {
            unlink($old_image);
        }
    }
} else {
    $aadhar = $old_image;
}

if(isset($_FILES['profile'])) {

    $profilefileName = basename($_FILES["profile"]["name"]);
    $targetprofileFilePath = $profile_targetDir.$randomId. "profile".$profilefileName;
    if(move_uploaded_file($_FILES["profile"]["tmp_name"], $targetprofileFilePath)) {
        $profile = $targetprofileFilePath;
        if ($_POST['action'] == 'update') {
            unlink($old_image1);
        }
    }
} else {
    $profile = $old_image1;
}

/*--------------------------------------------------------------
                        Display Data
--------------------------------------------------------------*/
if(isset($_POST['action']) && $_POST['action'] == 'show') {

    // echo
     $user_qry = "SELECT * FROM ".$tableName."";
    // exit;
    $user_data = $crud->getData($user_qry);

    $response = array(
        "draw" => 1,
        "recordsTotal" => count($user_data),
        "data" => $user_data
    );

    echo json_encode($response);
}

/*--------------------------------------------------------------
                        Save Data
--------------------------------------------------------------*/
if(isset($_POST['action']) && $_POST['action'] == 'save') {

    // echo 
    $user_qry = "INSERT INTO ".$tableName." SET USER_ID = '".$userid."', NAME = '".$name."', EMAIL = '".$email."', PASSWORD = '".$password."', PHONE_NUMBER = '".$phonenumber."', ADDRESS = '".$address."', AADHAR_PHOTO = '".$aadhar."', PROFILE_PHOTO = '".$profile."', RANDOM_ID = '".$randomId."'";
    // exit;
    $user_data = $crud->execute($user_qry);

    if ($user_data) {
        echo 'true';
    } else {
        echo 'false';
    }
}

/*--------------------------------------------------------------
                        Update Data
--------------------------------------------------------------*/
if(isset($_POST['action']) && $_POST['action'] == 'update') {

    $user_qry = "UPDATE ".$tableName." SET USER_ID = '".$userid."', NAME = '".$name."', EMAIL = '".$email."', PASSWORD = '".$password."', PHONE_NUMBER = '".$phonenumber."', ADDRESS = '".$address."', AADHAR_PHOTO = '".$aadhar."', PROFILE_PHOTO = '".$profile."' WHERE RANDOM_ID = '".$hdn_id."'";
   
    $user_data = $crud->execute($user_qry);

    if ($user_data) {
        echo 'true';
    } else {
        echo 'false';
    }
}



?>