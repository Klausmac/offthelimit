<?php
session_start();
include("connection.php");

// Initialize the session variable (optional, if needed)
$_SESSION["sname"] = "";
$sname = $_SESSION["sname"];

// Check if the session variable 'sname' is empty
if (empty($_SESSION['sname'])) {
    // Redirect to login page using JavaScript
    echo '<script type="text/javascript">
            window.location.href = "login.php";
          </script>';
    // Stop further script execution
    exit;
} else {
    echo "hello " . $sname;
}
?>
