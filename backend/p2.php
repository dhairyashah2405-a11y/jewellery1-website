<?php
include_once __DIR__ . '/db_error_page.php';

// Database connections
$cart_host     = getenv('CART_DB_HOST') ?: getenv('DB_HOST') ?: "localhost";
$cart_user     = getenv('CART_DB_USER') ?: getenv('DB_USER') ?: "root";
$cart_pass     = getenv('CART_DB_PASSWORD') ?: getenv('DB_PASSWORD') ?: "";
$cart_name     = getenv('CART_DB_NAME') ?: "addtocart";

$orders_host   = getenv('ORDERS_DB_HOST') ?: getenv('DB_HOST') ?: "localhost";
$orders_user   = getenv('ORDERS_DB_USER') ?: getenv('DB_USER') ?: "root";
$orders_pass   = getenv('ORDERS_DB_PASSWORD') ?: getenv('DB_PASSWORD') ?: "";
$orders_name   = getenv('ORDERS_DB_NAME') ?: "orders";

// Disable strict exception throwing to handle connection errors programmatically
mysqli_report(MYSQLI_REPORT_OFF);

// Connect to Cart database
$con = @mysqli_connect($cart_host, $cart_user, $cart_pass, $cart_name);

// Try auto-creating Cart database if it's missing (error 1049)
if (!$con && mysqli_connect_errno() == 1049) {
    $conn_init = @mysqli_connect($cart_host, $cart_user, $cart_pass);
    if ($conn_init) {
        @mysqli_query($conn_init, "CREATE DATABASE IF NOT EXISTS `" . mysqli_real_escape_string($conn_init, $cart_name) . "`");
        mysqli_close($conn_init);
        $con = @mysqli_connect($cart_host, $cart_user, $cart_pass, $cart_name);
    }
}

// Connect to Orders database
$con1 = @mysqli_connect($orders_host, $orders_user, $orders_pass, $orders_name);

// Try auto-creating Orders database if it's missing (error 1049)
if (!$con1 && mysqli_connect_errno() == 1049) {
    $conn_init = @mysqli_connect($orders_host, $orders_user, $orders_pass);
    if ($conn_init) {
        @mysqli_query($conn_init, "CREATE DATABASE IF NOT EXISTS `" . mysqli_real_escape_string($conn_init, $orders_name) . "`");
        mysqli_close($conn_init);
        $con1 = @mysqli_connect($orders_host, $orders_user, $orders_pass, $orders_name);
    }
}

// Check connections and render error helper
if (!$con) {
    show_db_error_page("Cart Database", mysqli_connect_error(), $cart_host, $cart_name);
}
if (!$con1) {
    show_db_error_page("Orders Database", mysqli_connect_error(), $orders_host, $orders_name);
}

// Set charset to avoid encoding issues
mysqli_set_charset($con, "utf8");
mysqli_set_charset($con1, "utf8");
?>