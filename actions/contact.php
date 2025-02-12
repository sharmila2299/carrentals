<?php 
session_start();

include_once("../crudop/crud.php");
$crud = new Crud();
$tableName = 'tbl_send';

extract($_POST);
$username     = isset($username) ? $username :'';
$email     = isset($email) ? $email : '';
$subject = isset($subject) ? $subject : '';
$message     = isset($message) ? $message : '';
$randomId  = uniqid(substr(0, 10));

if(isset($_POST['action']) && $_POST['action'] == 'send') {
// print_r($_POST);
// exit;
    $send_Qry = "INSERT INTO ".$tableName."  SET NAME = '".$username."', EMAIL = '".$email."' , SUBJECT = '".$subject."' ,MESSAGE = '".$message."' , RANDOM_ID = '".$randomId."'";
//    exit;
   $send_Data = $crud->execute($send_Qry);

    if ($send_Data) {
        echo 'true';
    } else {
        echo 'false';
    }
}



?>