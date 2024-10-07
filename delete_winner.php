<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['admin'])) {
    header("Location: admin.php");  // Redirect to login page if not logged in
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $winner_id = $_POST['winner_id'];

    // Delete the winner from the database
    $sql = "DELETE FROM winners WHERE id='$winner_id'";
    if (mysqli_query($conn, $sql)) {
        echo "Winner deleted successfully.";
    } else {
        echo "Error deleting winner: " . mysqli_error($conn);
    }

    header("Location: admin_dashboard.php");  // Redirect back to the dashboard
}
?>
