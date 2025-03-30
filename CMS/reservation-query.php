<?php 
	error_reporting(0);
	session_start();
	include('includes/dbcon.php');

	$id = $_POST['id'];
	$lots = $_POST['lots'];
	$size = $_POST['size'];
	$bpermit = $_FILES['bpermit']['name'];
	$rbpermit = $_POST['rbpermit'];
	$doc = $_POST['doc'];
	$dte = $_POST['dte'];
	$tme = $_POST['tme'];
	$fname = $_SESSION['fname'];
	$rand = rand(10,100);

	if($_POST['submit']){
		$InsertQuery = "INSERT INTO `reservation_tbl`(`ReqNum`, `FName`, `ValidId`, `Lots`, `Size`, `BPermit`, `RBPermit`, `DoC`, `Dte`, `Tme`) VALUES ('$rand', '$fname', '$id', '$lots', '$size', '$bpermit', '$rbpermit', '$doc', '$dte', '$tme')";
		$InsertResult = mysqli_query($conn,$InsertQuery);

		if($InsertResult){
			move_uploaded_file($_FILES["bpermit"]["tmp_name"], "img/".$_FILES["bpermit"]["name"]);
			echo '
			<script>
				alert("Successfully Registered!");
				window.location.href="dashboard"; 
				</script>		';
		}

	}

?>