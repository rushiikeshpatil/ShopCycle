<?php
 
//connect to mysql server with username password and database name
include'partials/db_connect.php';
 
 
// create query to select data
$sql = "SELECT * FROM material";
if ($result = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo '<table border="1px">';
        echo "<tr>";
        echo "<th>Product Name</th>";
        echo "<th>Price (INR)</th>";
        echo "<th>Category</th>";
        echo "<th>Image</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['m_name'] . "</td>";
            echo "<td>" . $row['m_price'] . "</td>";
            echo "<td>" . $row['m_desc'] . "</td>";
            echo "<td>" . "<img src=".$row['m_img'].' width=100px height="100px">' . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else {
        echo "No records found";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// Close connection
mysqli_close($conn);
?>