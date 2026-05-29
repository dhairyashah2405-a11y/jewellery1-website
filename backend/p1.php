<?php
include_once __DIR__ . '/db_error_page.php';

// Database Connection Details
$contact_host = getenv('CONTACT_DB_HOST') ?: getenv('DB_HOST') ?: "localhost";
$contact_user = getenv('CONTACT_DB_USER') ?: getenv('DB_USER') ?: "root";
$contact_pass = getenv('CONTACT_DB_PASSWORD') ?: getenv('DB_PASSWORD') ?: "";
$contact_name = getenv('CONTACT_DB_NAME') ?: "user1";

// Disable strict exception throwing to handle connection errors programmatically
mysqli_report(MYSQLI_REPORT_OFF);

// Connect to Contact database
$cn = @mysqli_connect($contact_host, $contact_user, $contact_pass, $contact_name);

// Try auto-creating database if it's missing (error 1049)
if (!$cn && mysqli_connect_errno() == 1049) {
    $conn_init = @mysqli_connect($contact_host, $contact_user, $contact_pass);
    if ($conn_init) {
        @mysqli_query($conn_init, "CREATE DATABASE IF NOT EXISTS `" . mysqli_real_escape_string($conn_init, $contact_name) . "`");
        mysqli_close($conn_init);
        $cn = @mysqli_connect($contact_host, $contact_user, $contact_pass, $contact_name);
    }
}

// Check connection and render error helper
if (!$cn) {
    show_db_error_page("Contact Form Database", mysqli_connect_error(), $contact_host, $contact_name);
}

// Get values from form
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Create table
$sql = "CREATE TABLE IF NOT EXISTS contactid(
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50),
            email VARCHAR(50),
            phone VARCHAR(50),
            message VARCHAR(50)
        )";

// Execute create table query
$r = mysqli_query($cn, $sql)
     or die("Table Creation Failed: " . mysqli_error($cn));

// Insert query
$sql1 = "INSERT INTO contactid(name, email, phone, message)
         VALUES ('$name', '$email', '$phone', '$message')";

// Execute insert query
$r1 = mysqli_query($cn, $sql1)
      or die("Insert Query Failed: " . mysqli_error($cn));

if($r1)
{
    echo "<script>alert('Successfully Inserted');</script>";
    echo "<script>window.location='contact.php';</script>";
}

?>