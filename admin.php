<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: login.php");
  exit;
}
?>
<!DOCTYPE html>
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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
  <title>Admin</title>
</head>

<body class="admin">

  <div class="jumbotron">
    <h1>Admin Panel</h1>
    <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
    <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    <a href="index.php" class="btn btn-primary">Go to Site</a>
  </div>
  <div class="r">

    <div class="c">
      <h2>Add Products</h2>
      <form action="insert.php" method="POST">
        <div class="form-group">
          <label for="name">Name</label>
          <input class="form-control" id="name" name="name" type="text">
        </div>
        <div class="form-group">
          <label for="price">Price</label>
          <input class="form-control" id="price" name="price" type="text">
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" id="description" name="description" type="text"></textarea>
        </div>
        <div class="form-group">
          <label for="description">image name</label>
          <input class="form-control" id="img" name="img" type="text">
        </div>

        <input class="btn btn-outline-info" type="submit" value="Add Product">
        <input class="btn btn-outline-danger" type=reset>
      </form>

    </div>

    <div class="c">
      <h2>Edit</h2>
      <form action="update.php" method="POST">
        <div class="form-group">
          <label for="id1">ID</label>
          <input class="form-control" id="id1" name="id1" type="text">
        </div>
        <div class="form-group">
          <label for="name1">Name</label>
          <input class="form-control" id="name1" name="name1" type="text">
        </div>
        <div class="form-group">
          <label for="price1">Price</label>
          <input class="form-control" id="price1" name="price1" type="text">
        </div>
        <div class="form-group">
          <label for="description1">Description</label>
          <textarea class="form-control" id="description1" name="description1" type="text"></textarea>
        </div>
        <div class="form-group">
          <label for="img1">image name</label>
          <input class="form-control" id="img1" name="img1" type="text">
        </div>
        <input class="btn btn-outline-info" type="submit" value="Edit">
        <input class="btn btn-outline-danger" type=reset>

      </form>
    </div>


    <div class=" c">
      <form action="delete.php" method="POST">
        <h2>Delete with product id</h2>
        <div class="form-group">
          <label for="price">Enter the ID of the product that is to be deleted</label>
          <input class="form-control" id="id" name="id" type="text">
        </div>
        <input class="btn btn-outline-danger btn-lg" type="submit" value="Delete ">
      </form>

      <form action="get.php" method="POST">
        <br>
        <input class="btn btn-outline-success btn-lg" type="submit" value="Get all of products with the ID">
      </form>


      <form action="prodsold.php" method="POST">
        <br>
        <input class="btn btn-outline-success btn-lg" type="submit" value="See all sold products">
      </form>

      <form action="conget.php" method="POST">
        <br>
        <input class="btn btn-outline-success btn-lg" type="submit" value="People contacted us(Queries)">
      </form>

    </div>



  </div>
</body>
<style>

</style>

</html>