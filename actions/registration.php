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
$dob           = isset($dob) ? $dob :'';
$gender        = isset($gender) ? $gender :'';
$number        = isset($number) ? $number :'';
$address       = isset($address) ? $address : '';
$old_image     = isset($old_image) ? $old_image : '';
$old_image1    = isset($old_image1) ? $old_image1 : '';
$hdn_id        = isset($hdn_id) ? $hdn_id : '';

$randomId  = uniqid(substr(0, 10));
$image = '';
$image_targetDir = "../uploads/users/";

$image1 = '';
$image1_targetDir = "../uploads/users/";

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

if(isset($_FILES['image1'])) {

    $image1fileName = basename($_FILES["image1"]["name"]);
    $targetimage1FilePath = $image1_targetDir.$randomId. "image1".$image1fileName;
    if(move_uploaded_file($_FILES["image1"]["tmp_name"], $targetimage1FilePath)) {
        $image1 = $targetimage1FilePath;
        if ($_POST['action'] == 'update') {
            unlink($old_image1);
        }
    }
} else {
    $image1 = $old_image1;
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
    $user_qry = "INSERT INTO ".$tableName." SET USER_ID = '".$userid."', NAME = '".$name."', EMAIL = '".$email."', PASSWORD = '".$password."',DOB = '".$dob."',GENDER = '".$gender."', PHONE_NUMBER = '".$number."', ADDRESS = '".$address."', AADHAR_PHOTO = '".$image."', PROFILE_PHOTO = '".$image1."', RANDOM_ID = '".$randomId."'";
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