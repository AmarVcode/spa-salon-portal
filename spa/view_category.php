<?php
include 'auth.php';
include 'config.php';

// Get category ID from query parameter
if (isset($_GET['id'])) {
    $category_id = $_GET['id'];

    // Fetch category details
    $stmt = $conn->prepare("SELECT * FROM categories WHERE id = ?");
    $stmt->bind_param("i", $category_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $category = $result->fetch_assoc();
    } else {
        echo "<script>alert('Category not found!'); window.location.href='manage_category.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Invalid request!'); window.location.href='manage_category.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Category</title>
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
                        <i class="fas fa-tags"></i> Category Details
                    </div>
                    <div class="card-body">
                        <div class="info-item">
                            <i class="fas fa-list info-icon"></i>
                            <div class="info-label">Category Name</div>
                            <div class="info-value"><?php echo htmlspecialchars($category['name']); ?></div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-align-left info-icon"></i>
                            <div class="info-label">Description</div>
                            <div class="info-value"><?php echo nl2br(htmlspecialchars($category['description'])); ?></div>
                        </div>
                        <div class="mt-4">
                            <a href="manage_category.php" class="btn btn-back">
                                <i class="fas fa-arrow-left"></i> Back to Categories
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
