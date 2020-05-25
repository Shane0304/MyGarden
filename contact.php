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
  <title>ITEC301 Question 2 &#124; Contact</title>
  <!--Icon for top-->
  <link rel="icon" href="img/LogoTop.JPG" sizes="16x16" type="image/jpg">

  <!-- Java Scrypt-->
  <script src="js/jquery2.js"></script>
  <script src="js/javascrypt.js"></script>

  <!-- My CSS -->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/colours.css">

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
    <!-- Form for contact us -->
    <div class="index con" style="background-color: #423733;">
      <div class="contop">
        <h3>For any querys, quotes or information please feel free to contact us.</h3>
        <h5>Please enter all the details</h5>
      </div>
      <br>
      <form action="coninsert.php" method="post">
        <label for="fname">First Name*</label>
        <input class="conin" type="text" id="fname" name="firstname" placeholder="Your name.." required>

        <label for="lname">Last Name*</label>
        <input class="conin" type="text" id="lname" name="lastname" placeholder="Your last name.." required>

        <label for="email">Email*</label>
        <input class="conin" type="text" id="email" name="email" placeholder="Your Email" required>

        <label for="comment">Comment/Quote Request*</label>
        <textarea class="conin" id="comment" name="comment" placeholder="Write something.." style="height:200px" required></textarea>

        <br>
        <br>
        <input type="submit" value="Submit" id="Submit">

      </form>
    </div>
    <!-- Back top -->
    <button onclick="topFunction()" id="BtnTop" title="Go to top"><i class="fa fa-angle-up"></i></button>
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