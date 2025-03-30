<?php
session_start();
include 'includes/dbcon.php';

if (isset($_POST['submit'])) {
    $id = $_SESSION['id']; // Ensure session contains the user ID
    $fname = $_POST['fname'];
    $mail = $_POST['mail'];
    $cnum = $_POST['cnum'];
    $address = $_POST['address'];

    $new_img = $_FILES['img']['name'];
    $old_img = $_POST['old_img'];

    // Image upload directory
    $upload_dir = "img/";

    // Fetch existing user details from the database
    $query = "SELECT FName, Mail, CNumber, Address, img FROM user_tbl WHERE Id='$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    // Check if any changes are made
    if (
        $fname === $row['FName'] &&
        $mail === $row['Mail'] &&
        $cnum === $row['CNumber'] &&
        $address === $row['Address'] &&
        (empty($new_img) || $new_img === $row['img'])
    ) {
        $_SESSION['msg'] = "No Changes";
        $_SESSION['msg_txt'] = "No changes were made to your profile.";
        $_SESSION['icon'] = "info";
        header("location:profile.php");
        exit();
    }

    if (!empty($new_img)) {
        $target_file = $upload_dir . basename($new_img);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validate file type
        if ($imageFileType === "jpg" || $imageFileType === "png" || $imageFileType === "jpeg") {
            if ($_FILES['img']['size'] <= 5000000) { // File size check (5MB max)
                if (!file_exists($target_file)) {
                    if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
                        $update_filename = $new_img;
                    } else {
                        $_SESSION['msg'] = "Error Upload";
                        $_SESSION['msg_txt'] = "Error uploading the new file.";
                        $_SESSION['icon'] = "error";
                        header("location:profile.php");
                        exit();
                    }
                } else {
                    // Use the existing file if it already exists
                    $update_filename = $new_img;
                }
            } else {
                $_SESSION['msg'] = "File size too large";
                $_SESSION['msg_txt'] = "Please upload a file less than 5MB!";
                $_SESSION['icon'] = "error";
                header("location:profile.php");
                exit();
            }
        } else {
            $_SESSION['msg'] = "Invalid file type";
            $_SESSION['msg_txt'] = "Only JPG, PNG, and JPEG are allowed!";
            $_SESSION['icon'] = "error";
            header("location:profile.php");
            exit();
        }
    } else {
        $update_filename = $old_img; // Keep the old image if no new image is uploaded
    }

    // Update the database
    $sql = "UPDATE user_tbl SET FName='$fname', Mail='$mail', CNumber='$cnum', Address='$address', img='$update_filename' WHERE Id='$id'";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['msg'] = "Success";
        $_SESSION['msg_txt'] = "Details Successfully Updated!";
        $_SESSION['icon'] = "success";
        header("location:profile.php");
        exit();
    } else {
        $_SESSION['msg'] = "Failed";
        $_SESSION['msg_txt'] = "Details Failed to Update!";
        $_SESSION['icon'] = "error";
        header("location:profile.php");
        exit();
    }

    mysqli_close($conn);
}
?>
