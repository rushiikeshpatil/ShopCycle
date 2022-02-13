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
    $folder = "../img_uploads/" . $filename;

    // Get all the submitted data from the form
    $sql = "INSERT INTO `material` (`m_name`, `m_desc`, `m_price`, `m_img`, `m_phone`, `m_address`) VALUES ('$name', '$desc', '$price','$filename', '$phone', '$address')";

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


<?php 
// // Include the database configuration file  
// include 'db_connect.php'; 
 
// // If file upload form is submitted 
// $status = $statusMsg = ''; 
// if(isset($_POST["upload"])){ 
//     $name = $_POST["name"];
//     $desc = $_POST["desc"];
//     $price = $_POST["price"];
//     $phone = $_POST["phone"];
//     $address = $_POST["address"];
//     $status = 'error'; 
//     if(!empty($_FILES["m_img"]["name"])) { 
//         // Get file info 
//         $fileName = basename($_FILES["../img_uploads"]["name"]); 
//         $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
//         // Allow certain file formats 
//         $allowTypes = array('jpg','png','jpeg','gif'); 
//         if(in_array($fileType, $allowTypes)){ 
//             $image = $_FILES['m_img']['tmp_name']; 
//             $imgContent = addslashes(file_get_contents($image)); 
         
//             // Insert image content into database 
//             $insert = $db->query("INSERT INTO `material` (`m_name`, `m_desc`, `m_price`, `m_img`, `m_phone`, `m_address`) VALUES ('$name', '$desc', '$price','$imgContent', '$phone', '$address')"); 
             
//             if($insert){ 
//                 $status = 'success'; 
//                 $statusMsg = "File uploaded successfully."; 
//             }else{ 
//                 $statusMsg = "File upload failed, please try again."; 
//             }  
//         }else{ 
//             $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
//         } 
//     }else{ 
//         $statusMsg = 'Please select an image file to upload.'; 
//     } 
// } 
 
// // Display status message 
// echo $statusMsg; 
// ?>