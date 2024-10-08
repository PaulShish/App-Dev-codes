<?php 
// Initialize shopping cart class 
include_once ('/home/desarsgr/public_html/php/cartAction.php'); 
$cart = new Cart;

include_once ('/home/desarsgr/public_html/php/addressAction.php'); 
$address1 = new Address;

$addressDetails = $address1->contents(); 

require_once ('/home/desarsgr/public_html/php/config.php');
// // Attempt insert query execution
echo("<script>console.log('PHP12: " . $redirectLoc . "');</script>");

$errorHandling = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {
  // username and password sent from form 
  
  $myusername = mysqli_real_escape_string($db,$_POST['username']);
  $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
  
  $sql = "SELECT * FROM billing_details WHERE username = '$myusername' and password = '$mypassword'";
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $active = $row['username'];
  
  $count = mysqli_num_rows($result);
  // If result matched $myusername and $mypassword, table row must be 1 row

  if($count == 1) {
      //session_register("myusername");
      $_SESSION['login_user'] = $active;
      $redirectLoc = 'http://desarsgreenhands.com/tracking.php';
      header("location: $redirectLoc");
  }else {
    $errorHandling = "Incorrect Username or Password";
    // $redirectLoc = 'http://desarsgreenhands.com'; 
    // header("location: $redirectLoc");
  }
}
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
                  <!-- Link--><a class="nav-link active" href="http://desarsgreenhands.com/">Home</a>
                </li>
                <li class="nav-item">
                  <!-- Link--><a class="nav-link" href="../tracking.php">Track</a>
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
                <h1 class="h2 text-uppercase mb-0">Login</h1>
              </div>
            </div>
            
          </div>
        </section>
        <section class="">
            <div class="" style="display: block;
  margin-left: auto;
  margin-right: auto;
  width: 40%;">
                <div class="">
                <span class="error"><?php echo $errorHandling;?></span>
                <form id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <fieldset>
                  <div class="">
                    <div class="col-lg-6 form-group">
                      <input class="form-control form-control-lg" id="username" name="username" type="text" placeholder="username" required>
                    </div>
                    <div class="col-lg-6 form-group">
                      <input class="form-control form-control-lg" id="password" name="password" type="password" placeholder="password" required>
                    </div>
                    <a style="position:relative;margin-left:15px" href="http://desarsgreenhands.com/register.php">register</a>

                    <div class="col-lg-12 form-group" style="margin-top: 16px;">
                      <!-- <button class="btn btn-dark" id="placeOrder">Place Order</button> -->
                      <input class="btn btn-dark"  id="placeOrder" type="submit">
                    </div>
                  </div>
                  
                </fieldset>
              </form>                    
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