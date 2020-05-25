<?php

if (isset($_POST['search'])) {
  $valueToSearch = $_POST['valueToSearch'];
  // search in all table columns
  // using concat mysql function
  $query = "SELECT * FROM `products` WHERE CONCAT(`id`, `name`, `description`, `img`) LIKE '%" . $valueToSearch . "%'";
  $search_result = filterTable($query);
} else {
  $query = "SELECT * FROM `products`";
  $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
  include('config.php');
  $filter_Result = mysqli_query($conn, $query);
  return $filter_Result;
}



session_start();

$status = "";
if (isset($_POST['code']) && $_POST['code'] != "") {
  $code = $_POST['code'];
  $result = mysqli_query($conn, "SELECT * FROM `products` WHERE `code`='$code'");
  $row = mysqli_fetch_assoc($result);
  $name = $row['name'];
  $code = $row['code'];
  $price = $row['price'];
  $image = $row['img'];

  $cartArray = array(
    $code => array(
      'name' => $name,
      'code' => $code,
      'price' => $price,
      'quantity' => 1,
      'image' => $image
    )
  );

  if (empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
  } else {
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if (in_array($code, $array_keys)) {
      $status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";
    } else {
      $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"], $cartArray);
      $status = "<div class='box'>Product is added to your cart!</div>";
    }
  }
}
?>

<!DOCTYPE html>
<html>

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
  <title>ITEC301 Question 2 &#124; Products</title>
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
<style>
  .r {
    padding-left: 30px;
  }

  .r ::after {
    content: "";
    clear: both;
    display: table;
  }

  .c {
    float: left;
    width: 33.33%;
    padding: 5px;
  }

  a {
    color: black;
  }
</style>

<body class="body" onload="FunctionPreloader()" style="margin:0;background :#565825;">

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
      <div>
        <?php
        if (!empty($_SESSION["shopping_cart"])) {
          $cart_count = count(array_keys($_SESSION["shopping_cart"]));
          echo "
              <div class='cart_div'>
              <a href='cart.php' class= 'fa fa-shopping-cart fa-2x'><span><?php echo $cart_count; ?></span></a>
              </div>
              ";
        };
        ?>

      </div>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </nav>


    <div class="jumbotron" style="text-align:left">
      <h4>Search Again :</h4>

      <form class="form-inline" name="searchid" action="search.php" method="post">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" id="txtsearch" name="valueToSearch">
        <input type="submit" value="Search" onclick="fsearch()" name="search" id="search" class="btn btn-colour">
      </form>
    </div>
    <div style="clear:both;"></div>
    <div class="message_box" style="margin:10px 0px;">
      <?php echo $status; ?>
    </div>


    <div class='r'>
      <!-- populate table from mysql database -->
      <?php while ($row = mysqli_fetch_array($search_result)) :

        echo
          "
						<form method='post' action='' class='card c' >
	 
				
				<img  src=\"img/" . $row['img'] . "\" />
				<div class='card-body'>
					<p>
					
						<h3>" . $row['name'] . "</h3>
						<p> R " . $row['price'] . "</br>" . $row['description'] . "</p>
						<button type='submit' class='buy btn btn-success'>Buy Now</button>
							<input type='hidden' name='code' value=" . $row['code'] . " />  
					</p>
			   
			</div>
			</form>
		";



      endwhile; ?>

    </div>
  </div>
</body>

</html>