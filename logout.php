<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION["user_id"]) && isset($_SESSION["role"])) {
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to login page after logging out
    header("Location: login.php");
    exit();  // Ensure no further code is executed
} else {
    // If the user is not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}
?>
