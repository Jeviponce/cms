<?php
$to = "lorueltps.largosa@gmail.com"; // Recipient's email address
$subject = "Test Email"; // Subject of the email
$message = "Hello! This is a test email sent using PHP's mail function."; // Email body
$headers = "From: hiroshishigami30@gmail.com"; // Sender's email address

// Send the email
if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully.";
} else {
    echo "Failed to send email.";
}
?>
