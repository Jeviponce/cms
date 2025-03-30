<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

include("includes/dbcon.php");

if (isset($_POST['password'])) {

    $mail = $_POST['mail'];

    // Validate if the email exists in the database
    $ValidationQuery = "SELECT * FROM user_tbl WHERE Mail LIKE BINARY '$mail'";
    $ValidationResult = mysqli_query($conn, $ValidationQuery);

    if (mysqli_num_rows($ValidationResult) > 0) {
        // Email exists, proceed with sending the temporary password
        $newPassword = rand(100000, 999999);  // You can generate a random password or send a link for reset

        // Update password for the user
        $UpdateQuery = "UPDATE `user_tbl` SET `Pwd` = '$newPassword' WHERE `Mail` = '$mail'";
        $UpdateResult = mysqli_query($conn, $UpdateQuery);

        if ($UpdateResult) {
            // Send email with the new password
            $mailSender = new PHPMailer(true);
            try {
                $mailSender->isSMTP();
                $mailSender->Host = 'smtp.gmail.com';
                $mailSender->SMTPAuth = true;
                $mailSender->Username = 'sjcc.cms.donotreply@gmail.com';
                $mailSender->Password = 'wrjoeyercdqdhjim';
                $mailSender->SMTPSecure = 'ssl';
                $mailSender->Port = 465;

                $mailSender->setFrom('sjcc.cms.donotreply@gmail.com');
                $mailSender->addAddress($mail);

                $mailSender->isHTML(true);
                $mailSender->Subject = "Password Reset Notification";
                $message = "
                    <p>Dear User,</p>
                    <p>Your password has been successfully reset. Your new password is:</p>
                    <h3 style='color: green;'>$newPassword</h3>
                    <p>Please change your password after logging in for security purposes.</p>
                    <hr style='border: 1px solid green; margin: 20px 0;'>
                ";
                $mailSender->Body = $message;

                $mailSender->send();
                
                echo "Success! Your temporary password has been successfully sent to your email address.";  // Send success message

            } catch (Exception $e) {
                echo "An error occurred while sending the email. Please try again.";  // Send failure message
            }
        } else {
            echo "An error occurred while updating your password. Please try again.";  // Send failure message
        }
    } else {
        echo "Email not found! We could not find an account with that email address.";  // Send email not found message
    }
}
?>
