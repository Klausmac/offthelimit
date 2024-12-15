<?php
session_start();
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = trim($_POST['username']);
    $pass = trim($_POST['password']);

    // Simple validation
    if (empty($user) || empty($pass)) {
        echo "<script>alert('Username and Password are required!'); window.location.href='index.php';</script>";
        exit;
    }

    // Check if user exists
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        // Verify password
        if (password_verify($pass, $row['encryptedpassword'])) {
            // Successful login
            $_SESSION['username'] = $row['username'];
            echo "<script>alert('Login successful!'); window.location.href='homepage.php';</script>";
        } else {
            // Invalid password
            echo "<script>alert('Invalid password!'); window.location.href='index.php';</script>";
        }
    } else {
        // User not found
        echo "<script>alert('User not found!'); window.location.href='index.php';</script>";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>
