<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to login page with a logged out alert
echo "<script>alert('You have logged out successfully.'); window.location='login.php';</script>";
exit();
?>
