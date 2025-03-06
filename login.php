<?php
include 'auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php
include "includecss.php";
?>
    <?php
include "includejs.php";
?>
</head>
<body class="colored_bg">
<?php
include "header.php";
?>
    <?php
    if (isset($_SESSION['error_message'])) {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '" . $_SESSION['error_message'] . "'
                });
              </script>";
        unset($_SESSION['error_message']); // Clear the error message after displaying it
    }
    ?>
 <div class="container">
        <div class="login-container">
            <h2>Admin Panel</h2>
            <form method="POST" action="login_action.php">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>




</body>
</html>
