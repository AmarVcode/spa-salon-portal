<?php
include 'auth.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php
include "includecss.php";
?>
</head>

<body>
    <?php
include "header.php";
?>

    <section class="summary-section container">

        <!-- 🔹 Monthly Sales -->
        <div class="summary-card">
            <div class="summary-text">
                <h4>₹50,000</h4>
                <p>Monthly Sales</p>
            </div>
            <i class="fas fa-chart-line"></i>
        </div>

        <!-- 🔹 Total Products -->
        <div class="summary-card">
            <div class="summary-text">
                <h4>120</h4>
                <p>Products in Inventory</p>
            </div>
            <i class="fas fa-box"></i>
        </div>

        <!-- 🔹 Total Experts (Employees) -->
        <div class="summary-card">
            <div class="summary-text">
                <h4>15</h4>
                <p>Experts (Employees)</p>
            </div>
            <i class="fas fa-user-tie"></i>
        </div>

        <!-- 🔹 Total Appointments -->
        <div class="summary-card">
            <div class="summary-text">
                <h4>75</h4>
                <p>Appointments</p>
            </div>
            <i class="fas fa-calendar-check"></i>
        </div>

        <!-- 🔹 Total Customers -->
        <div class="summary-card">
            <div class="summary-text">
                <h4>350</h4>
                <p>Customers Registered</p>
            </div>
            <i class="fas fa-users"></i>
        </div>

    </section>

    <div class="appointments-section-chart container container-color">
    <div class="chart-container">
        <canvas id="salesAppointmentsChart"></canvas>
    </div>

    <div class="create-appointment-card">
        <h3>Book an Appointment</h3>
        <p>Schedule a new appointment for your customers with ease.</p>
        <button class="create-btn">
            <i class="fa-solid fa-calendar-plus"></i> Create Appointment
        </button>
    </div>
</div>



    <div class="table-wraper container">
    <h3 class="section-title"><i class="fa-solid fa-calendar-days"></i>
    Upcoming Appointments</h3>
    
    <div class="table-responsive">
        <table class="table custom-table">
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Service Type</th>
                    <th>Assigned Expert</th>
                    <th>Appointment Date & Time</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Priya Sharma</td>
                    <td>Hair Spa</td>
                    <td>Ashwini</td>
                    <td>March 8, 10:30 AM</td>
                    <td><span class="status pending"><i class="fa-solid fa-clock"></i> Pending</span></td>
                </tr>
                <tr>
                    <td>Riya Patel</td>
                    <td>Facial</td>
                    <td>Sneha</td>
                    <td>March 9, 12:00 PM</td>
                    <td><span class="status completed"><i class="fa-solid fa-check-circle"></i> Done</span></td>
                </tr>
                <tr>
                    <td>Meera Kapoor</td>
                    <td>Manicure</td>
                    <td>Neha</td>
                    <td>March 10, 3:00 PM</td>
                    <td><span class="status canceled"><i class="fa-solid fa-times-circle"></i> Canceled</span></td>
                </tr>
                <tr>
                    <td>Priya Sharma</td>
                    <td>Hair Spa</td>
                    <td>Ashwini</td>
                    <td>March 8, 10:30 AM</td>
                    <td><span class="status pending"><i class="fa-solid fa-clock"></i> Pending</span></td>
                </tr>
                <tr>
                    <td>Riya Patel</td>
                    <td>Facial</td>
                    <td>Sneha</td>
                    <td>March 9, 12:00 PM</td>
                    <td><span class="status completed"><i class="fa-solid fa-check-circle"></i> Done</span></td>
                </tr>
                <tr>
                    <td>Meera Kapoor</td>
                    <td>Manicure</td>
                    <td>Neha</td>
                    <td>March 10, 3:00 PM</td>
                    <td><span class="status canceled"><i class="fa-solid fa-times-circle"></i> Canceled</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<div class="customer-insights container">
    <h2><i class="fa-solid fa-user"></i>
    Customer Insights</h2>

    <div class="insights-cards">
        <div class="card">
            <i class="fa-solid fa-user-plus"></i>
            <h3>New Customers</h3>
            <p>125 This Month</p>
        </div>
        <div class="card">
            <i class="fa-solid fa-users"></i>
            <h3>Loyal Customers</h3>
            <p>78 Repeat Clients</p>
        </div>
        <div class="card">
            <i class="fa-solid fa-gem"></i>
            <h3>Total Customers</h3>
            <p>1250 This Month</p>
        </div>
    </div>

    <h3><i class="fa-solid fa-thumbtack"></i> Most Booked Services</h3>
    <div class="services-container">
        <div class="service-card">
            <i class="fa-solid fa-spa"></i>
            <div>
                <h4>Facial Treatment</h4>
                <p>Most booked by <strong>Priya Sharma</strong></p>
            </div>
            <span class="badge">65 Bookings</span>
        </div>
        <div class="service-card">
            <i class="fa-solid fa-cut"></i>
            <div>
                <h4>Haircut & Styling</h4>
                <p>Most booked by <strong>Rohit Mehta</strong></p>
            </div>
            <span class="badge">58 Bookings</span>
        </div>
        <div class="service-card">
            <i class="fa-solid fa-hand-sparkles"></i>
            <div>
                <h4>Manicure & Pedicure</h4>
                <p>Most booked by <strong>Sneha Kapoor</strong></p>
            </div>
            <span class="badge">50 Bookings</span>
        </div>
        <div class="service-card">
            <i class="fa-solid fa-spa"></i>
            <div>
                <h4>Facial Treatment</h4>
                <p>Most booked by <strong>Priya Sharma</strong></p>
            </div>
            <span class="badge">65 Bookings</span>
        </div>
        <div class="service-card">
            <i class="fa-solid fa-cut"></i>
            <div>
                <h4>Haircut & Styling</h4>
                <p>Most booked by <strong>Rohit Mehta</strong></p>
            </div>
            <span class="badge">58 Bookings</span>
        </div>
        <div class="service-card">
            <i class="fa-solid fa-hand-sparkles"></i>
            <div>
                <h4>Manicure & Pedicure</h4>
                <p>Most booked by <strong>Sneha Kapoor</strong></p>
            </div>
            <span class="badge">50 Bookings</span>
        </div>
    </div>
</div>




<script>
    document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById("salesAppointmentsChart").getContext("2d");

    const salesAppointmentsChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [
                {
                    label: "Total Sales",
                    backgroundColor: "rgba(212, 175, 55, 0.9)", // Bold Gold
                    borderColor: "#D4AF37",
                    borderWidth: 2,
                    borderRadius: 10, // Rounded edges
                    data: [5000, 7000, 8000, 6000, 9000, 11000, 12000, 10000, 9500, 10500, 11500, 13000]
                },
                {
                    label: "Total Appointments",
                    backgroundColor: "rgba(230, 194, 0, 0.4)", // Softer Gold (Lower Opacity)
                    borderColor: "#E6C200",
                    borderWidth: 2,
                    borderRadius: 10, // Rounded edges
                    data: [120, 140, 160, 150, 180, 200, 210, 190, 185, 195, 205, 220]
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    grid: { display: false },
                    ticks: {
                        color: "#F5E1A4",
                        font: { size: 14 }
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: { color: "rgba(245, 225, 164, 0.2)" },
                    ticks: {
                        color: "#F5E1A4",
                        font: { size: 14 }
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        color: "#E6C200",
                        font: { size: 16, weight: "bold" }
                    }
                },
                tooltip: {
                    backgroundColor: "rgba(212, 175, 55, 0.9)", // Gold tooltip
                    titleColor: "#121212",
                    bodyColor: "#000",
                    borderColor: "#F5E1A4",
                    borderWidth: 2,
                    cornerRadius: 8,
                    padding: 10,
                    titleFont: { weight: "bold", size: 14 },
                    bodyFont: { size: 13 }
                }
            }
        }
    });
});

</script>
    <?php
include "includejs.php";
?>

</body>

</html>