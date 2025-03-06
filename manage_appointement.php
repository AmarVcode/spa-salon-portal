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
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .table th {
            background-color: #007bff;
            color: white;
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
        .table th {
  background-color: #d63384;
  color: white;
}

.table{
    border: 1px solid #d63384;
}
    </style>
</head>
<body>
<div class="container mt-5">

        <h3 class="text-center mt-5 mb-4">Manage Appointments</h3>
        
        <!-- Search Bar -->
        <div class="search-bar-container">
            <input type="text" class="form-control search-bar" placeholder="Search Appointments...">
            <button class="btn btn-primary ms-2">Search</button>
        </div>
        
        <!-- Appointment Table -->
        <div class="">
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Client Name</th>
                        <th>Service</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>Consultation</td>
                        <td>2025-03-10</td>
                        <td><span class="badge bg-success">Confirmed</span></td>
                        <td class="action-icons">
                            <i class="fas fa-eye text-primary"></i>
                            <i class="fas fa-edit text-warning"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Jane Smith</td>
                        <td>Therapy Session</td>
                        <td>2025-03-12</td>
                        <td><span class="badge bg-danger">Cancelled</span></td>
                        <td class="action-icons">
                            <i class="fas fa-eye text-primary"></i>
                            <i class="fas fa-edit text-warning"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Michael Johnson</td>
                        <td>Hair cut</td>
                        <td>2025-03-15</td>
                        <td><span class="badge bg-success">Confirmed</span></td>
                        <td class="action-icons">
                            <i class="fas fa-eye text-primary"></i>
                            <i class="fas fa-edit text-warning"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
