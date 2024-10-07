<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include database connection
include 'db_connect.php';

// Handle form submission for registration
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'];
    $phone_last4 = $_POST['phone_last4'];

    $sql = "INSERT INTO users (full_name, phone_last4) VALUES ('$full_name', '$phone_last4')";
    if (mysqli_query($conn, $sql)) {
        echo "User registered successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gift Voucher Registration</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <!-- Add admin link as a button at the top -->
        <a href="admin.php" class="admin-link" style="float: right; text-decoration: none; color: blue;">
            Admin Login
        </a>

        <h1>Register for a Gift Voucher</h1>

        <!-- Registration form -->
        <form action="index.php" method="POST">
            <input type="text" name="full_name" placeholder="Enter your full name" required>
            <input type="text" name="phone_last4" placeholder="Last 4 digits of phone" maxlength="4" required>
            <button type="submit">Submit</button>
        </form>

        <!-- Display registered users -->
        <h2>Registered Users</h2>
        <ul id="user-list">
            <?php
            // Fetch and display registered users
            $result = mysqli_query($conn, "SELECT * FROM users");
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li>{$row['full_name']} (XXXX-{$row['phone_last4']})</li>";
            }
            ?>
        </ul>
    </div>
</body>
</html>
