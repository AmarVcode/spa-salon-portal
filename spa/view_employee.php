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
        echo "<script>alert('Employee not found!'); window.location.href='manage_employees.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Invalid request!'); window.location.href='manage_employees.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Employee</title>
    <?php include "includecss.php"; ?>
    <?php include "includejs.php"; ?>
</head>

<body>
    <?php include "header.php"; ?>

    <div class="container mt-5 view_ui">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-user"></i> Employee Details
                    </div>
                    <div class="card-body">
                        <div class="info-item">
                            <i class="fas fa-user-circle info-icon"></i>
                            <div class="info-label">Employee Name</div>
                            <div class="info-value"><?php echo htmlspecialchars($employee['name']); ?></div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-envelope info-icon"></i>
                            <div class="info-label">Email</div>
                            <div class="info-value"><?php echo htmlspecialchars($employee['email']); ?></div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-phone info-icon"></i>
                            <div class="info-label">Phone</div>
                            <div class="info-value"><?php echo htmlspecialchars($employee['phone']); ?></div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-briefcase info-icon"></i>
                            <div class="info-label">Position</div>
                            <div class="info-value"><?php echo htmlspecialchars($employee['position']); ?></div>
                        </div>
                        <div class="mt-4">
                            <a href="manage_employee.php" class="btn btn-back">
                                <i class="fas fa-arrow-left"></i> Back to Employees
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
