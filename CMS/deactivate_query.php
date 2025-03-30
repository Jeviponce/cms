<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.0/dist/sweetalert2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.0/dist/sweetalert2.min.js"></script>

<?php 
    session_start();
    include 'includes/dbcon.php';

    if(isset($_POST['submit'])){
        
        $id = $_POST['id'];
        $status = $_POST['status'];

        // Toggle status between 1 and 0
        if ($status == 1) {
            $newStatus = 0;
            $message = "Account Deactivated";
            $msgTxt = "Account Successfully Deactivated!";
        } else {
            $newStatus = 1;
            $message = "Account Activated";
            $msgTxt = "Account Successfully Activated!";
        }

        // Update the record with the new status
        $query = "UPDATE `user_tbl` SET `status`='$newStatus' WHERE `Id`='$id'";
        $result = mysqli_query($conn, $query);
        
        if($result){
            // Success message using SweetAlert
            $_SESSION['msg'] = $message;
            $_SESSION['msg_txt'] = $msgTxt;
            $_SESSION['icon'] = "success";
            header("location:register-user.php");
            exit();
        } else {
            // Failure message using SweetAlert
            $_SESSION['msg'] = "Error";
            $_SESSION['msg_txt'] = "There was an issue updating the status. Please try again!";
            $_SESSION['icon'] = "error";
            header("location:register-user.php");
            exit();
        }
    }
?>
