<?php
// register_process.php — Handles registration form submission
// Your register.php form's action should point to this file:
// <form action="register_process.php" method="post">

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get and sanitize form data
    $username = trim(mysqli_real_escape_string($conn, $_POST['username']));
    $email    = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $password = $_POST['password'];

    // Basic validation
    if (empty($username) || empty($email) || empty($password)) {
        die("<script>alert('All fields are required!'); window.history.back();</script>");
    }

    // Check if username already exists
    $check = mysqli_query($conn, "SELECT id FROM users WHERE username='$username' OR email='$email'");
    if (mysqli_num_rows($check) > 0) {
        die("<script>alert('Username or Email already registered! Please use a different one.'); window.history.back();</script>");
    }

    // Hash the password securely (NEVER store plain text passwords)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into database
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

    if (mysqli_query($conn, $sql)) {
        // Registration successful — redirect to login page
        header("Location: login.php?registered=1");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
