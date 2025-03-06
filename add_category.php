<?php
include 'auth.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
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
                    <h3 class="text-center mb-4"><i class="fas fa-folder-plus"></i> Add Category</h3>
                    
                    <form id="categoryForm" novalidate>
                        <div class="row">
                            <!-- Category Name (Required) -->
                            <div class="col-md-12 mb-3">
                                <label for="category-name" class="form-label">Category Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="category-name" name="category-name" required>
                                <div class="invalid-feedback">Category Name is required.</div>
                            </div>

                            <!-- Category Description -->
                            <div class="col-md-12 mb-3">
                                <label for="category-description" class="form-label">Category Description</label>
                                <textarea class="form-control" id="category-description" name="category-description" rows="3"></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-save"></i> Add Category
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
