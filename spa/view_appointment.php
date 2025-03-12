<?php
include 'auth.php';
include 'config.php';

// Get appointment ID from query parameter
if (isset($_GET['id'])) {
    $appointment_id = $_GET['id'];

    // Fetch appointment details
    $stmt = $conn->prepare("SELECT * FROM appointments WHERE id = ?");
    $stmt->bind_param("i", $appointment_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $appointment = $result->fetch_assoc();
    } else {
        echo "<script>window.location.href='appointments.php';</script>";
        exit();
    }
} else {
    echo "<script>window.location.href='appointments.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Appointment</title>
    <?php include "includecss.php"; ?>
    <?php include "includejs.php"; ?>
</head>

<body>
    <?php include "header.php"; ?>

    <div class="container mt-5 view_ui">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header ">
                        <i class="fas fa-calendar-alt"></i> Appointment Details
                    </div>
                    <div class="card-body">
                        <div class="info-item">
                            <i class="fas fa-user info-icon"></i>
                            <div class="info-label">Customer Name</div>
                            <div class="info-value"><?php echo htmlspecialchars($appointment['customer_name']); ?></div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-envelope info-icon"></i>
                            <div class="info-label">Email</div>
                            <div class="info-value"><?php echo htmlspecialchars($appointment['email']); ?></div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-phone info-icon"></i>
                            <div class="info-label">Phone No</div>
                            <div class="info-value"><?php echo htmlspecialchars($appointment['phone']); ?></div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-calendar-day info-icon"></i>
                            <div class="info-label">Appointment Date</div>
                            <div class="info-value"><?php echo htmlspecialchars($appointment['date']); ?></div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-clock info-icon"></i>
                            <div class="info-label">Appointment Time</div>
                            <div class="info-value"><?php echo htmlspecialchars($appointment['time']); ?></div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-cut info-icon"></i>
                            <div class="info-label">Service</div>
                            <div class="info-value"><?php echo htmlspecialchars($appointment['service']); ?></div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-user-tie info-icon"></i>
                            <div class="info-label">Stylist Name</div>
                            <div class="info-value"><?php echo htmlspecialchars($appointment['stylist']); ?></div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-sticky-note info-icon"></i>
                            <div class="info-label">Notes</div>
                            <div class="info-value"><?php echo nl2br(htmlspecialchars($appointment['notes'])); ?></div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-info-circle info-icon"></i>
                            <div class="info-label">Status</div>
                            <div class="info-value">
                                <?php
                                $status = $appointment['status'];
                                $status_class = $status == 'Completed' ? 'badge bg-success' :
                                    ($status == 'Pending' ? 'badge bg-warning text-dark' : 'badge bg-danger');
                                echo "<span class='$status_class'>$status</span>";
                                ?>
                            </div>
                        </div>

                        <div class="mt-4">
                            <a href="appointments.php" class="btn btn-back">
                                <i class="fas fa-arrow-left"></i> Back to Appointments
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
