<?php
session_start();
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);

    // Simple validation
    if (empty($username) || empty($fullname) || empty($email) || empty($pass)) {
        echo "<script>alert('All fields are required!'); window.location.href='register.php';</script>";
        exit;
    }

    // Check if username or email already exists
    $sql = "SELECT * FROM `users` WHERE `username` = ? OR `emailid` = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // User or email already exists
        echo "<script>alert('Username or Email already exists! Please choose a different one.'); window.location.href='register.php';</script>";
    } else {
        // Register the new user
        $hashedPassword = password_hash($pass, PASSWORD_BCRYPT);
        $sql = "INSERT INTO `users` (`username`, `fullname`, `emailid`, `encryptedpassword`, `datetime`) VALUES (?, ?, ?, ?, NOW())";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $username, $fullname, $email, $hashedPassword);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Registration successful! You can now login.'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Registration failed. Try again!'); window.location.href='register.php';</script>";
        }
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>
