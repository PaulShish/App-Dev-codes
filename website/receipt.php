<?php 
// Initialize shopping cart class 
include_once ('/home/desarsgr/public_html/php/cartAction.php'); 
$cart = new Cart;

include_once ('/home/desarsgr/public_html/php/addressAction.php'); 
$address1 = new Address;

require_once ('/home/desarsgr/public_html/php/config.php');

// Attempt insert query execution
$count = mysqli_query($db,"SELECT count(*) as total from transaction_orders");
$data=mysqli_fetch_assoc($count);
$counter = $data['total'];
$transaction_order_number = "DGH" . sprintf("%05d",$counter);
$total_items = $cart->total_items();
$total = $cart->total();
$sales_tax = round(($total * .0855), 2);

$sql = "INSERT INTO transaction_orders (transaction_order_number, item_quantity, transaction_total, tax, date_ordered) VALUES ('$transaction_order_number', '$total_items', '$total', $sales_tax, now())";
if(mysqli_query($db, $sql)){

  $insert_cart_item = $cart->contents(); 

  foreach($insert_cart_item as $item){
    $item_id = $item['id'];
    $item_name_of_plant = $item['name_of_plant'];
    $item_qty = $item['qty'];

    $sql1 = "INSERT INTO transaction_details (transaction_order_number, plant_id, plant_name, quantity) VALUES ('$transaction_order_number', '$item_id', '$item_name_of_plant', '$item_qty')";
    if(mysqli_query($db, $sql1)){
    } 
  }
  $insert_address_details = $address1->contents();

    $firstname = $insert_address_details['firstname'];
    $lastname = $insert_address_details['lastname'];
    $email = $insert_address_details['email'];
    $phone = $insert_address_details['phone'];
    $address1 = $insert_address_details['addressline1'];
    $address2 = $insert_address_details['addressline2'];
    $town = $insert_address_details['city'];
    $county = $insert_address_details['state'];

    $sql2 = "INSERT INTO billing_details (
        transaction_order_number, 
        first_name, 
        last_name, 
        email, 
        phone_number, 
        address_line1, 
        address_line2, 
        town, 
        county) 
        VALUES (
        '$transaction_order_number',
        '$firstname',
        '$lastname',
        '$email',
        '$phone',
        '$address1',
        '$address2',
        '$town',
        '$county'
        )";
    if(mysqli_query($db, $sql2)){
    } 
}


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Desar's Green Hands | Landscaping Services</title>
    <meta name="description" content="">
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
    <link rel="icon" type="image/x-icon" href="img/favicon.ico?v=2"  />
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    
        
  </head>
  <body onload="cart()">
    <div class="page-holder">
      <!-- navbar-->
      <header class="header bg-white">
        <div class="container px-0 px-lg-3">
          <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="http://desarsgreenhands.com/"><span class="font-weight-bold text-uppercase text-dark">Desar's Green Hands</span></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-link">
                  Home
                </li>
                <li class="nav-link">
                  Track
                </li>
                <li class="nav-link">
                  Shop
                </li>
              </ul>
              <ul class="navbar-nav ml-auto">               
                <li class="nav-link"><i class="fas fa-dolly-flatbed mr-1 text-gray"></i>Cart<small class="text-gray">(<?php echo ($cart->total_items() > 0)?$cart->total_items().'':'0'; ?>)</small></li>
              </ul>
            </div>
          </nav>
        </div>
      </header>
      <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Checkout</h1>
              </div>
              <div class="col-lg-6 text-lg-right">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                    <li class="breadcrumb-item active">Home</li>
                    <li class="breadcrumb-item active">Cart</li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <section class="py-5">
          <h2 class="h5 text-uppercase mb-4" style="text-align:center">Kindly Wait. we are generating your transaction order.</h2>
        </section>
      </div>

      <!-- FOOTER SECTION-->
      <footer class="bg-dark text-white" style="position: fixed; left: 0; bottom: 0; width: 100%;">
        <div class="container py-4">
          <div class="row py-5">
            
            
            <div class="col-md-4">
              <h6 class="text-uppercase mb-3">Social media</h6>
              <ul class="list-unstyled mb-0">
                <li class="footer-link">Facebook</li>
                <li class="footer-link">Instagram</li>
                <li class="footer-link">Pinterest</li>
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
      <script src="https://js.stripe.com/v3/"></script>
      <script>
        function cart(){
            setTimeout(function(){ window.location.replace("http://desarsgreenhands.com/success.php");}, 3000);
        }
        </script>
      <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </div>
  </body>
</html>