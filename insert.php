<?php

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
    };
    // Include config file
    require_once "config.php";
    
    $name = $_POST["name"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $img = $_POST["img"];
    $code = generateRandomString();
    if($name == ''){
        echo '<script language="javascript"> alert("Name not entered") </script>';
    }else if($price == ''){
        echo '<script language="javascript"> alert("There has to be a price") </script>';
    }else if($description == ''){
        echo '<script language="javascript"> alert("There is no description") </script>';
    }else if($img == ''){
        echo '<script language="javascript"> alert("make it nice add a picture") </script>';
    }else if($code == ''){
        echo '<script language="javascript"> alert("please add a code") </script>';
    }else{
        $sql = "INSERT INTO products (name, price, description, img, code) VALUES ('$name','$price','$description','$img', '$code')";
        if($conn->query($sql) === TRUE){
            echo "New recored created successfully ";
            header("Location: admin.php");

        }else{
            echo "Error: " . $sql . "</br>" . $conn->error;
        }
        $conn->close();
    }
    
    
?>
