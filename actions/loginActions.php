<?php 
session_start();

include_once("../crudop/crud.php");
$crud = new Crud();
$tableName = 'tbl_users';

extract($_POST);
$username     = isset($username) ? $username :'';
$password     = isset($password) ? $password : '';
$old_password = isset($old_password) ? $old_password : '';

if(isset($_POST['action']) && $_POST['action'] == 'login') {

    $Log_Qry = "SELECT * FROM ".$tableName." WHERE EMAIL = '".$username."' AND PASSWORD = '".$password."'";
    $Log_Data = $crud->getData($Log_Qry);

    if (count($Log_Data) > 0) {
        $_SESSION['username'] = $Log_Data[0]['EMAIL'];
        echo "true";
    } else {
        echo "false";
    }
}

if(isset($_POST['action']) && $_POST['action'] == 'changePassword') {

    $Log_Qry = "SELECT * FROM ".$tableName." WHERE EMAIL = '".$_SESSION['username']."' AND PASSWORD = '".$old_password."'";

    $Log_Data = $crud->getData($Log_Qry);

    if (count($Log_Data) > 0) {
        $Upd_Qry = "UPDATE ".$tableName." SET PASSWORD = '".$password."' WHERE EMAIL = '".$_SESSION['username']."'";
    
        $Upd_Data = $crud->execute($Upd_Qry);

        if ($Upd_Data) {
            echo 'true';
        } else {
            echo 'false';
        }
    } else {
        echo "Invalid";
    }
}

?>