<?php
session_start();
include 'includes/dbcon.php';

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $mail = $_POST['mail'];
    $cnum = $_POST['cnum'];
    $address = $_POST['address'];  

    $new_img = $_FILES['img']['name'];
    $pwd = $_POST['pwd'];
    $cpwd = $_POST['cpwd'];
    $dte = date("Y/m/d");
    // Password matching check
    if ($pwd !== $cpwd) {
        $_SESSION['msg'] = "Password Mismatch";
        $_SESSION['msg_txt'] = "Passwords do not match. Please try again.";
        $_SESSION['icon'] = "error";
        header("location:profile.php");
        exit();
    }

    // Image upload directory
    $upload_dir = "img/";

    if (!empty($new_img)) {
        $target_file = $upload_dir . basename($new_img);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validate file type
        if ($imageFileType === "jpg" || $imageFileType === "png" || $imageFileType === "jpeg") {
            if ($_FILES['img']['size'] <= 5000000) { // File size check (5MB max)
                if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
                    $uploaded_filename = $new_img;
                } else {
                    $_SESSION['msg'] = "Error Upload";
                    $_SESSION['msg_txt'] = "Error uploading the file.";
                    $_SESSION['icon'] = "error";
                    header("location:register-user.php");
                    exit();
                }
            } else {
                $_SESSION['msg'] = "File size too large";
                $_SESSION['msg_txt'] = "Please upload a file less than 5MB!";
                $_SESSION['icon'] = "error";
                header("location:register-user.php");
                exit();
            }
        } else {
            $_SESSION['msg'] = "Invalid file type";
            $_SESSION['msg_txt'] = "Only JPG, PNG, and JPEG are allowed!";
            $_SESSION['icon'] = "error";
            header("location:register-user.php");
            exit();
        }
    } else {
        $uploaded_filename = null; // No image uploaded
    }

    // Insert the new record into the database
    $sql = "INSERT INTO user_tbl (FName, Mail, CNumber, Address, img, userlvl, Pwd, dte) VALUES ('$fname', '$mail', '$cnum', '$address', '$uploaded_filename', '1','$cpwd','$dte')";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['msg'] = "Success";
        $_SESSION['msg_txt'] = "Details Successfully Added!";
        $_SESSION['icon'] = "success";
        header("location:register-user.php");
        exit();
    } else {
        $_SESSION['msg'] = "Failed";
        $_SESSION['msg_txt'] = "Details Failed to Add!";
        $_SESSION['icon'] = "error";
        header("location:register-user.php");
        exit();
    }

    mysqli_close($conn);
}
?>
