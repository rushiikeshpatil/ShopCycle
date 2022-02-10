<?php

$username = "root";
$password = "";
$database = "hackcube";

$conn = mysqli_connect("localhost", $username, $password, $database);
if(!$conn)
{
    die(mysqli_connect_error());
}
?>