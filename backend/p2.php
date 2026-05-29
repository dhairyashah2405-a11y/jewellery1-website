<?php
// Database connections
$cart_host     = getenv('CART_DB_HOST') ?: getenv('DB_HOST') ?: "localhost";
$cart_user     = getenv('CART_DB_USER') ?: getenv('DB_USER') ?: "root";
$cart_pass     = getenv('CART_DB_PASSWORD') ?: getenv('DB_PASSWORD') ?: "";
$cart_name     = getenv('CART_DB_NAME') ?: "addtocart";

$orders_host   = getenv('ORDERS_DB_HOST') ?: getenv('DB_HOST') ?: "localhost";
$orders_user   = getenv('ORDERS_DB_USER') ?: getenv('DB_USER') ?: "root";
$orders_pass   = getenv('ORDERS_DB_PASSWORD') ?: getenv('DB_PASSWORD') ?: "";
$orders_name   = getenv('ORDERS_DB_NAME') ?: "orders";

$con = mysqli_connect($cart_host, $cart_user, $cart_pass, $cart_name);  // Cart database
$con1 = mysqli_connect($orders_host, $orders_user, $orders_pass, $orders_name);     // Orders database

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