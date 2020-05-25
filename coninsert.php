<?php
    // Include config file
    require_once "config.php";
    
    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    $email = $_POST["email"];
    $comment = $_POST["comment"];

    if($fname == ''){
        echo '<script language="javascript"> alert("Name not entered") </script>';
    }else if($lname == ''){
        echo '<script language="javascript"> alert("Last name not entered") </script>';
    }else if($email == ''){
        echo '<script language="javascript"> alert("There is no email") </script>';
    }else if($comment == ''){
        echo '<script language="javascript"> alert("There is no comment") </script>';
    }else{
        $sql = "INSERT INTO contact (fname, lname, email, comment) VALUES ('$fname','$lname','$email','$comment')";
        if($conn->query($sql) === TRUE){
            echo "New recored created successfully";
            header("Location: contact.php");
        }else{
            echo "Error: " . $sql . "</br>" . $conn->error;
        }
        $conn->close();
    }
    header("Location: contact.php"); 
    
?>
