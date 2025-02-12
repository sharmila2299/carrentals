<?php

include("../crudop/crud.php");
$crud = new Crud();
session_start();
if(isset($_POST['action']) && $_POST['action'] == 'emailcheck') {
    $email= $_POST['email'];
    $email_qry   = "SELECT * FROM tbl_users WHERE EMAIL ='".$email."'";
    
    $email_data = $crud->getData($email_qry);
  
    if(count($email_data) > 0){
    $_SESSION['otp'] = $email_data[0]['RANDOM_ID'];
    echo 'true';
    }else{
    echo 'false';
    }

}


if(isset($_POST['action']) && $_POST['action'] == 'otpcheck') {

    $captcha =$_POST['name'];
    $cap_query   = "SELECT * FROM tbl_users WHERE RANDOM_ID = '".$captcha."' ";
//    exit; 
   $cap_data  = $crud->getData($cap_query);
  
    if(count($cap_data) > 0){
 
    echo 'true';
    }else{
    echo 'false';
    }

}

if(isset($_POST['action']) && $_POST['action'] == 'confrimpassword') {

    $password =$_POST['password'];
    $confrim_pass   = "UPDATE tbl_users SET EMAIL = '".$_SESSION['email']."' , PASSWORD = '".$password."' WHERE EMAIL = '".$_SESSION['email']."' ";
    $confrim_data  = $crud->execute($confrim_pass);
   
     if($confrim_data){
      echo 'true';
     }else{
     echo 'false';
     }
 
 }
?>