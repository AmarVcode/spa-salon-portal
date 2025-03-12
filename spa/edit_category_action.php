<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['category_id'];
    $name = trim($_POST['category-name']);
    $description = trim($_POST['category-description']);

    if (empty($name)) {
        echo "<script>alert('Category name is required.'); window.history.back();</script>";
        exit();
    }

    $stmt = $conn->prepare("UPDATE categories SET name = ?, description = ? WHERE id = ?");
    $stmt->bind_param("ssi", $name, $description, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Category updated successfully.'); window.location.href='view_category.php';</script>";
    } else {
        echo "<script>alert('Error updating category.'); window.history.back();</script>";
    }

    $stmt->close();
}
$conn->close();
?>
