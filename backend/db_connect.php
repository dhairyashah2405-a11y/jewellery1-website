<?php
include_once __DIR__ . '/db_error_page.php';

// 1. Database details
$host     = getenv('DB_HOST') ?: "localhost";
$username = getenv('DB_USER') ?: "root";      // Default for WAMP/XAMPP
$password = getenv('DB_PASSWORD') ?: "";          // Default is empty
$dbname   = getenv('DB_NAME') ?: "user";      // The name of your database

// Parse port if specified in DB_PORT or host string
$port = 3306;
if (getenv('DB_PORT')) {
    $port = (int)getenv('DB_PORT');
} elseif (strpos($host, ':') !== false) {
    list($host, $port_str) = explode(':', $host, 2);
    $port = (int)$port_str;
}

// Disable strict exception throwing to handle connection errors programmatically
mysqli_report(MYSQLI_REPORT_OFF);

// 2. Open the bridge/connection
$conn = @mysqli_connect($host, $username, $password, $dbname, $port);

// Try auto-creating database if it's missing (error 1049)
if (!$conn && mysqli_connect_errno() == 1049) {
    $conn_init = @mysqli_connect($host, $username, $password, null, $port);
    if ($conn_init) {
        @mysqli_query($conn_init, "CREATE DATABASE IF NOT EXISTS `" . mysqli_real_escape_string($conn_init, $dbname) . "`");
        mysqli_close($conn_init);
        $conn = @mysqli_connect($host, $username, $password, $dbname, $port);
    }
}

// 3. If the bridge fails, show a premium error page
if (!$conn) {
    show_db_error_page("Users Database", mysqli_connect_error(), $host, $dbname);
}

// Automatically create the 'u3' table if it does not exist
$createTableQuery = "CREATE TABLE IF NOT EXISTS u3 (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    username   VARCHAR(100) NOT NULL UNIQUE,
    first_name VARCHAR(100) NULL,
    last_name  VARCHAR(100) NULL,
    email      VARCHAR(150) NOT NULL,
    password   VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
mysqli_query($conn, $createTableQuery);

// Add first_name and last_name columns dynamically if they do not exist
$checkFirstName = mysqli_query($conn, "SHOW COLUMNS FROM u3 LIKE 'first_name'");
if (mysqli_num_rows($checkFirstName) == 0) {
    mysqli_query($conn, "ALTER TABLE u3 ADD COLUMN first_name VARCHAR(100) NULL AFTER username");
}
$checkLastName = mysqli_query($conn, "SHOW COLUMNS FROM u3 LIKE 'last_name'");
if (mysqli_num_rows($checkLastName) == 0) {
    mysqli_query($conn, "ALTER TABLE u3 ADD COLUMN last_name VARCHAR(100) NULL AFTER first_name");
}
?>