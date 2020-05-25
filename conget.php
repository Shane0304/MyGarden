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
    <title>Home</title>
</head>

<body class="index">
    <nav class="navbar navbar-expand-md nav-colour navbar-light sticky-top">
        <!-- Brand logo -->
        <img src="img/LogoTop.JPG" type="image/jpg" width="50" height="50">
        &nbsp&nbsp
        <a class="navbar-brand" href="index.html">Cantacted US</a>
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
    <div class="index">
        <?php
        // Include config file
        require_once "config.php";

        $sql = "SELECT * FROM contact";

        $result = $conn->query($sql);
        echo "<table class='vview'>
        <tr class='odd'>
          <th class='tthd'>Name</th>
          <th class='tthd' >Surname</th>
          <th class='tthd' >Email</th>
          <th class='tthd' >Comment</th>
        </tr>
        
        ";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {


                echo "<tr class='odd'><td class='tthd'>" . $row['fname'] . "&nbsp</td> <td class='tthd'> " . $row['lname'];
                echo "</td> <td class='tthd'>" . $row['email'] . "</td><td class='tthd'>"  . $row['comment'] . "</td>";

                echo "<td class='tthd'> <form method='POST' action='contactremove.php'>
                                    <input type='hidden' id='id' name='id' value=" . $row["ID"] . " />
                                    <input type='hidden' name='action' value='remove' />
                                    <button type='submit' class='btn btn-warning' >Remove</button>
                                </form> </td> </tr>";
            }
        } else {
            echo "<td class='tthd'>Opps there are no customers contacting you</td>";
        }
        $conn->close();

        echo "</table> ";
        ?>
        <div>
</body>
<style>
    .vview {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    .tthd {
        border: 1px solid #565825;
        text-align: left;
        padding: 8px;
    }

    .odd:nth-child(even) {
        background-color: #565825;
    }
</style>