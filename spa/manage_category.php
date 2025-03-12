<?php
include 'auth.php';
include 'config.php';

$search = "";
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = trim($_GET['search']);
    $query = "SELECT * FROM categories WHERE name LIKE '%$search%' OR description LIKE '%$search%' ORDER BY id DESC";
} else {
    $query = "SELECT * FROM categories ORDER BY id DESC";
}

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Categories</title>
    <?php include "includecss.php"; ?>
    <?php include "includejs.php"; ?>
</head>
<body>
<?php include "header.php"; ?>

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
</style>

<div class="container mt-5">
    <h3 class="mt-5 mb-4">Manage Categories</h3>
    <form method="GET" class="search-bar-container">
        <input type="text" name="search" class="form-control search-bar" placeholder="Search Categories..." value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit" class="btn btn-primary ms-2">Search</button>
    </form>
    <div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th style="width: 30%;">Category Name</th>
                    <th style="width: 50%;">Description</th>
                    <th style="width: 20%;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td>
                            <?php 
                                $desc = htmlspecialchars($row['description']);
                                echo strlen($desc) > 50 ? substr($desc, 0, 50) . '...' : $desc;
                            ?>
                        </td>
                        <td class="action-icons">
                            <a href="view_category.php?id=<?php echo $row['id']; ?>" class="text-primary"><i class="fas fa-eye"></i></a>
                            <a href="edit_category.php?id=<?php echo $row['id']; ?>" class="text-warning"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php $conn->close(); ?>
</body>
</html>
