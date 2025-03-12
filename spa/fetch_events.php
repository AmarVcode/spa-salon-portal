<?php
include 'config.php'; // Database connection

$query = "SELECT id, customer_name, service, date, time, status FROM appointments";
$result = mysqli_query($conn, $query);

$events = [];

while ($row = mysqli_fetch_assoc($result)) {
    $events[] = [
        'id'    => $row['id'],
        'title' => $row['customer_name'] . " - " . $row['service'],
        'start' => $row['date'] . 'T' . $row['time'], // Date + Time format
        'status' => strtolower($row['status']) // Send status to JS
    ];
}

echo json_encode($events);
?>
