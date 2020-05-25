<?php
session_start();
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: login.php");
  exit;
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-145858668-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-145858668-1');
  </script>
  <!--Title for top-->
  <title>ITEC301 Question 2 &#124; Services</title>
  <!--Icon for top-->
  <link rel="icon" href="img/LogoTop.JPG" sizes="16x16" type="image/jpg">

  <!-- Java Scrypt-->
  <script src="js/jquery2.js"></script>
  <script src="js/javascrypt.js"></script>

  <!-- My CSS -->
  <link rel="stylesheet" type="text/css" href="css/style.css">

  <!-- Bootstrap Resources -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <script src="js/bootstrap.js"></script>

  <!-- Fonts Awesome-->
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body class="body servtop" onload="FunctionPreloader()" style="margin:0;">
  <!-- PRE LOADER -->
  <div id="loader"></div>
  <div style="display:none;" id="myDiv" class="animate-bottom">

    <div class="servtop">

      <div class="container servv">


        <div class="row mbr-justify-content-center">

          <div class="col-lg-6 mbr-col-md-10" onclick="location.href='checkout.php'">
            <div class="wrap">
              <div class="ico-wrap ">

                <span class=" mbr-iconfont fa fa-money fa "></span>
              </div>
              <div class="text-wrap vcenter">
                <h2 class=" prodHe mbr-fonts-style mbr-bold mbr-section-title3 display-5">Cash on delivery</h2>
                <p class=" producPar mbr-fonts-style text1 mbr-text display-6">We have you covered you can pay when your items are delivered</p>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mbr-col-md-10" onclick="location.href='card.php'">
            <div class="wrap">
              <div class="ico-wrap ">

                <span class=" mbr-iconfont fa fa-credit-card-alt fa "></span>
              </div>
              <div class="text-wrap vcenter">
                <h2 class=" prodHe mbr-fonts-style mbr-bold mbr-section-title3 display-5">Card Payment</h2>
                <p class=" producPar mbr-fonts-style text1 mbr-text display-6">Process your payment now</p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
    <!-- PRE LOADER END div -->
  </div>
</body>

</html>