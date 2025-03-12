<?php
// config.php

$servername = "localhost"; 
$username = "root";       
$password = "";           
$dbname = "spa-salon";      

// $servername = "localhost"; 
// $username = "shamorfc_spa-admin";       
// $password = "@4m4A4r4";           
// $dbname = "shamorfc_spa-salon";      

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
