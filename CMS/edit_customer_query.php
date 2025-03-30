
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.0/dist/sweetalert2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.0/dist/sweetalert2.min.js"></script>
<?php 
    session_start();

    include 'includes/dbcon.php';

    if(isset($_POST['submit'])){
        
        $id = $_POST['id'];
        $fname = $_POST['fname'];
        $mail = $_POST['mail'];
        $cnum = $_POST['cnum'];
        $address = $_POST['address'];

        // Fetch current values from the database
        $query = "SELECT `FName`, `Mail`, `CNumber`, `Address` FROM `user_tbl` WHERE `Id`='$id'";
        $result = mysqli_query($conn, $query);
        $current_data = mysqli_fetch_assoc($result);

        // Check if the submitted data is different from the current data
        if ($current_data['FName'] == $fname && $current_data['Mail'] == $mail && $current_data['CNumber'] == $cnum && $current_data['Address'] == $address) {
            // No changes, display the 'Nothing changes' message using SweetAlert
             // Success message using SweetAlert
                $_SESSION['msg'] = "Nothing Changes";
                $_SESSION['msg_txt'] = "No Changes Happened!";
                $_SESSION['icon'] = "info";
                header("location:customer.php");
                exit();
        } else {
            // Update the record
            $query = "UPDATE `user_tbl` SET `FName`='$fname', `Mail`='$mail', `CNumber`='$cnum', `Address`='$address' WHERE `Id`='$id'";
            $result = mysqli_query($conn, $query);
            
            if($result){
                // Success message using SweetAlert
                $_SESSION['msg'] = "Successfully Modified";
                $_SESSION['msg_txt'] = "Account Successfully Modified!";
                $_SESSION['icon'] = "success";
                header("location:customer.php");
                exit();

            }
        }
    }
?>
