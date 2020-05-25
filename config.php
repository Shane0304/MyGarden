<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "itec301";

    #create/check connecction 
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    
?>

