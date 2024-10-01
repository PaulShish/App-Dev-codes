<?php
include('/home/desarsgr/public_html/admin/php/config.php');
session_start();
$data = $_SESSION['change_password_account'];

if($_SERVER["REQUEST_METHOD"] == "POST") {

    // username and password sent from form 
    // echo("<script>console.log('PHP12: " . $email . "');</script>");
    
    $password1 = mysqli_real_escape_string($db,$_POST['password1']);
    $password2 = mysqli_real_escape_string($db,$_POST['password2']);
    
    if ($password1 == $password2)
    {
        $sql = "UPDATE db_users SET
        password='$password1' 
        WHERE email = '$data'";
        
        if(mysqli_query($db, $sql)){
            
            $redirectLoc = "http://admin.desarsgreenhands.com/login.php";
            header("location: $redirectLoc");

        }
    }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="au theme template">
<meta name="author" content="Hau Nguyen">
<meta name="keywords" content="au theme template">

<title>Forgot Password</title>

<link href="css/font-face.css" rel="stylesheet" media="all">
<link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
<link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
<link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

<link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

<link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
<link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
<link href="vendor/wow/animate.css" rel="stylesheet" media="all">
<link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
<link href="vendor/slick/slick.css" rel="stylesheet" media="all">
<link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
<link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

<link href="css/theme.css" rel="stylesheet" media="all">
<meta name="robots" content="noindex, nofollow">
</head>
<body class="animsition">
<div class="page-wrapper">
<div class="page-content--bge5">
<div class="container">
<div class="login-wrap">
<div class="login-content">
<div class="login-logo">
<a href="#">
    <img src="images/icon/logo-base.png" alt="CoolAdmin">
    <img src="images/icon/logo1.png" alt="CoolAdmin">
</a>
</div>
<div class="login-form">
<form action="" method="post">
<div class="form-group">
<label>New Password</label>
<input class="au-input au-input--full" type="password" name="password1" placeholder="Password">
</div>
<div class="form-group">
<label>Retype New Password</label>
<input class="au-input au-input--full" type="password" name="password2" placeholder="Password">
</div>
<button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">submit</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>

<script src="vendor/jquery-3.2.1.min.js"></script>

<script src="vendor/bootstrap-4.1/popper.min.js"></script>
<script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>

<script src="vendor/slick/slick.min.js">
    </script>
<script src="vendor/wow/wow.min.js"></script>
<script src="vendor/animsition/animsition.min.js"></script>
<script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
<script src="vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
<script src="vendor/circle-progress/circle-progress.min.js"></script>
<script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="vendor/chartjs/Chart.bundle.min.js"></script>
<script src="vendor/select2/select2.min.js">
    </script>

<script src="js/main.js"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"7a3acb3beeed9f71","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.2.0","si":100}' crossorigin="anonymous"></script>
</body>
</html>
