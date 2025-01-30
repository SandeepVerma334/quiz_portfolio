<?php
session_start();
include("config/db.php");

// Handle form submission
if (isset($_POST["submit"])) {
    // Retrieve form data
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role = trim($_POST['role']);

    // Perform login logic
    $query = "SELECT * FROM users WHERE email = ? AND role = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $role);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if ($password === $user["password"]) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['description'] = $user['description'];

            // JavaScript-based redirection
            $dashboard = $role === 'Admin' ? 'dashboard.php' : 'dashboard.php';
            echo "<script>
                alert('Login successful. Redirecting to your dashboard...');
                setTimeout(function() {
                    window.location.href = '$dashboard';
                }, 1000);
            </script>";
            exit();
        } else {
            echo "<script>alert('Incorrect password. Please try again.');</script>";
        }
    } else {
        echo "<script>alert('No user found with this email and role.');</script>";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="favicon.ico" type="image/icon type">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<div class="body">
<nav>
        <div class="logo">
            <img src="img/logo3.png" alt="logo" width="100px">
        </div>
    </nav>
    <div class="container">
        <h2 class="heading text-center">Login</h2>
        <p class="text-center subtitle">Please enter your credentials to login</p>
        <form action="" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="example@example.com" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-select" name="role" id="role" required>
                    <option selected disabled>Please select your role</option>
                    <option value="User">User</option>
                    <option value="Admin">Admin</option>
                </select>
            </div>

            <button type="submit" name="submit" class="btn btn-primary w-100">Login</button>
        </form>

        <div class="signup-link text-center mt-3">
            <p style="color:#ffffff"  >Don't have an account? <a href="index.php">Sign Up</a></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>
