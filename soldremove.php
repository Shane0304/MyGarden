<?php
// Include config file
require_once "config.php"; 

// sql to delete a record
$sql = "DELETE FROM sold WHERE ids ='". $_POST["id"] ."'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully. ";
    header("Location: prodsold.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>