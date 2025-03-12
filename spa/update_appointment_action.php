<?php
include 'auth.php';
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $customer_name = $_POST['customer-name'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $service = $_POST['service'];
    $stylist = $_POST['stylist'];
    $notes = $_POST['notes'];
    $status = $_POST['status'];

    // Update query
    $stmt = $conn->prepare("UPDATE appointments SET customer_name=?, phone=?, date=?, time=?, service=?, stylist=?, notes=?, status=? WHERE id=?");
    $stmt->bind_param("ssssssssi", $customer_name, $phone, $date, $time, $service, $stylist, $notes, $status, $id);

    if ($stmt->execute()) {
        echo "<script>window.location.href='manage_appointment.php';</script>";
    } else {
        echo "<script>alert('Error updating appointment.'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request!";
}
?>
