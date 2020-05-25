<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = $lname = $fname  = $address = "";
$username_err = $password_err = $confirm_password_err = $lname_err = $fname_err = $address_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // store result
                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        $stmt->close();
    }


    if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $username_err = "Invalid email format";
    } else {
        $username = trim($_POST["username"]);
    }


    // Validate name
    if (empty(trim($_POST["fname"]))) {
        $fname_err = "Please enter a first name.";
    } else {
        $fname = trim($_POST["fname"]);
    }

    // Validate surname
    if (empty(trim($_POST["lname"]))) {
        $lname_err = "Please enter a last name.";
    } else {
        $lname = trim($_POST["lname"]);
    }

    // Validate surname
    if (empty(trim($_POST["address"]))) {
        $address_err = "Please enter a address.";
    } else {
        $address = trim($_POST["address"]);
    }


    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($fname_err) && empty($lname_err) && empty($address_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, fname, lname, address) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssss", $param_username, $param_password, $param_fname, $param_lname, $param_address);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_fname = $fname;
            $param_lname = $lname;
            $param_address = $address;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to login page
                header("location: login.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        $stmt->close();
    }

    // Close connection
    $conn->close();
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
    <!--Title for top-->
    <title>ITEC301 Question 2 &#124; Sign Up</title>
    <!--Icon for top-->
    <link rel="icon" href="img/LogoTop.JPG" sizes="16x16" type="image/jpg">

    <!-- Java Scrypt-->
    <script src="js/jquery2.js"></script>
    <script src="js/javascrypt.js"></script>

    <!-- My CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- Bootstrap Resources -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>

    <!-- Fonts Awesome-->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="index">
    <div class="con" style="background-color: #423733;">
        <div class="contop">

            <h2>Sign Up</h2>
            <p>Please fill this form to create an account.</p>

        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Email(Username)*</label>
                <input class="conin" type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($fname_err)) ? 'has-error' : ''; ?>">
                <label>First Name*</label>
                <input class="conin" type="text" name="fname" class="form-control" value="<?php echo $fname; ?>">
                <span class="help-block"><?php echo $fname_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($lname_err)) ? 'has-error' : ''; ?>">
                <label>Surname*</label>
                <input class="conin" type="text" name="lname" class="form-control" value="<?php echo $lname; ?>">
                <span class="help-block"><?php echo $lname_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                <label>Address*</label>
                <textarea value="<?php echo $address; ?>" class="conin" name="address" style="height:200px"></textarea>
                <span class="help-block"><?php echo $address_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password*</label>
                <input type="password" name="password" class="conin " value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password*</label>
                <input type="password" name="confirm_password" class=" conin " value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
            <p>Go back to the site? <a href="index.php">Here</a>.</p>
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
</body>

</html>