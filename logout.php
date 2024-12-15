<?php
session_start();
session_unset();
session_destroy();
?>
// Redirect to login page using JavaScript
    echo '<script type="text/javascript">
            window.location.href = "login.php";
          </script>';
    // Stop further script execution
    exit;