<?php
    include ('/home/desarsgr/public_html/admin/php/session.php');
    

    include ('/home/desarsgr/public_html/php/config.php');

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        // username and password sent from form 
        // echo("<script>console.log('PHP12: " . $email . "');</script>");
        
        //$user =  mysqli_query($db,"select * from db_users where id = $login_id ");
        
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $email = $_POST['email'];
        $sql = "UPDATE db_users SET
            firstname='$fname',
            lastname='$lname',
            email='$email'
            WHERE id = '$login_id'";
            
            if(mysqli_query($db, $sql)){
                //TODO self redirect
            }
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" media="all">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" rel="stylesheet" media="all"> -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet" media="all"> -->
    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <link href="css/profile.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a href="https://admin.desarsgreenhands.com/">
                                <i class="fas fa-chart-bar"></i>Overview</a>
                            <a href="https://admin.desarsgreenhands.com/listplants.php">
                                <i class="fas fa-chart-bar"></i>List of Products</a>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-copy"></i>Orders</a>
                                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                    <li>
                                        <a href="https://admin.desarsgreenhands.com/orders.php">
                                    <i class="fas fa-chart-bar"></i>Pending Orders</a>
                                    </li>
                                    <li>
                                        <a href="https://admin.desarsgreenhands.com/delivered.php">
                                        <i class="fas fa-chart-bar"></i>Finished Orders</a>
                                    </li>
                                </ul>
                            </li>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="https://admin.desarsgreenhands.com/">
                <img src="images/icon/logo-base.png" alt="Cool Admin" />
                </a>
                <a href="https://admin.desarsgreenhands.com/">
                    <img src="images/icon/logo1.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="https://admin.desarsgreenhands.com/">
                                <i class="fas fa-chart-bar"></i>Dashboard</a>
                            <a href="https://admin.desarsgreenhands.com/listplants.php">
                                <i class="fas fa-chart-bar"></i>List of Products</a>
                            <a href="https://admin.desarsgreenhands.com/inventory.php">
                                <i class="fas fa-chart-bar"></i>Inventory</a>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-copy"></i>Orders</a>
                                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                    <li>
                                        <a href="https://admin.desarsgreenhands.com/orders.php">
                                    <i class="fas fa-chart-bar"></i>Pending Orders</a>
                                    </li>
                                    <li>
                                        <a href="https://admin.desarsgreenhands.com/delivered.php">
                                        <i class="fas fa-chart-bar"></i>Finished Orders</a>
                                    </li>
                                </ul>
                            </li>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap" style="position: relative; z-index: 597; float: right;">
                            <div class="header-button" >
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <? echo $login_name; ?>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <? echo $login_name; ?>
                                                    </h5>
                                                    <span class="email"><? echo $login_email; ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="profile.php">Manage Account</a>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="changepass.php"></i>Change Password</a>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="php/logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid"> 
                        <div class="row ">
                            <div class="col-md-12">
                                    <div class="overview-wrap">
                                        <h2 class="title-1">Profile</h2>
                                    </div>
                                </div>
                            </div>
                            <br />
                            <form action="" method="post">
                                <div class="container rounded bg-white mt-5 mb-5">
                                    <div class="row">
                                        <div class="col-md-3 border-right">
                                            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="images/icon/avatar-01.jpg"></div>
                                        </div>
                                        <div class="col-md-5 border-right">
                                            <div class="p-3 py-5">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-md-6"><label class="labels">First Name</label><input type="text" class="form-control" placeholder="First name" value="<? echo $login_fname; ?>" name="firstname"></div>
                                                    <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control" value="<? echo $login_lname; ?>" placeholder="Last Name" name="lastname"></div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-12"><label class="labels">Email Address</label><input type="text" class="form-control" placeholder="enter phone number" value="<? echo $login_email; ?>" name="email" ></div>
                                                </div>
                                                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END OF MAIN CONTENT-->
        </div>
        
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <scri pt src="vendor/bootstrap-4.1/bootstrap.min.js"></scri>
    <!-- Vendor JS       -->
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

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>