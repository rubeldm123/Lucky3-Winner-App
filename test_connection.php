<?php
$servername = "localhost";
$username = "root"; // or another user if applicable
$password = "your_password"; // or your actual password
$dbname = "gift_voucher";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
}
?>
