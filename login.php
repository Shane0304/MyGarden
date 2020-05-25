<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him index
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index.php");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT id, username, password, type FROM users WHERE username = ?";

        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Store result
                $stmt->store_result();

                // Check if username exists, if yes then verify password
                if ($stmt->num_rows == 1) {
                    // Bind result variables
                    $stmt->bind_result($id, $username, $hashed_password, $type);
                    if ($stmt->fetch()) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;


                            // Redirect user to  page
                            if ($type == 0) {
                                header("location: index.php");
                            } else {
                                header("location: admin.php");
                                $_SESSION["admin"] = true;
                            }
                        } else {
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else {
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
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
    <title>ITEC301 Question 2 &#124; Login</title>
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

<body class="index">
    <div class="con" style="background-color: #423733;">
        <div class="contop">
            <h2>Login</h2>
            <p>Please fill in your credentials to login.</p>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="conin" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="conin">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
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