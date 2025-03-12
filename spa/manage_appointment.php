<?php
include 'auth.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Appointment</title>
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
    <?php
include 'config.php'; // Include database connection

$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';

// Fetch appointments with search functionality
$query = "SELECT * FROM appointments WHERE 
    customer_name LIKE '%$search%' OR 
    service LIKE '%$search%' OR 
    date LIKE '%$search%'
    ORDER BY id DESC";

$result = mysqli_query($conn, $query);
?>

    <div class="container mt-5">
        <h3 class=" mt-5 mb-4">Manage Appointments</h3>

        <!-- Search Bar -->
        <div class="search-bar-container d-flex mb-4">
            <input type="text" id="searchInput" class="form-control search-bar" placeholder="Search Appointments..."
                value="<?php echo htmlspecialchars($search); ?>">
            <button class="btn btn-primary ms-2" id="searchBtn">Search</button>
        </div>

        <!-- Appointment Table -->
        <div>
            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th>Client Name</th>
                        <th>Service</th>
                        <th>Appointment Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="appointmentTable">
                    <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $statusClass = ($row['status'] == 'Completed') ? 'bg-success' :
                                       (($row['status'] == 'Cancelled') ? 'bg-danger' : 'bg-warning');
                        
                        echo "<tr>
                            <td>{$row['customer_name']}</td>
                            <td>{$row['service']}</td>
                            <td>{$row['date']}</td>
                            <td><span class='badge $statusClass'>{$row['status']}</span></td>
                            <td class='action-icons'>
                                <a href='view_appointment.php?id={$row['id']}'><i class='fas fa-eye text-primary'></i></a>
                                <a href='edit_appointment.php?id={$row['id']}'><i class='fas fa-edit text-warning'></i></a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No Appointments Found</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
    document.getElementById("searchBtn").addEventListener("click", function() {
        let searchValue = document.getElementById("searchInput").value;
        window.location.href = "manage_appointment.php?search=" + encodeURIComponent(searchValue);
    });
    </script>

</body>

</html>