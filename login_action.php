<?php
session_start(); // Start the session

// Include the database configuration file
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form inputs
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // SQL query to check the username
    $sql = "SELECT * FROM admininfo WHERE username = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $input_username); // 's' is for string
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // User found, now check the password
        $row = $result->fetch_assoc();
        $hashed_password = $row['pass'];

        // Verify the hashed password
        if ($input_password == $hashed_password) {
            // Successful login
            $_SESSION['user'] = $input_username;
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Invalid password!";
            $_SESSION['error_message'] = "Invalid username or password.";
        }
    } else {
        echo "No user found!";
        $_SESSION['error_message'] = "Invalid username or password.";
    }

    header("Location: login.php");
    exit();
}
?>
