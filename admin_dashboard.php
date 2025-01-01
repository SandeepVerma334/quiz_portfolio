<?php
session_start();
include("db.php");

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'Admin') {
    header("Location: login.php");
    exit();
}
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

echo "<h2>Welcome, " . $_SESSION['first_name'] . " " . $_SESSION['last_name'] . "</h2>";
echo "<p>Email: " . $_SESSION['email'] . "</p>";
echo "<p>Role: " . $_SESSION['role'] . "</p>";

?>
<button><button onclick="window.location.href='logout.php'">Logout</button>