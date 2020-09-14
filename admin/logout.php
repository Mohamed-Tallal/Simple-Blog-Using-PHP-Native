<?php 
session_start();
include "../connect.php";
if($_COOKIE['cook']!=1){
  echo "<script>window.open('login.php','_self')</script>";
}
else{
    $email_cook = $_COOKIE['admin_login'];
   
    if (isset($_COOKIE['user_email'])) {
        unset($_COOKIE['user_email']);
        setcookie('admin_login', -1, '/');
        echo "<script>window.open('login.php','_self')</script>";
        return true;
    } else {
        return false;
    }
}
?>