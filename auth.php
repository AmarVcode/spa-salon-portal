<?php
session_start(); // Start the session

// Check if the user is NOT logged in and prevent redirect loop
if (!isset($_SESSION['user']) && basename($_SERVER['PHP_SELF']) !== 'login.php') {
    header("Location: login.php");
    exit();
}
?>
