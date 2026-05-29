<?php
session_start(); // Start session to remember the user is logged in
include_once __DIR__ . '/db_connect.php'; // Connect to the database

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Get the username and password typed in the login form
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // 2. Search the 'u3' table to find this username
    $sql = "SELECT id, password, username, first_name, last_name, email FROM u3 WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    // 3. Did we find exactly 1 user with that username?
    if (mysqli_num_rows($result) == 1) {
        
        // Yes, user exists! Get their data from the database
        $row = mysqli_fetch_assoc($result);
        $saved_scrambled_password = $row['password'];

        // 4. Compare the typed password with the scrambled password stored in database
        if (password_verify($password, $saved_scrambled_password)) {
            
            // ✅ Password is correct! Let them in.
            $_SESSION['username']   = $row['username'];
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name']  = $row['last_name'];
            $_SESSION['email']      = $row['email'];
            $_SESSION['logged_in']  = true;

            echo "<script>alert('Login Successful!'); window.location='profile.php';</script>";
            exit();

        } else {
            // ❌ Password is wrong
            echo "<script>alert('Incorrect password!'); window.history.back();</script>";
        }

    } else {
        // ❌ Username not found in table
        echo "<script>alert('Username not found! Register first.'); window.history.back();</script>";
    }
}

mysqli_close($conn);
?>
