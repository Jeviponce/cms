<?php
session_start();
require_once('includes/dbcon.php');
 $lvl = $_SESSION['lvl'];
 $mail = $_SESSION['mail']; 
if (isset($_POST) && !empty($_FILES['image']['name']) && !empty($_POST['title'])) {
    $name = $_FILES['image']['name'];
    list($txt, $ext) = explode(".", $name);
    $image_name = time() . "." . $ext;
    $tmp = $_FILES['image']['tmp_name']; // Temporary path of the uploaded file

    if (move_uploaded_file($tmp, 'uploads/' . $image_name)) {
        // Escape input data to prevent SQL injection
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $sql = "INSERT INTO gallery (title, image,UserMail) VALUES ('$title', '$image_name','$mail')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            //$_SESSION['success'] = 'Image uploaded successfully.';
            if ($lvl==0) {
                header("Location:./customer-gallery.php?id=$mail");
            } else {
                header("Location: ./gallery.php");
            }
 // Redirect to gallery page
        } else {
            $_SESSION['error'] = 'Image uploading failed due to database error.';
           if ($lvl==0) {
                header("Location:./customer-gallery.php?id=$mail");
            } else {
                header("Location:./gallery.php");
            }

        }
    } else {
        //$_SESSION['error'] = 'Image uploading failed.';
        if ($lvl==0) {
         header("Location:./customer-gallery.php?id=$mail");
        } else {
            header("Location:./gallery.php");
        }

    }
} else {
    $_SESSION['error'] = 'Please select an image or write a title.';
    if ($lvl == 0) {
        header("Location:./customer-gallery.php?id=$mail");
    } else {
        header("Location:./gallery.php");
    }

}

mysqli_close($conn); // Close the database connection
?>
