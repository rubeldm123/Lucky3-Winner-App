<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include 'db_connect.php';

// Check if admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: admin.php");  // Redirect to login page if not logged in
    exit;
}

// Generate random winners
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['generate_winners'])) {
    $result = mysqli_query($conn, "SELECT * FROM users ORDER BY RAND() LIMIT 3");

    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row['full_name'];
        $phone = $row['phone_last4'];

        // Insert the winners into the winners table
        $sql = "INSERT INTO winners (full_name, phone_last4) VALUES ('$name', '$phone')";
        mysqli_query($conn, $sql);
    }

    echo "Winners generated successfully!";
}

// Fetch all winners
$winners = mysqli_query($conn, "SELECT * FROM winners");

// Fetch all users for deletion
$users = mysqli_query($conn, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>

        <!-- Logout Button -->
        <form method="POST" action="logout.php" style="display:inline;">
            <button type="submit" style="color: blue;">Logout</button>
        </form>

        <form method="POST" action="admin_dashboard.php">
            <button type="submit" name="generate_winners">Generate Winners</button>
        </form>

        <h2>Winners</h2>
        <ul style="list-style-type: none; padding: 0;">
            <?php
            while ($row = mysqli_fetch_assoc($winners)) {
                echo "<li class='winner-list' style='color: green; font-weight: bold;'>
                      Winner: {$row['full_name']} (XXXX-{$row['phone_last4']})
                      <form method='POST' action='delete_winner.php' style='display:inline;'>
                          <input type='hidden' name='winner_id' value='{$row['id']}'>
                          <button type='submit' style='color: red;'>Delete</button>
                      </form>
                      </li>";
            }
            ?>
        </ul>

        <h2>Registered Users</h2>
        <ul style="list-style-type: none; padding: 0;">
            <?php
            while ($row = mysqli_fetch_assoc($users)) {
                echo "<li>{$row['full_name']} (XXXX-{$row['phone_last4']}) 
                      <form method='POST' action='delete_user.php' style='display:inline;'>
                          <input type='hidden' name='user_id' value='{$row['id']}'>
                          <button type='submit' style='color: red;'>Delete</button>
                      </form>
                      </li>";
            }
            ?>
        </ul>
    </div>
</body>
</html>
