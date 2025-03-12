<?php
include 'auth.php';
include 'config.php'; // Ensure you have a database connection

// Get appointment ID from query parameter
if (isset($_GET['id'])) {
    $appointment_id = $_GET['id'];

    // Fetch existing appointment details
    $stmt = $conn->prepare("SELECT * FROM appointments WHERE id = ?");
    $stmt->bind_param("i", $appointment_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $appointment = $result->fetch_assoc();
    } else {
        echo "Appointment not found!";
        exit();
    }
} else {
    echo "Invalid request!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Appointment</title>
    <?php include "includecss.php"; ?>
    <?php include "includejs.php"; ?>
</head>

<body>
    <?php include "header.php"; ?>

    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            border-radius: 12px;
            
        }

        .form-label {
            font-weight: 600;
        }
    </style>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card p-4 card_form_container">
                    <h3 class=" mb-4"><i class="fas fa-edit"></i> Edit Appointment</h3>

                    <form id="editAppointmentForm" action="update_appointment_action.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $appointment['id']; ?>">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="customer-name" class="form-label">Customer Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="customer-name" name="customer-name" required value="<?php echo $appointment['customer_name']; ?>">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone No <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" id="phone" name="phone" required value="<?php echo $appointment['phone']; ?>">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="date" class="form-label">Appointment Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="date" name="date" required value="<?php echo $appointment['date']; ?>">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="time" class="form-label">Appointment Time <span class="text-danger">*</span></label>
                                <input type="time" class="form-control" id="time" name="time" required value="<?php echo $appointment['time']; ?>">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="service" class="form-label">Service <span class="text-danger">*</span></label>
                                <select class="form-select" id="service" name="service" required>
                                    <option value="Haircut" <?php echo ($appointment['service'] == "Haircut") ? "selected" : ""; ?>>Haircut</option>
                                    <option value="Coloring" <?php echo ($appointment['service'] == "Coloring") ? "selected" : ""; ?>>Coloring</option>
                                    <option value="Styling" <?php echo ($appointment['service'] == "Styling") ? "selected" : ""; ?>>Styling</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="stylist" class="form-label">Stylist Name</label>
                                <input type="text" class="form-control" id="stylist" name="stylist" value="<?php echo $appointment['stylist']; ?>">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="notes" class="form-label">Additional Notes</label>
                                <textarea class="form-control" id="notes" name="notes" rows="3"><?php echo $appointment['notes']; ?></textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="Pending" <?php echo ($appointment['status'] == "Pending") ? "selected" : ""; ?>>Pending</option>
                                    <option value="Cancelled" <?php echo ($appointment['status'] == "Cancelled") ? "selected" : ""; ?>>Cancelled</option>
                                    <option value="Completed" <?php echo ($appointment['status'] == "Completed") ? "selected" : ""; ?>>Completed</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-save"></i> Update Appointment
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
