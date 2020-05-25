<?php
    // Include config file
    require_once "config.php";
    
    $name = $_POST["name1"];
    $price = $_POST["price1"];
    $description = $_POST["description1"];
    $img = $_POST["img1"];
    $ID = $_POST["id1"];

    if($name != ''){
        $sql = "UPDATE products SET name = '$name' WHERE ID = $ID";
        if($conn->query($sql) === FALSE){
            echo "Error: " . $sql . "</br>" . $conn->error;
        }
    }
    
    if($price != ''){
        $sql = "UPDATE products SET price = '$price' WHERE ID = $ID";
        if($conn->query($sql) === FALSE){
            echo "Error: " . $sql . "</br>" . $conn->error;
        }
    }
    
    if($description != ''){
        $sql = "UPDATE products SET description = '$description' WHERE ID = $ID";
        if($conn->query($sql) === FALSE){
            echo "Error: " . $sql . "</br>" . $conn->error;
        }
    }

    if($img != ''){ 
        $sql = "UPDATE products SET img = '$img' WHERE ID = $ID";
        if($conn->query($sql) === FALSE){
            echo "Error: " . $sql . "</br>" . $conn->error;
        }
    }

    if($conn->query($sql) === TRUE){
        echo " Successfully edited";
        header("Location: admin.php");
    }else{
        echo "Error: " . $sql . "</br>" . $conn->error;
    }
    
    
    $conn->close();
    
?>