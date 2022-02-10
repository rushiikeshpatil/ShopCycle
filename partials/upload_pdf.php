<?php
    include 'db_connect.php';

    if (isset($_POST['submit'])) {
        $name = $_POST["name"];
        $desc = $_POST["desc"];
        

        $pdf = $_FILES['pdf']['name'];
        $pdf_type = $_FILES['pdf']['type'];
        $pdf_size = $_FILES['pdf']['size'];
        $pdf_tem_loc = $_FILES['pdf']['tmp_name'];
        $pdf_store = "pdf/" . $pdf;

        move_uploaded_file($pdf_tem_loc, $pdf_store);

        $sql = "INSERT INTO `notes` (`n_name`, `n_desc`, `n_pdf`) VALUES ('$name', '$desc','$pdf')";

        $result = mysqli_query($conn, $sql);
        if($result){
            echo "<script>alert('Uploaded Successfully!')</script>";
            echo "<script>window.open('../upload_pdf.html','_self')</script>";
        }
        else{
            echo "<script>alert('Uploaded Unsuccessful!')</script>";
            echo "<script>window.open('../contact.html','_self')</script>";
        }
    
    }
?>