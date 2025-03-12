<?php
echo '

<!-- 🔥 Dashboard Header -->
<header class="dashboard-header">
    <a href="dashboard.php" class="logo">
        <img src="assets\logo.jpg" class="logo"/> Spa & Salon
    </a>

    <div class="dl_flex">
        <div class="dropdown">
                <button class="dropdown-toggle" type="button" id="productMasterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Employee
                </button>
                <ul class="dropdown-menu" aria-labelledby="productMasterDropdown">
                    <li><a class="dropdown-item" href="manage_employee.php">Manage Employee</a></li>
                    <li><a class="dropdown-item" href="add_employee.php">Add Employee</a></li>
                </ul>
     </div>
    <div class="dropdown">
                <button class="dropdown-toggle" type="button" id="productMasterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Appointment
                </button>
                <ul class="dropdown-menu" aria-labelledby="productMasterDropdown">
                    <li><a class="dropdown-item" href="calender.php">Calender</a></li>
                    <li><a class="dropdown-item" href="manage_appointment.php">Manage Appointment</a></li>
                    <li><a class="dropdown-item" href="add_appointment.php">Add Appointment</a></li>
                </ul>
     </div>
    <div class="dropdown">
                <button class="dropdown-toggle" type="button" id="productMasterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Product Master
                </button>
                <ul class="dropdown-menu" aria-labelledby="productMasterDropdown">
                    <li><a class="dropdown-item" href="manage_products.php">Manage Products</a></li>
                    <li><a class="dropdown-item" href="add_product.php">Add Product</a></li>
                    <li><a class="dropdown-item" href="manage_category.php">Manage Category</a></li>
                    <li><a class="dropdown-item" href="add_category.php">Add Category</a></li>
                </ul>
            </div>
    </div>
    </div>

</header>


';


?>