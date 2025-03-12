<?php
include 'auth.php';
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = trim($_POST['employee-name']);
    $email = trim($_POST['employee-email']);
    $phone = trim($_POST['employee-phone']);
    $position = trim($_POST['employee-position']);

    // Validate required fields
    if (empty($name)) {
        echo "<script>alert('Employee name is required!'); window.history.back();</script>";
        exit();
    }

    // Update query
    $stmt = $conn->prepare("UPDATE employees SET name = ?, email = ?, phone = ?, position = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $name, $email, $phone, $position, $id);

    if ($stmt->execute()) {
        echo "<script>window.location.href='manage_employee.php';</script>";
    } else {
        echo "<script>window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Invalid request!'); window.location.href='manage_employee.php';</script>";
    exit();
}
?>
