<?php 
// Initialize shopping cart class 
include_once ('/home/desarsgr/public_html/php/cartAction.php'); 
$cart = new Cart;

include_once ('/home/desarsgr/public_html/php/addressAction.php'); 
$address1 = new Address;

$addressDetails = $address1->contents(); 

require_once ('/home/desarsgr/public_html/php/config.php');

include_once ('/home/desarsgr/public_html/php/session.php');
// // Attempt insert query execution

$query_last_transaction_order = "SELECT transaction_order_number FROM `transaction_orders` ORDER BY ID DESC LIMIT 1";
$result_transaction_order = mysqli_query($db,$query_last_transaction_order) or die('Could not query');
$row_last_transaction_order = $result_transaction_order->fetch_assoc();
$last_transaction_order = $row_last_transaction_order['transaction_order_number'];


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Desar's Green Hands | Landscaping Services</title>
    <meta name="description" content="Desar's Green Hands | Landscaping Services">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Lightbox-->
    <link rel="stylesheet" href="vendor/lightbox2/css/lightbox.min.css">
    <!-- Range slider-->
    <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">
    <!-- Bootstrap select-->
    <link rel="stylesheet" href="vendor/bootstrap-select/css/bootstrap-select.min.css">
    <!-- Owl Carousel-->
    <link rel="stylesheet" href="vendor/owl.carousel2/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="vendor/owl.carousel2/assets/owl.theme.default.css">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <!-- <link rel="shortcut icon" href="img/favicon.png"> -->
    <link rel="icon" type="image/x-icon" href="img/favicon.ico?v=2"  />
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page-holder">
      <!-- navbar-->
      <header class="header bg-white">
        <div class="container px-0 px-lg-3">
          <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="http://desarsgreenhands.com/"> <span class=" font-weight-bold text-uppercase text-dark">Desar's Green Hands</span></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <!-- Link--><a class="nav-link" href="http://desarsgreenhands.com/">Home</a>
                </li>
                <li class="nav-item">
                  <!-- Link--><a class="nav-link active" href="tracking.php">Track</a>
                </li>
                <li class="nav-item">
                  <!-- Link--><a class="nav-link" href="shop.php/?category=all">Shop</a>
                </li>
              </ul>
              <ul class="navbar-nav ml-auto">               
                <li class="nav-item"><a class="nav-link" href="cart.php"> <i class="fas fa-dolly-flatbed mr-1 text-gray"></i>Cart<small class="text-gray">(0)</small></a></li>
              </ul>
            </div>
          </nav>
        </div>
      </header>
      <!-- HERO SECTION-->
      <div class="container">
      <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Tracking</h1>
              </div>
              <div class="col-lg-6 text-lg-right">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                    <li class="breadcrumb-item"><a href="http://desarsgreenhands.com/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tracking</li>
                  </ol>
                </nav>
              </div>
            </div>
            <div class="" style="margin:auto; ">
              <div class="">
                <ul class="list-inline d-flex align-items-right justify-content-lg-end mb-0">
                  <?php
                    $user_check = $_SESSION['login_user'];
    
                    $ses_sql = mysqli_query($db,"select * from transaction_orders where username = '$user_check' ");

                  ?>
                  
                  <div class="input-group">
                  <table>
                    <tr>
                      <th>Tracking Number</th>
                      <th>Update</th>
                    </tr>
                    <?php while($row = mysqli_fetch_assoc($ses_sql))
                    { ?>
                    <tr>
                    <td> <?php echo $row['transaction_order_number']; ?> </td>
                     <td> <?php echo $row['order_update']; ?> </td>
                    </tr>
                    <?php }?>
                </table>
                  </div>
                </ul>
              </div>
            </div>
          </div>
        </section>
      </div>

      <!-- FOOTER SECTION-->
      <footer class="bg-dark text-white" style="margin-top:150px">
        <div class="container py-4">
          <div class="row py-5">
            
            
            <div class="col-md-4">
              <h6 class="text-uppercase mb-3">Social media</h6>
              <ul class="list-unstyled mb-0">
                <li><a class="footer-link" href="https://www.facebook.com/Desars-Green-Hands-103012938231043">Facebook</a></li>
                <li><a class="footer-link" href="#">Instagram</a></li>
                <li><a class="footer-link" href="#">Pinterest</a></li>
              </ul>
            </div>
          </div>
          <div class="border-top pt-4" style="border-color: #1d1d1d !important">
            <div class="row">
              <div class="col-lg-6">
                <p class="small text-muted mb-0">&copy; 2020 All rights reserved.</p>
              </div>
            </div>
          </div>
        </div>
      </footer>

      <!-- JavaScript files-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="vendor/lightbox2/js/lightbox.min.js"></script>
      <script src="vendor/nouislider/nouislider.min.js"></script>
      <script src="vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
      <script src="vendor/owl.carousel2/owl.carousel.min.js"></script>
      <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js"></script>
      <script src="js/front.js"></script>
      <script>
        // ------------------------------------------------------- //
        //   Inject SVG Sprite - 
        //   see more here 
        //   https://css-tricks.com/ajaxing-svg-sprite/
        // ------------------------------------------------------ //
        function injectSvgSprite(path) {
        
            var ajax = new XMLHttpRequest();
            ajax.open("GET", path, true);
            ajax.send();
            ajax.onload = function(e) {
            var div = document.createElement("div");
            div.className = 'd-none';
            div.innerHTML = ajax.responseText;
            document.body.insertBefore(div, document.body.childNodes[0]);
            }
        }
        // this is set to BootstrapTemple website as you cannot 
        // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
        // while using file:// protocol
        // pls don't forget to change to your domain :)
        injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
        
      </script>
      <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </div>
  </body>
</html>