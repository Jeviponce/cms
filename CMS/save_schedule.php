<?php 
session_start();
require_once('includes/dbcon.php');

if(isset($_POST['submit'])) {
    $service = $_POST['service'];
    $description = $_POST['description'];
    $ReqNum = rand(10, 100);
    $FName = $_SESSION['fname'];

    $graveNum = $_POST['graveNum'];
    $lots = $_POST['lots'];
    $size = $_POST['size'];
    $start_datetime = $_POST['start_datetime'];

    $id = $_FILES['id']['name'];
    $bpermit = $_FILES['bpermit']['name'];
    $rbpermit = $_FILES['rbpermit']['name'];
    $doc = $_FILES['doc']['name'];
    $gender = $_POST['gender'];
    $bday = $_POST['bday'];

    $dte = date("Y/m/d");
    $mail =  $_SESSION['mail'];
    $DoCDte = $_POST['DoCDte'];
    $mail = $_SESSION['mail'];
    // SQL Insert
    $InsertQuery = "INSERT INTO `schedule_list`(`title`, `description`, `RefNum`, `FName`, `ValidId`, `Lots`, `Size`, `BPermit`, `RBPermit`, `graveNum`, `start_datetime`, `end_datetime`, `DoC`, `dte`,`UserMail`, `DoCDte`, `mail`, `gender`, `bday`) 
                    VALUES ('$service', '$description', '$ReqNum', '$FName', '$id', '$lots', '$size', '$bpermit', '$rbpermit', '$graveNum', '$start_datetime', '$start_datetime', '$doc', '$dte', '$mail', '$DoCDte', '$mail', '$gender', '$bday')";
    
    $InsertResult = mysqli_query($conn, $InsertQuery);

    if($InsertResult) {
        // Move files
        move_uploaded_file($_FILES["id"]["tmp_name"], "file_upload/".$id);
        move_uploaded_file($_FILES["bpermit"]["tmp_name"], "file_upload/".$bpermit);
        move_uploaded_file($_FILES["rbpermit"]["tmp_name"], "file_upload/".$rbpermit);
        move_uploaded_file($_FILES["doc"]["tmp_name"], "file_upload/".$doc);
        
        $_SESSION['msg'] = "Grave Slot Successfully Reserved";
        $_SESSION['msg_txt'] = "Please wait for confirmation! Thank you";
        $_SESSION['icon'] = "success";
        header("location:booking.php");

        exit();
    } else {
        $_SESSION['msg'] = "Error Registration";
        $_SESSION['msg_txt'] = "Registration Error, Please try later!";
        $_SESSION['icon'] = "error";
        header("location:booking.php");
        exit();
    }
}
?>
