<?php
include 'db_connect.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    if ($password!=$cpassword){
        echo "<script>alert('Password doesnot match!')</script>";
        echo "<script>window.open('../register.html','_self')</script>";

    }
    
    $sql="SELECT u_email FROM `user` WHERE u_email='$email'";
    
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if($num==0)
    {
        $sql="INSERT INTO `user` (`u_name`, `u_email`, `u_password`) VALUES ('$name', '$email', '$password')";
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