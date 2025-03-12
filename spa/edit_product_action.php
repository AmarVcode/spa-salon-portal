<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST['id']; // Ensure ID is received for updating
    $productName = $_POST['productName'];
    $sku = $_POST['sku'];
    $category = $_POST['category'] ?? NULL;
    $brand = $_POST['brand'];
    $supplier = $_POST['supplier'];
    $supplierEmail = $_POST['supplierEmail'];
    $supplierPhone = $_POST['supplierPhone'];
    $manufacturingDate = $_POST['manufacturingDate'];
    $expiration = $_POST['expiration'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $stock = $_POST['stock'];
    $returnPolicy = $_POST['returnPolicy'];
    $weight = $_POST['weight'];
    $length = $_POST['length'];
    $width = $_POST['width'];
    $height = $_POST['height'];
    $barcode = $_POST['barcode'];
    $description = $_POST['description'];

    // Folder creation logic
    $folderPath = 'media/product/' . date('F-Y');
    if (!file_exists($folderPath)) {
        mkdir($folderPath, 0777, true);
    }

    // Image upload handling
    $imagePath = '';
    if (!empty($_FILES['image']['name'])) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $fileType = $_FILES['image']['type'];
        $fileSize = $_FILES['image']['size'];
        $maxSize = 5 * 1024 * 1024; // 5MB

        if (in_array($fileType, $allowedTypes) && $fileSize <= $maxSize) {
            $imageName = time() . "_" . basename($_FILES['image']['name']);
            $imagePath = $folderPath . '/' . $imageName;

            if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
                die("Error uploading the image.");
            }
        } else {
            die("Invalid image file or size exceeds 5MB.");
        }
    } else {
        // If no new image is uploaded, keep the existing image
        $query = $conn->prepare("SELECT image FROM products WHERE id = ?");
        $query->bind_param("i", $productId);
        $query->execute();
        $query->bind_result($existingImage);
        $query->fetch();
        $query->close();
        $imagePath = $existingImage;
    }

    // Update query
    $stmt = $conn->prepare("UPDATE products SET 
        product_name = ?, sku = ?, category = ?, brand = ?, supplier = ?, 
        supplier_email = ?, supplier_phone = ?, manufacturing_date = ?, expiration_date = ?, 
        price = ?, discount = ?, stock = ?, return_policy = ?, weight = ?, length = ?, 
        width = ?, height = ?, barcode = ?, image = ?, description = ?
        WHERE id = ?");
    
    $stmt->bind_param("ssssssssssssssssssssi", 
        $productName, $sku, $category, $brand, $supplier, 
        $supplierEmail, $supplierPhone, $manufacturingDate, $expiration, 
        $price, $discount, $stock, $returnPolicy, $weight, $length, $width, 
        $height, $barcode, $imagePath, $description, $productId);

    if ($stmt->execute()) {
        echo "<script>window.location.href='manage_products.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
