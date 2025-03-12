<?php
include 'auth.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
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
                    <h3 class="mb-4"><i class="fas fa-user-plus"></i> Add Employee</h3>
                    
                    <form id="employeeForm" action="add_employee_action.php" method="post">
                        <div class="row">
                            <!-- Employee Name (Required) -->
                            <div class="col-md-12 mb-3">
                                <label for="employee-name" class="form-label">Employee Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="employee-name" name="employee-name" required>
                                <div class="invalid-feedback">Employee Name is required.</div>
                            </div>
                            
                            <!-- Employee Email (Required) -->
                            <div class="col-md-12 mb-3">
                                <label for="employee-email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="employee-email" name="employee-email" required>
                                <div class="invalid-feedback">Valid email is required.</div>
                            </div>
                            
                            <!-- Employee Phone -->
                            <div class="col-md-12 mb-3">
                                <label for="employee-phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="employee-phone" name="employee-phone">
                            </div>
                            
                            <!-- Employee Position -->
                            <div class="col-md-12 mb-3">
                                <label for="employee-position" class="form-label">Position</label>
                                <select class="form-control" id="employee-position" name="employee-position">
                                    <option value="">Select Position</option>
                                    <option value="Manager">Manager</option>
                                    <option value="Developer">Developer</option>
                                    <option value="Designer">Designer</option>
                                    <option value="HR">HR</option>
                                    <option value="Sales">Sales</option>
                                    <option value="Sales">Stylist</option>
                                </select>
                            </div>
                            
                            <!-- Submit Button -->
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-user-plus"></i> Add Employee
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
