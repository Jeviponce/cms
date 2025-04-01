<?php
session_start();
require_once('includes/dbcon.php');
$lvl = $_SESSION['lvl'];
$mail = $_SESSION['mail'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    // Fetch the image file path
    $query = "SELECT image FROM gallery WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $image = $result->fetch_assoc();

    if ($image) {
        $filePath = './uploads/' . $image['image'];

        // Delete the file from the server
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Delete the record from the database
        $deleteQuery = "DELETE FROM gallery WHERE id = ?";
        $deleteStmt = $conn->prepare($deleteQuery);
        $deleteStmt->bind_param("i", $id);
        $deleteStmt->execute();

        if ($deleteStmt->affected_rows > 0) {
            $_SESSION['success'] = "Image deleted successfully.";
        } else {
            $_SESSION['error'] = "Failed to delete the image.";
        }
    } else {
        $_SESSION['error'] = "Image not found.";
    }

    $stmt->close();
    $conn->close();
}

if ($lvl == '0') {
    header("Location:./customer-gallery.php?id=$mail");
} else {
    header("Location:./gallery.php");
}
exit;
?>
