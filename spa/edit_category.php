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
        echo "<script>alert('Category not found!'); window.location.href='categories.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Invalid request!'); window.location.href='categories.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <?php include "includecss.php"; ?>
    <?php include "includejs.php"; ?>
</head>
<body>
<?php include "header.php"; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card p-4 card_form_container">
                <h3 class="mb-4"><i class="fas fa-edit"></i> Edit Category</h3>
                
                <form id="categoryForm" action="edit_category_action.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $category['id']; ?>">
                    <div class="row">
                        <!-- Category Name (Required) -->
                        <div class="col-md-12 mb-3">
                            <label for="category-name" class="form-label">Category Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="category-name" name="category-name" value="<?php echo htmlspecialchars($category['name']); ?>" required>
                        </div>

                        <!-- Category Description -->
                        <div class="col-md-12 mb-3">
                            <label for="category-description" class="form-label">Category Description</label>
                            <textarea class="form-control" id="category-description" name="category-description" rows="3"><?php echo htmlspecialchars($category['description']); ?></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-save"></i> Update Category
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
