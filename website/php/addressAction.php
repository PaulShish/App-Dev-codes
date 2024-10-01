<?php 
ob_start();
// Initialize shopping cart class 
require_once 'addressClass.php'; 
$address = new Address;

require_once 'config.php'; 

$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
$Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");
$webOS   = stripos($_SERVER['HTTP_USER_AGENT'],"Windows");
$mac   = stripos($_SERVER['HTTP_USER_AGENT'],"Mac");

if($_REQUEST['action'] == 'addAddress')
{
    $firstname = mysqli_real_escape_string($db, $_REQUEST['firstname']);   
    $lastname = mysqli_real_escape_string($db, $_REQUEST['lastname']);
    $email = mysqli_real_escape_string($db, $_REQUEST['email']);
    $phone = mysqli_real_escape_string($db, $_REQUEST['phone']);
    $address1 = mysqli_real_escape_string($db, $_REQUEST['address1']);
    $address2 = mysqli_real_escape_string($db, $_REQUEST['address2']);
    $city = mysqli_real_escape_string($db, $_REQUEST['city']);
    $state = mysqli_real_escape_string($db, $_REQUEST['state']);

    $username = mysqli_real_escape_string($db, $_REQUEST['username']);
    $password1 = mysqli_real_escape_string($db, $_REQUEST['password']);
    $password2 = mysqli_real_escape_string($db, $_REQUEST['cpassword']);

    if ($password1 == $password2)
    {
        // $addressData = array( 
        //     'firstname' => $firstname, 
        //     'lastname' => $lastname, 
        //     'email' => $email,
        //     'phone' => $phone,
        //     'addressline1' => $address1,
        //     'addressline2' => $address2,
        //     'city' => $city,
        //     'state' => $state
        // );
        echo $firstname;
        echo $lastname;
        echo $email;
        echo $phone;
        echo $address1;
        echo $address2;
        echo $city;
        echo $state;
        echo $username;
        echo $password1;
        echo $password2;

        $sql2 = "INSERT INTO billing_details (
            first_name, 
            last_name, 
            email, 
            phone_number, 
            address_line1, 
            address_line2, 
            town, 
            county,
            username,
            password) 
            VALUES (
            '$firstname',
            '$lastname',
            '$email',
            '$phone',
            '$address1',
            '$address2',
            '$city',
            '$state',
            '$username',
            '$password1'
            )";
        if(mysqli_query($db, $sql2)){
            $redirectLoc ='http://desarsgreenhands.com/login.php';
        }
        else
        {
            echo "guba";
        }
        
        //$insert = $address->insert($addressData);
    }
    else
    {
        $redirectLoc = 'http://desarsgreenhands.com/'; 
    }
}

if( $iPod || $iPhone || $iPad || $mac){

    //browser reported as an iPhone/iPod touch -- open itunes store here
    if($_REQUEST['action'] == 'addAddress') {
        // echo "a";
        echo '<script>window.location = "'.$redirectLoc.'";</script>';
    }
    // else 
    // {
    //     echo "b";
    // echo '<script>window.location.replace = "'.$redirectLoc.'";</script>';
    // }
    // echo '<script>window.location.replace = "'.$redirectLoc.'";</script>';
    // die();
   // echo "iphone";
    
  }
  else if($Android || $webOS){
      //browser reported as an Android device -- open play store here
    //echo "android";
    // echo "$_SERVER['HTTP_USER_AGENT']";
    
    // echo '<script>console.log("$redirectLoc");</script>';
    header("Location: $redirectLoc"); 
    // die();
  }
// header("Location: $redirectLoc"); 
