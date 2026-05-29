<?php
include_once __DIR__ . '/db_error_page.php';

// Database connections
$cart_host     = getenv('CART_DB_HOST') ?: getenv('DB_HOST') ?: getenv('MYSQLHOST') ?: "localhost";
$cart_user     = getenv('CART_DB_USER') ?: getenv('DB_USER') ?: getenv('MYSQLUSER') ?: "root";
$cart_pass     = getenv('CART_DB_PASSWORD') ?: getenv('DB_PASSWORD') ?: getenv('MYSQLPASSWORD') ?: "";
$cart_name     = getenv('CART_DB_NAME') ?: getenv('DB_NAME') ?: getenv('MYSQLDATABASE') ?: getenv('MYSQL_DATABASE') ?: "addtocart";

$orders_host   = getenv('ORDERS_DB_HOST') ?: getenv('DB_HOST') ?: getenv('MYSQLHOST') ?: "localhost";
$orders_user   = getenv('ORDERS_DB_USER') ?: getenv('DB_USER') ?: getenv('MYSQLUSER') ?: "root";
$orders_pass   = getenv('ORDERS_DB_PASSWORD') ?: getenv('DB_PASSWORD') ?: getenv('MYSQLPASSWORD') ?: "";
$orders_name   = getenv('ORDERS_DB_NAME') ?: getenv('DB_NAME') ?: getenv('MYSQLDATABASE') ?: getenv('MYSQL_DATABASE') ?: "orders";

// Parse ports if specified in DB_PORT/CART_DB_PORT/ORDERS_DB_PORT/MYSQLPORT or host strings
$cart_port = 3306;
if (getenv('CART_DB_PORT')) {
    $cart_port = (int)getenv('CART_DB_PORT');
} elseif (getenv('DB_PORT')) {
    $cart_port = (int)getenv('DB_PORT');
} elseif (getenv('MYSQLPORT')) {
    $cart_port = (int)getenv('MYSQLPORT');
} elseif (strpos($cart_host, ':') !== false) {
    list($cart_host, $port_str) = explode(':', $cart_host, 2);
    $cart_port = (int)$port_str;
}

$orders_port = 3306;
if (getenv('ORDERS_DB_PORT')) {
    $orders_port = (int)getenv('ORDERS_DB_PORT');
} elseif (getenv('DB_PORT')) {
    $orders_port = (int)getenv('DB_PORT');
} elseif (getenv('MYSQLPORT')) {
    $orders_port = (int)getenv('MYSQLPORT');
} elseif (strpos($orders_host, ':') !== false) {
    list($orders_host, $port_str) = explode(':', $orders_host, 2);
    $orders_port = (int)$port_str;
}

// Disable strict exception throwing to handle connection errors programmatically
mysqli_report(MYSQLI_REPORT_OFF);

// Connect to Cart database
$con = @mysqli_connect($cart_host, $cart_user, $cart_pass, $cart_name, $cart_port);

// Try auto-creating Cart database if it's missing (error 1049)
if (!$con && mysqli_connect_errno() == 1049) {
    $conn_init = @mysqli_connect($cart_host, $cart_user, $cart_pass, null, $cart_port);
    if ($conn_init) {
        @mysqli_query($conn_init, "CREATE DATABASE IF NOT EXISTS `" . mysqli_real_escape_string($conn_init, $cart_name) . "`");
        mysqli_close($conn_init);
        $con = @mysqli_connect($cart_host, $cart_user, $cart_pass, $cart_name, $cart_port);
    }
}

// Connect to Orders database
$con1 = @mysqli_connect($orders_host, $orders_user, $orders_pass, $orders_name, $orders_port);

// Try auto-creating Orders database if it's missing (error 1049)
if (!$con1 && mysqli_connect_errno() == 1049) {
    $conn_init = @mysqli_connect($orders_host, $orders_user, $orders_pass, null, $orders_port);
    if ($conn_init) {
        @mysqli_query($conn_init, "CREATE DATABASE IF NOT EXISTS `" . mysqli_real_escape_string($conn_init, $orders_name) . "`");
        mysqli_close($conn_init);
        $con1 = @mysqli_connect($orders_host, $orders_user, $orders_pass, $orders_name, $orders_port);
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