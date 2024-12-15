<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate inputs
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $issue = trim($_POST['issue']);

    if (empty($name) || empty($phone) || empty($issue)) {
        die('All fields are required except file uploads.');
    }

    if (!preg_match('/^\d{10}$/', $phone)) {
        die('Phone number must be exactly 10 digits.');
    }

    // Generate a unique token
    $token = uniqid('ISSUE_');

    // Create directory for the issue
    $issueDir = __DIR__ . "/issues/$token";
    if (!is_dir($issueDir)) {
        mkdir($issueDir, 0777, true);
    }

    // Handle file uploads
    if (isset($_FILES['attachments']) && $_FILES['attachments']['error'][0] === UPLOAD_ERR_OK) {
        foreach ($_FILES['attachments']['tmp_name'] as $index => $tmpName) {
            $originalName = $_FILES['attachments']['name'][$index];
            $filePath = "$issueDir/$token" . "_" . basename($originalName);
            if (!move_uploaded_file($tmpName, $filePath)) {
                die('Error uploading files.');
            }
        }
    }

    // Send email
    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'sangitsutar@gmail.com'; // Replace with your email
        $mail->Password = 'ywqn gqbr cmey cpow'; // Replace with your email password or app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email content
        $mail->setFrom('your-email@gmail.com', 'Legal Community');
        $mail->addAddress('sangitsutar@gmail.com');
        $mail->Subject = "New Legal Issue Submission: $token";

        $body = "<h1>New Legal Issue Submitted</h1>";
        $body .= "<p><strong>Name:</strong> $name</p>";
        $body .= "<p><strong>Phone:</strong> $phone</p>";
        $body .= "<p><strong>Issue:</strong></p><p>$issue</p>";
        $body .= "<p><strong>Token:</strong> $token</p>";

        $mail->isHTML(true);
        $mail->Body = $body;

        // Attach files
        if (isset($_FILES['attachments']) && $_FILES['attachments']['error'][0] === UPLOAD_ERR_OK) {
            foreach (glob("$issueDir/*") as $file) {
                $mail->addAttachment($file);
            }
        }

        $mail->send();

        // Display token to user
        echo "<h2>Submission Successful</h2>";
        echo "<p>Your issue has been submitted successfully.</p>";
        echo "<p><strong>Token:</strong> $token</p>";
        echo "<p>Please keep this token for future reference.</p>";

    } catch (Exception $e) {
        die("Error: Could not send email. Mailer Error: {$mail->ErrorInfo}");
    }
}
?>
