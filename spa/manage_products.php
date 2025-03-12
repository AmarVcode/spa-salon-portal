<?php
include 'auth.php';
include 'config.php'; // Ensure you have a connection to the database
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
    <?php include "includecss.php"; ?>
    <?php include "includejs.php"; ?>
    
    <style>
        .search-bar-container {
            display: flex;
            width: 100%;
            margin: 0 auto 20px;
        }
        .search-bar {
            flex: 1;
        }
        .table-container {
            border-radius: 10px;
            overflow: hidden;
        }
        .table tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.1);
        }
        .action-icons i {
            cursor: pointer;
            margin: 0 5px;
            transition: color 0.3s ease-in-out;
        }
        .action-icons i:hover {
            color: #0056b3;
        }
        .out-of-stock {
            color: red;
            font-weight: bold;
        }
    </style>

    <script>
        function searchProducts() {
            let searchValue = document.getElementById("search").value.toLowerCase();
            let rows = document.querySelectorAll(".product-row");

            rows.forEach(row => {
                let productName = row.querySelector(".product-name").innerText.toLowerCase();
                if (productName.includes(searchValue)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }
    </script>
</head>
<body>
    <?php include "header.php"; ?>

    <div class="container mt-5">
        <h3 class="mb-4">Manage Products</h3>
        
        <!-- Search Bar -->
        <div class="search-bar-container">
            <input type="text" id="search" class="form-control search-bar" placeholder="Search Products..." onkeyup="searchProducts()">
            <button class="btn btn-primary ms-2" onclick="searchProducts()">Search</button>
        </div>
        
        <!-- Product Table -->
        <div class="table-container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>SKU</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM products";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $quantity = trim($row['stock']);
                            $quantityDisplay = (!isset($quantity) || $quantity === "" || $quantity == 0) ? 
                                "<span class='out-of-stock'>Out of Stock</span>" : $quantity;

                            echo "<tr class='product-row'>
                                <td class='product-name'>{$row['product_name']}</td>
                                <td>{$row['category']}</td>
                                <td>{$row['sku']}</td>
                                <td>{$row['price']}</td>
                                <td>{$quantityDisplay}</td>
                                <td class='action-icons'>
                                    <a href='edit_product.php?id={$row['id']}'><i class='fas fa-edit text-warning'></i></a>
                                    <a href='view_product.php?id={$row['id']}'><i class='fas fa-eye text-info'></i></a>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center'>No products found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
