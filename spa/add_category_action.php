<?php
session_start();
include 'config.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categoryName = trim($_POST['category-name']);
    $categoryDescription = trim($_POST['category-description']);

    // Validate required fields
    if (empty($categoryName)) {
        $_SESSION['error'] = "Category Name is required.";
        header("Location: category_form.php");
        exit();
    }

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO categories (name, description) VALUES (?, ?)");
    $stmt->bind_param("ss", $categoryName, $categoryDescription);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Category added successfully.";
    } else {
        $_SESSION['error'] = "Error adding category: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    header("Location: manage_category.php");
    exit();
} else {
    $_SESSION['error'] = "Invalid request.";
    header("Location: add_category.php");
    exit();
}
