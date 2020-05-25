<?php
// Include config file
require_once "config.php"; 

$id = $_POST["id"];
// sql to delete a record
$sql = "DELETE FROM products WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully.
    ";
    header("Location: admin.php"); 
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
