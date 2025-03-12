<?php
include 'auth.php';
include 'config.php';

$search = "";
if (isset($_GET['search'])) {
    $search = trim($_GET['search']);
    $query = "SELECT * FROM employees WHERE name LIKE ? OR email LIKE ? OR phone LIKE ? OR position LIKE ? ORDER BY id DESC";
    $stmt = $conn->prepare($query);
    $likeSearch = "%$search%";
    $stmt->bind_param("ssss", $likeSearch, $likeSearch, $likeSearch, $likeSearch);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $query = "SELECT * FROM employees ORDER BY id DESC";
    $result = $conn->query($query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Employees</title>
    <?php include "includecss.php"; ?>
    <?php include "includejs.php"; ?>
</head>
<body>
<?php include "header.php"; ?>

<div class="container mt-5">
    <h3 class="mt-5 mb-4"><i class="fas fa-users"></i> Manage Employees</h3>

    <!-- Search Form -->
    <form method="GET" action="" class="search-bar-container d-flex">
        <input type="text" name="search" class="form-control search-bar" placeholder="Search Employees..." value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit" class="btn btn-primary ms-2">Search</button>
    </form>

    <div class="mt-4">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th style="width: 25%;">Employee Name</th>
                    <th style="width: 25%;">Email</th>
                    <th style="width: 20%;">Phone</th>
                    <th style="width: 15%;">Position</th>
                    <th style="width: 15%;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['phone']); ?></td>
                            <td><?php echo htmlspecialchars($row['position']); ?></td>
                            <td class="action-icons">
                                <a href="view_employee.php?id=<?php echo $row['id']; ?>" class="text-primary"><i class="fas fa-eye"></i></a>
                                <a href="edit_employee.php?id=<?php echo $row['id']; ?>" class="text-warning"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                <?php }
                } else { ?>
                    <tr>
                        <td colspan="5" class="text-center">No employees found.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php $conn->close(); ?>
</body>
</html>
