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
  <title>ITEC301 Question 2 &#124; Home</title>
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
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>

<body class="body" onload="FunctionPreloader()" style="margin:0;">
  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-md nav-colour navbar-light sticky-top">
    <!-- Brand logo -->
    <img src="img/LogoTop.JPG" type="image/jpg" width="50" height="50">
    &nbsp&nbsp
    <a class="navbar-brand" href="index.php">My Garden</a>
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-expanded="true">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Navbar links -->
    <div class="navbar-collapse row justify-content-center collapse show" id="collapsibleNavbar">
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
        &nbsp;&nbsp;&nbsp;&nbsp;
        <?php
        // Initialize the session
        session_start();

        // Check if the user is logged in, if not then redirect him to login page
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
          echo "<li class='nav-item'>
                           <a class='nav-link btn btn-success' href='login.php'><b>Login/register</b></a>
                       </li>&nbsp;
                       ";
        } else {
          echo "<li class='nav-item'>
                           <a class='nav-link btn btn-danger' href='logout.php'><b>Logout</b></a>
                       </li>&nbsp;
                       ";
        }

        if (isset($_SESSION["admin"]) && $_SESSION["admin"] === true) {
          echo "<li class='nav-item'>
                            <a class='nav-link btn btn-outline-success' href='admin.php'><b>Admin</b></a>
                        </li>&nbsp;
                        ";
        }

        ?>
      </ul>
      <form class="form-inline" name="searchid" action="search.php" method="post">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" id="txtsearch" name="valueToSearch">
        <input type="submit" value="Search" name="search" onclick="fsearch()" id="search" class="btn btn-colour">
      </form>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;

  </nav>

  <!-- PRE LOADER -->
  <div id="loader"></div>
  <div style="display:none;" id="myDiv" class="animate-bottom">



    <div class="sltopimg index">


      <div class="conZer">
        <img class="mySlides" src="img/z.jpg" style="width:100%;display:none">
        <img class="mySlides" src="img/x.jpg" style="width:100%">
        <img class="mySlides" src="img/v.jpg" style="width:100%;display:none">

        <div class="txtonimg">
          <strong>
            <h1 style="color: whitesmoke;">My Garden</h1>
          </strong>
        </div>
      </div>
      <h2 style="text-align:center">
        ----We turn anywhere into an escape from reality----
      </h2>


      <div class="w3-row-padding sliderbottom">
        <div class="slimg">
          <img class="demo sbotimg" src="img/z.jpg" style="width:100%;cursor:pointer;height:300px" onclick="currentDiv(1)">
        </div>
        <div class="slimg">
          <img class="demo sbotimg" src="img/x.jpg" style="width:100%;cursor:pointer;height:300px" onclick="currentDiv(2)">
        </div>
        <div class="slimg">
          <img class="demo sbotimg" src="img/v.jpg" style="width:100%;cursor:pointer;height:300px" onclick="currentDiv(3)">
        </div>
      </div>






      <table style="width:100%">
        <tr>
          <th><a href="products.php"> <img src="img/A.jpg" alt="Plant" style="width:100%"></a></th>
          <th><a href="products.php"><img src="img/1.jpg" alt="Plant" style="width:100%"></a></th>
          <th><a href="products.php"><img src="img/11.jpg" alt="Plant" style="width:100%"></a></th>
        </tr>
        <tr>
          <td><a href="products.php"><img src="img/b.jpg" alt="PlantB" style="width:100% "></a></td>
          <td><a href="products.php"><img src="img/3.jpg" alt="PlantB" style="width:100% "></a></td>
          <td><a href="products.php"><img src="img/4.jpg" alt="PlantB" style="width:100% "></a></td>
        </tr>
        <tr>
          <td><a href="products.php"><img src="img/c.jpg" alt="PlantC" style="width:100%"></a></td>
          <td><a href="products.php"><img src="img/9.jpg" alt="PlantC" style="width:100%"></a></td>
          <td><a href="products.php"><img src="img/10.jpg" alt="PlantC" style="width:100%"></a></td>
        </tr>
        <tr>
          <td><a href="products.php"><img src="img/d.jpg" alt="PlantD" style="width:100%"></a></td>
          <td><a href="products.php"><img src="img/7.jpg" alt="PlantD" style="width:100%"></a></td>
          <td><a href="products.php"><img src="img/8.jpg" alt="PlantD" style="width:100%"></a></td>
        </tr>
      </table>
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