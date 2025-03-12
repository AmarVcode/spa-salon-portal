<?php
include 'auth.php';
include 'config.php';


// Fetch product data based on ID
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $query = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    if (!$product) {
        die("Product not found.");
    }
} else {
    die("Product ID is required.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <?php include "includecss.php"; ?>
    <?php include "includejs.php"; ?>
</head>

<body>
    <?php include "header.php"; ?>

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
                    <h3 class="mb-4"><i class="fas fa-plus"></i> Edit Product</h3>
                    <form id="productForm" method="post" action="edit_product_action.php" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $product["id"]; ?>">    
                    <div class="row">
                            <!-- Product Name -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Product Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="productName"
                                    value="<?php echo $product["product_name"]; ?>" required>
                                <div class="invalid-feedback">Product Name is required.</div>
                            </div>

                            <!-- SKU -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Product SKU <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="sku"
                                    value="<?php echo $product["sku"]; ?>" required>
                                <div class="invalid-feedback">Product SKU is required.</div>
                            </div>

                            <!-- Category -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Category</label>
                                <select class="form-select" name="category">
                                    <option value="" disabled>Select Category</option>
                                    <option value="Shampoo"
                                        <?php echo ($product["category"] ?? '') == "Shampoo" ? "selected" : ""; ?>>
                                        Shampoo</option>
                                    <option value="Skincare"
                                        <?php echo ($product["category"] ?? '') == "Skincare" ? "selected" : ""; ?>>
                                        Skincare</option>
                                    <option value="Hair Treatment"
                                        <?php echo ($product["category"] ?? '') == "Hair Treatment" ? "selected" : ""; ?>>
                                        Hair Treatment</option>
                                </select>
                            </div>

                            <!-- Brand Name -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Brand Name</label>
                                <input type="text" class="form-control" name="brand"
                                    value="<?php echo htmlspecialchars($product["brand"] ?? '', ENT_QUOTES); ?>">
                            </div>

                            <!-- Supplier Name -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Supplier Name</label>
                                <input type="text" class="form-control" name="supplier"
                                    value="<?php echo htmlspecialchars($product["supplier"] ?? '', ENT_QUOTES); ?>">
                            </div>

                            <!-- Supplier Email -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Supplier Email</label>
                                <input type="email" class="form-control" name="supplierEmail"
                                    value="<?php echo htmlspecialchars($product["supplier_email"] ?? '', ENT_QUOTES); ?>">
                            </div>

                            <!-- Supplier Phone -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Supplier Phone</label>
                                <input type="text" class="form-control" name="supplierPhone"
                                    value="<?php echo htmlspecialchars($product["supplier_phone"] ?? '', ENT_QUOTES); ?>">
                            </div>

                            <!-- Manufacturing Date -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Manufacturing Date</label>
                                <input type="date" class="form-control" name="manufacturingDate"
                                    value="<?php echo htmlspecialchars($product["manufacturing_date"] ?? '', ENT_QUOTES); ?>">
                            </div>

                            <!-- Expiration Date -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Expiration Date</label>
                                <input type="date" class="form-control" name="expiration"
                                    value="<?php echo htmlspecialchars($product["expiration_date"] ?? '', ENT_QUOTES); ?>">
                            </div>

                            <!-- Price -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Price</label>
                                <input type="number" class="form-control" name="price" step="0.01"
                                    value="<?php echo htmlspecialchars($product["price"] ?? '0.00', ENT_QUOTES); ?>">
                            </div>

                            <!-- Discount -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Discount (%)</label>
                                <input type="number" class="form-control" name="discount" min="0" max="100"
                                    value="<?php echo htmlspecialchars($product["discount"] ?? '0', ENT_QUOTES); ?>">
                            </div>

                            <!-- Stock Quantity -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Stock Quantity</label>
                                <input type="number" class="form-control" name="stock"
                                    value="<?php echo htmlspecialchars($product["stock"] ?? '0', ENT_QUOTES); ?>">
                            </div>

                            <!-- Return Policy -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Return Policy</label>
                                <select class="form-select" name="returnPolicy">
                                    <option value="">Select</option>
                                    <option value="returnable"
                                        <?php echo ($product["return_policy"] ?? '') == "returnable" ? "selected" : ""; ?>>
                                        Returnable</option>
                                    <option value="non-returnable"
                                        <?php echo ($product["return_policy"] ?? '') == "non-returnable" ? "selected" : ""; ?>>
                                        Non-Returnable</option>
                                </select>
                            </div>

                            <!-- Product Weight -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Product Weight (kg)</label>
                                <input type="number" class="form-control" name="weight" step="0.01"
                                    value="<?php echo htmlspecialchars($product["weight"] ?? '0.00', ENT_QUOTES); ?>">
                            </div>

                            <!-- Dimensions -->
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Length (cm)</label>
                                <input type="number" class="form-control" name="length" step="0.1"
                                    value="<?php echo htmlspecialchars($product["length"] ?? '0.00', ENT_QUOTES); ?>">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Width (cm)</label>
                                <input type="number" class="form-control" name="width" step="0.1"
                                    value="<?php echo htmlspecialchars($product["width"] ?? '0.00', ENT_QUOTES); ?>">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Height (cm)</label>
                                <input type="number" class="form-control" name="height" step="0.1"
                                    value="<?php echo htmlspecialchars($product["height"] ?? '0.00', ENT_QUOTES); ?>">
                            </div>

                            <!-- Barcode -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Barcode</label>
                                <input type="text" class="form-control" name="barcode" id="barcode"  oninput="generateCodes()"
                                    value="<?php echo htmlspecialchars($product["barcode"] ?? '', ENT_QUOTES); ?>">
                            </div>

                            <!-- Display Generated Barcode -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Generated Barcode</label><br>
                                <svg id="barcodeCanvas"></svg>
                            </div>

                            <!-- Display Generated QR Code -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Generated QR Code</label>
                                <div id="qrcodeCanvas"></div>
                            </div>

                            <!-- Include JsBarcode & qrcode.js -->
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.0/JsBarcode.all.min.js">
                            </script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

                            <script>
                            function generateCodes() {
                                var inputVal = document.getElementById("barcode").value;

                                // Generate Barcode (EAN-13 Format)
                                if (inputVal.length >= 8) { // Ensuring minimum length for barcode generation
                                    JsBarcode("#barcodeCanvas", inputVal, {
                                        format: "EAN13",
                                        displayValue: true
                                    });
                                }

                                // Generate QR Code
                                document.getElementById("qrcodeCanvas").innerHTML = ""; // Clear previous QR code
                                if (inputVal.trim() !== "") {
                                    new QRCode(document.getElementById("qrcodeCanvas"), {
                                        text: inputVal,
                                        width: 100,
                                        height: 100
                                    });
                                }
                            }
                            </script>

                            <!-- Product Image -->
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Product Image</label>
                                <input class="form-control" type="file" name="image" accept="image/*">
                                <?php if (!empty($product["image"])): ?>
                                <img src="<?php echo htmlspecialchars($product["image"], ENT_QUOTES); ?>"
                                    alt="Product Image" style="max-width: 150px; margin-top: 10px;">
                                <?php endif; ?>
                            </div>

                            <!-- Product Description -->
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Product Description</label>
                                <textarea class="form-control" name="description"
                                    rows="4"><?php echo htmlspecialchars($product["description"] ?? '', ENT_QUOTES); ?></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-plus"></i> Edit Product
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $("input[name='image']").on("change", function() {
            var file = this.files[0]; // Get the selected file
            var maxSize = 5 * 1024 * 1024; // 5MB in bytes
            var allowedTypes = ["image/jpeg", "image/png", "image/gif",
                "image/webp"
            ]; // Allowed image types

            if (file) {
                // Check file type
                if (!allowedTypes.includes(file.type)) {
                    alert("Only image files (JPG, PNG, GIF, WEBP) are allowed.");
                    $(this).val(""); // Clear the input field
                    return;
                }

                // Check file size
                if (file.size > maxSize) {
                    alert("Image size should not be more than 5MB.");
                    $(this).val(""); // Clear the input field
                    return;
                }
            }
        });
    });
    </script>
</body>

</html>