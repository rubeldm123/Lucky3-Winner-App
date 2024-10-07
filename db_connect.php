<?php
$servername = "localhost";
$username = "root";  // or another username if applicable
$password = "your_password";  // Replace with your MySQL root password if any
$dbname = "gift_voucher"; // Ensure this is your correct database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
