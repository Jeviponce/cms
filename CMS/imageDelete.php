<?php
session_start();
require_once('includes/dbcon.php');
 $lvl = $_SESSION['lvl'];
 $mail = $_SESSION['mail']; 

if (isset($_POST) && !empty($_POST['id'])) {
    // Escape the ID to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    // Select image to delete
    $sql_select = "SELECT image FROM gallery WHERE id = $id";
    $select_result = mysqli_query($conn, $sql_select);

    if ($select_result && mysqli_num_rows($select_result) > 0) {
        $row = mysqli_fetch_row($select_result);
        $image_name = $row[0];

        // Code to unlink (delete) the image physically from the folder
        if (file_exists("./uploads/" . $image_name)) {
            unlink("./uploads/" . $image_name);
        }

        // Delete the record from the database
        $sql = "DELETE FROM gallery WHERE id = $id";
        mysqli_query($conn, $sql);

        

    } else {
        $_SESSION['error'] = 'Image not found.';
    }
        if ($lvl == '0') {
            header("Location:./customer-gallery.php?id=$mail");
        } else {
            header("Location:./gallery.php");
        }
} else {
    $_SESSION['error'] = 'Please select an image or write a title.';
    if ($lvl == '0') {
        header("Location:./customer-gallery.php?id=$mail");
    } else {
        header("Location:./gallery.php");
    }
}
mysqli_close($conn); // Close the database connection
?>
