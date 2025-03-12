<?php
// Include database configuration
include 'config.php';

// Retrieve form data and ensure empty values are stored as blank
$customer_name = isset($_POST['customer-name']) ? $_POST['customer-name'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : ""; // New email field
$phone = isset($_POST['phone']) ? $_POST['phone'] : "";
$date = isset($_POST['date']) ? $_POST['date'] : "";
$time = isset($_POST['time']) ? $_POST['time'] : "";
$service = isset($_POST['service']) ? $_POST['service'] : "";
$stylist = isset($_POST['stylist']) ? $_POST['stylist'] : "";
$notes = isset($_POST['notes']) ? $_POST['notes'] : "";
$status = isset($_POST['status']) ? $_POST['status'] : "Pending";
$tip = isset($_POST['tip']) ? $_POST['tip'] : "0"; // Default tip value is 0

// Prepare SQL statement with email
$sql = "INSERT INTO appointments (customer_name, email, phone, date, time, service, stylist, notes, status, tip)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Prepare statement
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssss", $customer_name, $email, $phone, $date, $time, $service, $stylist, $notes, $status, $tip);

// Execute the statement
if ($stmt->execute()) {
    header("Location: manage_appointment.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>
