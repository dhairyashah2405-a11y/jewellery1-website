<?php
// Connect to the database
include_once __DIR__ . '/db_connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Get the values that the user typed in the form
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name  = mysqli_real_escape_string($conn, $_POST['last_name']);
    $username   = mysqli_real_escape_string($conn, $_POST['username']);
    $password   = $_POST['password']; 
    $confirm    = $_POST['confirm_password'];

    // 2. Security check: Make sure passwords match
    if ($password !== $confirm) {
        die("<script>alert('Passwords do not match!'); window.history.back();</script>");
    }

    // 3. Scramble (Hash) the password so no one can steal it from the database
    $scrambled_password = password_hash($password, PASSWORD_DEFAULT);

    // 4. Create a dummy email since the table u3 requires an email column
    $email = $username . "@example.com"; 

    // 5. Create a SQL command to INSERT (save) this user into the 'u3' table
    $sql = "INSERT INTO u3 (username, first_name, last_name, email, password) 
            VALUES ('$username', '$first_name', '$last_name', '$email', '$scrambled_password')";

    // 6. Run the SQL command
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Registration Successful! Now try logging in.');</script>";
        echo "<script>window.location='login.php';</script>";
    } else {
        echo "Error saving user: " . mysqli_error($conn);
    }
}

// Close the connection
mysqli_close($conn);
?>