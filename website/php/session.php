<?php
   include_once('/home/desarsgr/public_html/php/config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select * from billing_details where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
  
   $login_id = $row['id'];
   $login_name = $row['first_name'];
   $login_email = $row['email'];
   
   if(!isset($_SESSION['login_user'])){
      header("location: https://desarsgreenhands.com/login.php");
      die();
   }
?>