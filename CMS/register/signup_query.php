<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

include("../includes/dbcon.php");

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $mail = $_POST['mail'];
    $cnum = $_POST['cnum'];
    $address = $_POST['address'];
    $pwd = $_POST['pwd'];

    // Validate if the email is already in use
    $ValidationQuery = "SELECT * FROM user_tbl WHERE Mail LIKE BINARY '$mail'";
    $ValidationResult = mysqli_query($conn, $ValidationQuery);

    if (mysqli_num_rows($ValidationResult) > 0) {
        echo '
            <script>
                alert("You are already registered!");
                window.location.href="signup.php";
            </script>
        ';
    } else {
        // Insert new user into the database
        $InsertQuery = "INSERT INTO `user_tbl`(`FName`, `Mail`, `CNumber`, `Pwd`, `userlvl`, `Address`) 
                        VALUES ('$fname', '$mail', '$cnum', '$pwd', '0', '$address')";
        $InsertResult = mysqli_query($conn, $InsertQuery);

        if ($InsertResult) {
            // Send email with the password
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
                $mailSender->Subject = "RDPS Registration";
                $message = "
                    <p>Dear $fname,</p>
                    <p>Thank you for registering. Your temporary password is:</p>
                    <h3 style='color: green;'>$pwd</h3>
                    <p>Please change your password after logging in for security purposes.</p>
                    <hr style='border: 1px solid green; margin: 20px 0;'>
                ";
                $mailSender->Body = $message;

                $mailSender->send();
                    $_SESSION['msg'] = "Successful! ";
                    $_SESSION['msg_txt'] = "Your temporary password has been successfully sent to your Email Address.";
                    $_SESSION['icon'] = "success";
                    header("location:index.php");


            } catch (Exception $e) {
                    $_SESSION['msg'] = "Failed to Register! ";
                    $_SESSION['msg_txt'] = "Please try again later.";
                    $_SESSION['icon'] = "success";
                    header("location:signup.php");
               
            }
        } else {
                    $_SESSION['msg'] = "Failed to Register! ";
                    $_SESSION['msg_txt'] = "Please try again later.";
                    $_SESSION['icon'] = "success";
                    header("location:signup.php");
        }
    }
}
?>
