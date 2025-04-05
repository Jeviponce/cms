<?php
include('includes/dbcon.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contract_id'])) {
    $contractId = $_POST['contract_id'];

    // Update the renewal status in the database
    $query = "UPDATE contracts SET renewal_status = 1 WHERE contract_id = '$contractId'";
    if (mysqli_query($conn, $query)) {
        $_SESSION['msg'] = "Contract renewed successfully!";
        $_SESSION['icon'] = "success";
    } else {
        $_SESSION['msg'] = "Failed to renew contract.";
        $_SESSION['icon'] = "error";
    }
}

header("Location: renew-contract.php");
exit();
?>
