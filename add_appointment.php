<?php
include 'auth.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Appointmnet</title>
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
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: 600;
        }
    </style>
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card p-4">
                    <h3 class="text-center mb-4"><i class="fas fa-calendar-plus"></i> Book an Appointment</h3>
                    
                    <form id="appointmentForm" novalidate>
                        <div class="row">
                            <!-- Customer Name (Required) -->
                            <div class="col-md-6 mb-3">
                                <label for="customer-name" class="form-label">Customer Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="customer-name" name="customer-name" required>
                                <div class="invalid-feedback">Customer Name is required.</div>
                            </div>

                            <!-- Phone Number (Required) -->
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone No <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                                <div class="invalid-feedback">Phone number is required.</div>
                            </div>

                            <!-- Appointment Date -->
                            <div class="col-md-6 mb-3">
                                <label for="date" class="form-label">Appointment Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="date" name="date" required>
                                <div class="invalid-feedback">Please select a date.</div>
                            </div>

                            <!-- Appointment Time -->
                            <div class="col-md-6 mb-3">
                                <label for="time" class="form-label">Appointment Time <span class="text-danger">*</span></label>
                                <input type="time" class="form-control" id="time" name="time" required>
                                <div class="invalid-feedback">Please select a time.</div>
                            </div>

                            <!-- Service Selection -->
                            <div class="col-md-6 mb-3">
                                <label for="service" class="form-label">Service <span class="text-danger">*</span></label>
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

                            <!-- Status Toggle -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Status</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="status" checked>
                                    <label class="form-check-label" for="status">Confirmed</label>
                                </div>
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


<script>
    // Bootstrap validation
    (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })();
</script>
</body>
</html>
