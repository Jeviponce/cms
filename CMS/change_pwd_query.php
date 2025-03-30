<?php
session_start();
include 'includes/dbcon.php';

function updatePassword($userId, $newPassword, $confirmPassword) {
    global $conn; // Use the global database connection

    // Check if new password and confirm password match
    if ($newPassword !== $confirmPassword) {
        $_SESSION['msg'] = "Password Mismatch";
        $_SESSION['msg_txt'] = "The new password and confirm password do not match!";
        $_SESSION['icon'] = "error";
        // Redirect back to the previous page
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }

    // Validate password (e.g., length check)
    if (strlen($newPassword) < 8) {
        $_SESSION['msg'] = "Weak Password";
        $_SESSION['msg_txt'] = "Password must be at least 8 characters long.";
        $_SESSION['icon'] = "error";
        // Redirect back to the previous page
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }

    // Update the password in the database (plaintext password)
    $query = "UPDATE user_tbl SET Pwd='$newPassword' WHERE Id='$userId'";
    if (mysqli_query($conn, $query)) {
        $_SESSION['msg'] = "Success";
        $_SESSION['msg_txt'] = "Password successfully updated!";
        $_SESSION['icon'] = "success";
    } else {
        $_SESSION['msg'] = "Failed";
        $_SESSION['msg_txt'] = "Failed to update password!";
        $_SESSION['icon'] = "error";
    }

    // Redirect back to the previous page
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $userId = $_SESSION['id']; // Get user ID from session
    $newPassword = $_POST['password']; // New password from form
    $confirmPassword = $_POST['cpwd']; // Confirm password from form

    // Call the update function
    updatePassword($userId, $newPassword, $confirmPassword);
}

mysqli_close($conn); // Close the database connection
?>
