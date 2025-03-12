<?php
include 'auth.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Appointment</title>
    <?php
    include "includecss.php";
    ?>
    <?php
    include "includejs.php";
    ?>
</head>

<body>
    <?php
    include "header.php";
    ?>
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
                    <h3 class="mb-4"><i class="fas fa-calendar-plus"></i> Book an Appointment</h3>

                    <form id="appointmentForm" action="add_appointment_action.php" method="POST">
                        <div class="row">
                            <!-- Hidden Input for Tip -->
                            <input type="hidden" name="tip" value="0">

                            <!-- Customer Name (Required) -->
                            <div class="col-md-6 mb-3">
                                <label for="customer-name" class="form-label">Customer Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="customer-name" name="customer-name"
                                    required>
                                <div class="invalid-feedback">Customer Name is required.</div>
                            </div>

                            <!-- Email (Required) -->
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                <div class="invalid-feedback">Email is required.</div>
                            </div>


                            <!-- Phone Number (Required) -->
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone No <span
                                        class="text-danger">*</span></label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                                <div class="invalid-feedback">Phone number is required.</div>
                            </div>

                            <!-- Appointment Date -->
                            <div class="col-md-6 mb-3">
                                <label for="date" class="form-label">Appointment Date <span
                                        class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="date" name="date" required>
                                <div class="invalid-feedback">Please select a date.</div>
                            </div>

                            <!-- Appointment Time -->
                            <div class="col-md-6 mb-3">
                                <label for="time" class="form-label">Appointment Time <span
                                        class="text-danger">*</span></label>
                                <input type="time" class="form-control" id="time" name="time" required>
                                <div class="invalid-feedback">Please select a time.</div>
                            </div>

                            <!-- Service Selection -->
                            <div class="col-md-6 mb-3">
                                <label for="service" class="form-label">Service <span
                                        class="text-danger">*</span></label>
                                <select class="form-select" id="service" name="service" required>
                                    <option value="" selected disabled>Select a service</option>
                                    <option>Haircut</option>
                                    <option>Coloring</option>
                                    <option>Styling</option>
                                </select>
                                <div class="invalid-feedback">Please select a service.</div>
                            </div>

                            <!-- Stylist Name -->
                            <div class="col-md-6 mb-3">
                                <label for="stylist" class="form-label">Stylist Name</label>
                                <input type="text" class="form-control" id="stylist" name="stylist">
                            </div>

                            <!-- Additional Notes -->
                            <div class="col-md-12 mb-3">
                                <label for="notes" class="form-label">Additional Notes</label>
                                <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                            </div>

                            <!-- Status Selection -->
                            <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="Pending">Pending</option>
                                    <option value="Cancelled">Cancelled</option>
                                    <option value="Completed">Completed</option>
                                </select>
                                <div class="invalid-feedback">Please select a status.</div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-calendar-check"></i> Book Appointment
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