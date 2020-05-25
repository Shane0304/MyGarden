<?php
session_start();
$status = "";

if (isset($_POST['action']) && $_POST['action'] == "remove") {
  if (!empty($_SESSION["shopping_cart"])) {
    foreach ($_SESSION["shopping_cart"] as $key => $value) {
      if ($_POST["code"] == $key) {
        unset($_SESSION["shopping_cart"][$key]);
        $status = "<div class='box' style='color:red;'>
		Product is removed from your cart!</div>";
      }
      if (empty($_SESSION["shopping_cart"]))
        unset($_SESSION["shopping_cart"]);
    }
  }
}

if (isset($_POST['action']) && $_POST['action'] == "change") {
  foreach ($_SESSION["shopping_cart"] as &$value) {
    if ($value['code'] === $_POST["code"]) {
      $value['quantity'] = $_POST["quantity"];
      break; // Stop the loop after we've found the product
    }
  }
}


?>
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
  <title>ITEC301 Question 2 &#124; Cart</title>
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

<body class="body index" onload="FunctionPreloader()" style="margin:0;">
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
            <a class="nav-link" href="Index.php"><b>Home</b></a>
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

      <form class="form-inline" name="searchid" action="search.php" method="post">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" id="txtsearch" name="valueToSearch">
        <input type="submit" value="Search" name="search" id="search" class="btn btn-colour">
      </form>
    </nav>
    <div style="width:700px; margin:50 auto;">

      <h2>Shopping Cart</h2>

      <div class="cart">
        <?php
        if (isset($_SESSION["shopping_cart"])) {
          $total_price = 0;
          ?>
        <form action="paymentopt.php" method="">
          <table class="table" style="color: #A1CD32">
            <tbody>
              <tr>
                <td></td>
                <td>ITEM NAME</td>
                <td>QUANTITY</td>
                <td>UNIT PRICE</td>
                <td>ITEMS TOTAL</td>
              </tr>
              <?php
                foreach ($_SESSION["shopping_cart"] as $product) {

                  ?>
              <tr>
                <td>
                  <img src='img/<?php echo $product["image"]; ?>' width="100" height="80" /></td>
                <td><?php echo $product["name"]; ?><br />
                  <form method='post'>
                    <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                    <input type='hidden' name='action' value="remove" />
                    <button type='submit' class='btn btn-warning'>Remove</button>
                  </form>
                </td>
                <td>
                  <form method='post' action=''>
                    <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                    <input type='hidden' name='action' value="change" />
                    <select name='quantity' class='quantity' onchange="this.form.submit()">
                      <?php
                          for ($x = 1; $x <= 100; $x++) {
                            echo "<option ";
                            if ($product['quantity'] == $x) echo "selected";
                            echo " value='$x'  > $x </option>";
                          }
                          ?>
                    </select>
                  </form>
                </td>
                <td><?php echo "R" . $product["price"]; ?></td>
                <td><?php echo "R" . $product["price"] * $product["quantity"]; ?></td>
              </tr>
              <?php
                  $total_price += ($product["price"] * $product["quantity"]);
                }
                ?>
              <tr>
                <td colspan="5" align="right">
                  <strong>TOTAL: <?php echo "R" . $total_price; ?></strong>
                </td>
                <td>
                  <input type="submit" class="btn btn-outline-light" value="CheckOut">
                  <?php
                    $_SESSION['totalprice'] = '$total_price';
                    ?>
                </td>
              </tr>
            </tbody>
          </table>
        </form>
        <?php
        } else {
          echo "<h3>Your cart is empty!</h3>";
        }
        ?>
      </div>

      <div style="clear:both;"></div>

      <div class="message_box" style="margin:10px 0px;">
        <?php echo $status; ?>
      </div>


    </div>
  </div>
</body>

</html>

<style>
  a {
    color: black;
  }
</style>