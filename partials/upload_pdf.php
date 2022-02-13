<?php
// connect to the database
include 'db_connect.php';
$sql = "SELECT * FROM `notes`";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $n_name = $_POST["name"];
    $n_desc = $_POST["desc"];
    //
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = '../pdf_uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) 
    {
        echo "<script>alert('File Not Supported')</script>";
        echo "<script>window.open('../upload_pdf.html','_self')</script>";
    } 
    elseif ($_FILES['myfile']['size'] > 4000000) { // file shouldn't be larger than 4MB
        echo "<script>alert('File Is Too Large')</script>";
        echo "<script>window.open('../upload_pdf.html','_self')</script>";
    } 
    else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO `notes` (`n_name`, `n_desc`, `n_pdf`, `size`, `downloads`) VALUES ('$n_name', '$n_desc', '$filename', '$size', 0)";

            if (mysqli_query($conn, $sql)) { 
                echo "<script>alert('Uploaded Successfully!')</script>";
                echo "<script>window.open('../upload_pdf.html','_self')</script>";
            }
        } else {
            echo "<script>alert('Uploaded Unsuccessful!')</script>";
            echo "<script>window.open('../contact.html','_self')</script>";
        }
    }
}
//Downloads
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM `notes` WHERE 'n_id'=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../pdf_uploads/' . $file['n_name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename= file.pdf');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../pdf_uploads/' . $file['n_name']));
        readfile('../pdf_uploads/' . $file['n_name']);

    }

}
?>