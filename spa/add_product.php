<?php
include 'auth.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
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
                    <h3 class="mb-4"><i class="fas fa-plus"></i> Add New Product</h3>
                    <form id="productForm" method="post" action="add_product_action.php" enctype="multipart/form-data">
                        <div class="row">
                            <!-- Product Name -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Product Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="productName" required>
                                <div class="invalid-feedback">Product Name is required.</div>
                            </div>

                            <!-- SKU -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Product SKU <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="sku" required>
                                <div class="invalid-feedback">Product SKU is required.</div>
                            </div>

                            <!-- Category -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Category</label>
                                <select class="form-select" name="category">
                                    <option value="" selected disabled>Select Category</option>
                                    <option>Shampoo</option>
                                    <option>Skincare</option>
                                    <option>Hair Treatment</option>
                                </select>
                            </div>

                            <!-- Brand Name -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Brand Name</label>
                                <input type="text" class="form-control" name="brand">
                            </div>

                            <!-- Supplier Name -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Supplier Name</label>
                                <input type="text" class="form-control" name="supplier">
                            </div>

                            <!-- Supplier Contact Email -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Supplier Email</label>
                                <input type="email" class="form-control" name="supplierEmail">
                            </div>

                            <!-- Supplier Contact Phone -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Supplier Phone</label>
                                <input type="text" class="form-control" name="supplierPhone">
                            </div>

                            <!-- Manufacturing Date -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Manufacturing Date</label>
                                <input type="date" class="form-control" name="manufacturingDate">
                            </div>

                            <!-- Expiration Date -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Expiration Date</label>
                                <input type="date" class="form-control" name="expiration">
                            </div>

                            <!-- Price -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Price</label>
                                <input type="number" class="form-control" name="price" step="0.01">
                            </div>

                            <!-- Discount -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Discount (%)</label>
                                <input type="number" class="form-control" name="discount" min="0" max="100">
                            </div>

                            <!-- Stock Quantity -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Stock Quantity</label>
                                <input type="number" class="form-control" name="stock">
                            </div>

                            <!-- Return Policy -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Return Policy</label>
                                <select class="form-select" name="returnPolicy">
                                    <option value="">Select</option>
                                    <option value="returnable">Returnable</option>
                                    <option value="non-returnable">Non-Returnable</option>
                                </select>
                            </div>

                            <!-- Product Weight -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Product Weight (kg)</label>
                                <input type="number" class="form-control" name="weight" step="0.01">
                            </div>

                            <!-- Dimensions -->
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Length (cm)</label>
                                <input type="number" class="form-control" name="length" step="0.1">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Width (cm)</label>
                                <input type="number" class="form-control" name="width" step="0.1">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Height (cm)</label>
                                <input type="number" class="form-control" name="height" step="0.1">
                            </div>

                            <!-- Barcode / QR Code Fields -->
                            <div class="col-md-6 mb-3">
                                <label for="barcode" class="form-label">Barcode / QR Code</label>
                                <input type="text" class="form-control" id="barcode" name="barcode"
                                    oninput="generateCodes()">
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

                            <!-- Product image -->
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Product image</label>
                                <input class="form-control" type="file" name="image" accept="image/*" rows="4">
                            </div>

                            <!-- Product Description -->
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Product Description</label>
                                <textarea class="form-control" name="description" rows="4"></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-plus"></i> Add Product
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
    $("input[name='image']").on("change", function () {
        var file = this.files[0]; // Get the selected file
        var maxSize = 5 * 1024 * 1024; // 5MB in bytes
        var allowedTypes = ["image/jpeg", "image/png", "image/gif", "image/webp"]; // Allowed image types

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