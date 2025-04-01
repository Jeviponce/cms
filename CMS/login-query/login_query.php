<?php 
	include 'session.php';
	include ("../includes/dbcon.php");
    

	if($_SESSION['status']=='valid'){
		echo "<script>window.location.href='../dashboard.php'</script>";
	}

	if(isset($_POST['submit'])){

		$email = trim($_POST['mail']);
		$pwd = trim($_POST['pwd']);

		$validate = "SELECT * FROM user_tbl WHERE Mail LIKE BINARY '$email' AND Pwd LIKE BINARY '$pwd' AND status='1'";
		$ValidateResult = mysqli_query($conn,$validate);
		$RowValidate = mysqli_fetch_array($ValidateResult);

		if(mysqli_num_rows($ValidateResult) > 0)
		{
			$_SESSION['status']='valid';
			
			$_SESSION['lvl']=$RowValidate['userlvl'];
			$_SESSION['fname']=$RowValidate['FName'];
			$_SESSION['id']=$RowValidate['Id'];
			$_SESSION['mail'] = $RowValidate['Mail'];
			header('location:../dashboard.php');
		}else{
			$_SESSION['status']='invalid';
			header('location:../index.php?error=invalid'); // Redirect with error parameter
		}
	}
?>