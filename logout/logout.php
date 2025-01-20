<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION["user_id"])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    // exit();
}
?>
