<?php
include 'auth.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
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
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: 600;
        }
    </style>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card p-4">
                <h3 class="text-center mb-4"><i class="fas fa-plus"></i> Add New Product</h3>
                
                <form id="productForm" novalidate>
                    <div class="row">
                        <!-- Product Name (Required) -->
                        <div class="col-md-6 mb-3">
                            <label for="productName" class="form-label">Product Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="productName" name="productName" required>
                            <div class="invalid-feedback">Product Name is required.</div>
                        </div>

                        <!-- SKU (Required) -->
                        <div class="col-md-6 mb-3">
                            <label for="sku" class="form-label">Product SKU <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="sku" name="sku" required>
                            <div class="invalid-feedback">Product SKU is required.</div>
                        </div>

                        <!-- Category -->
                        <div class="col-md-6 mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" id="category" name="category">
                                <option value="" selected disabled>Select Category</option>
                                <option>Shampoo</option>
                                <option>Skincare</option>
                                <option>Hair Treatment</option>
                            </select>
                        </div>

                        <!-- Brand Name -->
                        <div class="col-md-6 mb-3">
                            <label for="brand" class="form-label">Brand Name</label>
                            <input type="text" class="form-control" id="brand" name="brand">
                        </div>

                        <!-- Supplier Name -->
                        <div class="col-md-6 mb-3">
                            <label for="supplier" class="form-label">Supplier Name</label>
                            <input type="text" class="form-control" id="supplier" name="supplier">
                        </div>

                        <!-- Expiration Date -->
                        <div class="col-md-6 mb-3">
                            <label for="expiration" class="form-label">Expiration Date</label>
                            <input type="date" class="form-control" id="expiration" name="expiration">
                        </div>

                        <!-- Price -->
                        <div class="col-md-6 mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price" step="0.01">
                        </div>

                        <!-- Discount -->
                        <div class="col-md-6 mb-3">
                            <label for="discount" class="form-label">Discount (%)</label>
                            <input type="number" class="form-control" id="discount" name="discount" min="0" max="100">
                        </div>

                        <!-- Stock Quantity -->
                        <div class="col-md-6 mb-3">
                            <label for="stock" class="form-label">Stock Quantity</label>
                            <input type="number" class="form-control" id="stock" name="stock">
                        </div>

                        <!-- Product Weight -->
                        <div class="col-md-6 mb-3">
                            <label for="weight" class="form-label">Product Weight (kg)</label>
                            <input type="number" class="form-control" id="weight" name="weight" step="0.01">
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

                        <!-- Tags -->
                        <div class="col-md-6 mb-3">
                            <label for="tags" class="form-label">Tags (comma-separated)</label>
                            <input type="text" class="form-control" id="tags" name="tags">
                        </div>

                        <!-- Status Toggle -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Status</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="status" checked>
                                <label class="form-check-label" for="status">Active</label>
                            </div>
                        </div>

                        <!-- Product Images Upload -->
                        <div class="col-md-12 mb-3">
                            <label for="images" class="form-label">Product Images</label>
                            <input type="file" class="form-control" id="images" name="images[]" multiple>
                        </div>

                        <!-- Product Video Upload -->
                        <div class="col-md-12 mb-3">
                            <label for="video" class="form-label">Product Video (Optional)</label>
                            <input type="file" class="form-control" id="video" name="video" accept="video/*">
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
    // Bootstrap validation
    (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })();
</script>
</body>
</html>
