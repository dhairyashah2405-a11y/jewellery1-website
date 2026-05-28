<?php
// Database connections (support environment variables for cloud deployment)
$db_host = getenv('DB_HOST') ?: 'localhost';
$db_user = getenv('DB_USER') ?: 'root';
$db_pass = getenv('DB_PASSWORD') ?: '';

$con  = mysqli_connect($db_host, $db_user, $db_pass, getenv('DB_CART_NAME') ?: 'addtocart');  // Cart database
$con1 = mysqli_connect($db_host, $db_user, $db_pass, getenv('DB_ORDERS_NAME') ?: 'orders');   // Orders database

// Check connections
if (!$con) {
    die("Cart DB Connection failed: " . mysqli_connect_error());
}
if (!$con1) {
    die("Orders DB Connection failed: " . mysqli_connect_error());
}

// Set charset to avoid encoding issues
mysqli_set_charset($con, "utf8");
mysqli_set_charset($con1, "utf8");
?>