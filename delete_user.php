<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['admin'])) {
    header("Location: admin.php");  // Redirect to login page if not logged in
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];

    // Delete the user from the database
    $sql = "DELETE FROM users WHERE id='$user_id'";
    if (mysqli_query($conn, $sql)) {
        echo "User deleted successfully.";
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }

    header("Location: admin_dashboard.php");  // Redirect back to the dashboard
}
?>
