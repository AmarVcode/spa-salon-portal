<?php
include 'auth.php';
include 'config.php';

// Get employee ID from query parameter
if (isset($_GET['id'])) {
    $employee_id = $_GET['id'];

    // Fetch employee details
    $stmt = $conn->prepare("SELECT * FROM employees WHERE id = ?");
    $stmt->bind_param("i", $employee_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $employee = $result->fetch_assoc();
    } else {
        echo "<script>alert('Employee not found!'); window.location.href='employees.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Invalid request!'); window.location.href='employees.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <?php include "includecss.php"; ?>
    <?php include "includejs.php"; ?>
</head>
<body>
<?php include "header.php"; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card p-4 card_form_container">
                <h3 class="mb-4"><i class="fas fa-edit"></i> Edit Employee</h3>
                
                <form id="employeeForm" action="edit_employee_action.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $employee['id']; ?>">
                    
                    <div class="row">
                        <!-- Employee Name (Required) -->
                        <div class="col-md-12 mb-3">
                            <label for="employee-name" class="form-label">Employee Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="employee-name" name="employee-name" value="<?php echo htmlspecialchars($employee['name']); ?>" required>
                        </div>

                        <!-- Employee Email -->
                        <div class="col-md-12 mb-3">
                            <label for="employee-email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="employee-email" name="employee-email" value="<?php echo htmlspecialchars($employee['email']); ?>">
                        </div>

                        <!-- Employee Phone -->
                        <div class="col-md-12 mb-3">
                            <label for="employee-phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="employee-phone" name="employee-phone" value="<?php echo htmlspecialchars($employee['phone']); ?>">
                        </div>

                        <!-- Employee Position -->
                        <div class="col-md-12 mb-3">
                            <label for="employee-position" class="form-label">Position</label>
                            <input type="text" class="form-control" id="employee-position" name="employee-position" value="<?php echo htmlspecialchars($employee['position']); ?>">
                        </div>

                        <!-- Submit Button -->
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-save"></i> Update Employee
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
