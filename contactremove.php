<?php
// Include config file
require_once "config.php"; 

// sql to delete a record
$sql = "DELETE FROM contact WHERE id ='". $_POST["id"] ."'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully.
    ";
    header("Location: conget.php"); 
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>