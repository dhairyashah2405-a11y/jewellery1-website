<?php
// 1. Database details (support environment variables for cloud deployment)
$host     = getenv('DB_HOST') ?: "localhost";
$username = getenv('DB_USER') ?: "root";
$password = getenv('DB_PASSWORD') ?: "";
$dbname   = getenv('DB_NAME') ?: "user";

// 2. Open the bridge/connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// 3. If the bridge fails, show an error
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
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