<?php
session_start();
require_once "config.php";

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

$userid = $_SESSION["id"];

$arCart = $_SESSION["shopping_cart"];
foreach ($_SESSION["shopping_cart"] as $product) {

    $prodname = $product["name"];

    $prodcode = $product["code"];

    $prodq = $product["quantity"];

    $total = ($product["price"] * $product["quantity"]);

    $userid = $_SESSION["id"];

    $sql = "INSERT INTO sold (userid, prodid, prodname ,prodq, total) VALUES ('$userid','$prodcode','$prodname','$prodq','$total')";

    if ($conn->query($sql) === TRUE) {
        echo '<script language="javascript">';
        echo 'alert("Your order is been sent")';
        echo '</script>';
        header("Location:index.php");
        unset($_SESSION['shopping_cart']);
    } else {
        echo "Error: " . $sql . "</br>" . $conn->error;
    };
}
$conn->close();
?>
