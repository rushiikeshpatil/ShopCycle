<?php
include 'db_connect.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $password = $_POST["password"];

    $sql="SELECT u_email FROM `user` WHERE u_email='$email'";
    
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if($num==0)
    {
        $sql="INSERT INTO `user` (`u_name`, `u_email`, `u_phone`, `u_address`, `u_password`) VALUES ('$name','$email', '$phone', '$address', '$password')";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "<script>alert('User Registered Successfully!')</script>";
            echo "<script>window.open('../index.html','_self')</script>";
        }
        else{
            echo "<script>alert('Something went Wrong!')</script>";
        echo "<script>window.open('../contact.html','_self')</script>";
        }
    }
    else{
        echo "<script>alert('Email Already Exists!')</script>";
        echo "<script>window.open('../register.html','_self')</script>";
    }
 }
?>