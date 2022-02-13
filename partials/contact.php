<?php
include 'db_connect.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $msg = $_POST["msg"];
    
    
        $sql="INSERT INTO `contact` (`c_name`, `c_email`, `c_subject`, `c_msg`) VALUES ('$name', '$email', '$subject', '$msg')";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "<script>alert('Thank You for Contacting Us!')</script>";
            echo "<script>window.open('../','_self')</script>";
        }
        else{
            echo "<script>alert('Sorry but the email didn't go through. Please Try Again!')</script>";
        }
    }
?>