<!DOCTYPE html>
<html lang="en">

<head>
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
    <title>Home</title>
</head>

<body class="index">
    <nav class="navbar navbar-expand-md nav-colour navbar-light sticky-top">
        <!-- Brand logo -->
        <img src="img/LogoTop.JPG" type="image/jpg" width="50" height="50">
        &nbsp&nbsp
        <a class="navbar-brand" href="index.html">My Garden</a>
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar links -->
        <div class="collapse navbar-collapse row justify-content-center" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-dark" href="index.php"><b>Go To Site</b></a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link btn btn-outline-success' href='admin.php'><b>Admin</b></a>
                </li>
            </ul>
        </div>
    </nav>
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
    </style>

    <div class="jumbotron">
        <h1>Products</h1>
    </div>
    <div class='r'>
        <?php
        // Include config file
        require_once "config.php";
        $sql = "SELECT id, name, price, description, img FROM products";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo
                    "
        <div class='card c' style='width:400px height:50%'>
            
            <img src=\"img/" . $row['img'] . "\" />
            <div class='card-body'>
                <p>
                    <h4>The ID is: " . $row['id'] . " </h4>
                    <h3>" . $row['name'] . "</h3>
                    <p>" . $row['price'] . "</br>" . $row['description'] . "</p>
                </p>
            </div>
        </div>
    
    ";
            }
        } else {
            echo "<p>No product yet come back soon</p>";
        }
        $conn->close();
        ?>
    </div>
    </div>


</body>

</html>