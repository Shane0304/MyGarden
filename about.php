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
  <title>ITEC301 Question 2 &#124; About</title>
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

<body class="body" onload="FunctionPreloader()" style="margin:0;">
  <!-- PRE LOADER -->
  <div id="loader"></div>
  <div style="display:none;" id="myDiv" class="animate-bottom">

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-md nav-colour navbar-light sticky-top">
      <!-- Brand logo -->
      <img src="img/LogoTop.JPG" type="image/jpg" width="50" height="50">
      &nbsp&nbsp
      <a class="navbar-brand" href="index.php">My Garden</a>
      <!-- Toggler/collapsibe Button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Navbar links -->
      <div class="collapse navbar-collapse row justify-content-center" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php"><b>Home</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="products.php"><b>Products</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="services.php"><b>Services</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php"><b>Contact</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php"><b>About</b></a>
          </li>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <?php
          // Initialize the session
          session_start();

          // Check if the user is logged in, if not then redirect him to login page
          if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
            echo "<li class='nav-item'>
                           <a class='nav-link btn btn-success' href='login.php'><b>Login/register</b></a>
                       </li>
                       ";
          } else {
            echo "<li class='nav-item'>
                           <a class='nav-link btn btn-danger' href='logout.php'><b>Logout</b></a>
                       </li>
                       ";
          }
          if (isset($_SESSION["admin"]) && $_SESSION["admin"] === true) {
            echo "<li class='nav-item'>
                            <a class='nav-link btn btn-outline-success' href='admin.php'><b>Admin</b></a>
                        </li>
                        ";
          }
          ?>
        </ul>
      </div>
      <form class="form-inline" name="searchid" action="search.php" method="post">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" id="txtsearch" name="valueToSearch">
        <input type="submit" value="Search" name="search" id="search" class="btn btn-colour">
      </form>
    </nav>
    <div>
      <img src="img/dirtspade.jpg" alt="dirt" class="imgtrance img-fluid">
      <img src="img/dirtspade.jpg" alt="dirt" class="imgtrance img-fluid">
    </div>
    <!-- Back top -->
    <button onclick="topFunction()" id="BtnTop" title="Go to top"><i class="fa fa-angle-up"></i></button>
    <div class="centered">
      <br>
      <p class="sac_slogan">My Garden.</p>
      <p class="sac_catchy">Where plants become life</p>
      <br>
      <p>

        Where you can craft your own master piece. Here you can find some of the best pot plans and garden transformations. Our goal is for you to enjoy having plants and a garden that can express who you are. Don’t worry we know life gets hectic and sometime you just don’t have the time to do the upkeep that come with gardening. If this is you, you have come to the right place. My Garden offers succulent plants rather than your standard plant. A succulent plant is different because rather than requiring frequent watering, they are able to live on minimum watering.

        My Garden is willing to take the time to come and help you revamp your garden to make it look beautiful again. While revamping, My Garden will teach you how to take care of these little plants that are now part of your family. Feel free to contact us if you have any questions or requests.


      </p>

      <p>
        If you would love to buy any of our plants, please feel free to visit our products page <a href="products.php">here</a>.
      </p>

      <p>
        If you would love to use any of our services, please feel free to visit our services page <a href="services.php">here</a>.
      </p>
      <p>
        If you may have any questions, please feel free to contact us on our contacts page <a href="contact.php">here</a>.
      </p>

    </div>


    <!-- Footer -->
    <footer>
      <div class="foott">
        <a href="https://en-gb.facebook.com/login/" target="_blank" class="fa fa-facebook"></a>
        <a href="https://twitter.com/login?lang=en" target="_blank" class="fa fa-twitter"></a>
        <a href="https://www.linkedin.com/" target="_blank" class="fa fa-youtube"></a>
        <a href="https://www.instagram.com/accounts/login/" target="_blank" class="fa fa-instagram"></a>
        <a href="https://www.linkedin.com/" target="_blank" class="fa fa-linkedin"></a>
        <p> Design: Shane Rogers &copy; Copyright | 2019 My Garden Corp</p>
      </div>
    </footer>
    <!-- PRE LOADER END div -->
  </div>
</body>

</html>