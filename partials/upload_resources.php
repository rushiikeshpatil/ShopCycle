<?php
include 'db_connect.php';

if (isset($_POST['upload'])) {
    $name = $_POST["name"];
    $desc = $_POST["desc"];
    $price = $_POST["price"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../uploads/" . $filename;

    // Get all the submitted data from the form
    $sql = "INSERT INTO `material` (`m_name`, `m_desc`, `m_price`, `m_img`, `m_phone`, `m_address`) VALUES ('$name', '$desc', '$price','.$filename.', '$phone', '$address')";

    // Execute query
    mysqli_query($conn, $sql);

    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        echo "<script>alert('Uploaded Successfully!')</script>";
        echo "<script>window.open('../upload_resources.html','_self')</script>";
    } else {
        echo "<script>alert('Uploaded Unsuccessful!')</script>";
        echo "<script>window.open('../contact.html','_self')</script>";

        $result = mysqli_query($conn, "SELECT * FROM material");
    }
}
?>