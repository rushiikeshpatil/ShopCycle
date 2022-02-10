<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'db_connect.php';
    
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql="SELECT u_email, u_password FROM `user` WHERE u_email='$email' AND u_password='$password'";
    
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if($num==1)
    {
        echo "<script>alert('You logged in successfully!')</script>";
            echo "<script>window.open('../index.html','_self')</script>";
    }
    else{
        echo "<script>alert('You logged in unsuccessfully!')</script>";
        echo "<script>window.open('../register.html','_self')</script>";
    }
 }
?>