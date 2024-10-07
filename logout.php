<?php
session_start();
session_destroy(); // Destroy all sessions
header("Location: http://18.216.12.191/"); // Redirect to the user page
exit;
?>
