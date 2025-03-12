<?php
include 'auth.php';
include 'config.php'; // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['employee-name']);
    $email = trim($_POST['employee-email']);
    $phone = trim($_POST['employee-phone']);
    $position = trim($_POST['employee-position']);

    // Validate required fields
    if (empty($name) || empty($email)) {
        echo "Employee name and email are required.";
        exit;
    }

    // Insert into database
    $sql = "INSERT INTO employees (name, email, phone, position) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $phone, $position);

    if ($stmt->execute()) {
        echo "Employee added successfully!";
        header("Location: manage_employee.php"); // Redirect to employee list page
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
