<?php
include 'auth.php';

echo '

<!-- 🔥 Dashboard Header -->
<header class="dashboard-header">
    <div class="logo">
        <i class="fas fa-spa"></i> Spa & Salon
    </div>

    <div>
    <div class="dropdown">
                <button class="dropdown-toggle" type="button" id="productMasterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Product Master
                </button>
                <ul class="dropdown-menu" aria-labelledby="productMasterDropdown">
                    <li><a class="dropdown-item" href="#">Manage Products</a></li>
                    <li><a class="dropdown-item" href="add_product.php">Add Product</a></li>
                    <li><a class="dropdown-item" href="#">Manage Category</a></li>
                    <li><a class="dropdown-item" href="#">Add Category</a></li>
                    <li><a class="dropdown-item" href="#">Manage Groups</a></li>
                    <li><a class="dropdown-item" href="#">Add Groups</a></li>
                </ul>
            </div>
    </div>
</header>


';


?>