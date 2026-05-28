<?php
// Database Connection
$cn = mysqli_connect("localhost", "root", "", "user1")
      or die("Could Not Connect Server");

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