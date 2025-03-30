<?php 
	include ("includes/dbcon.php");

	// Debug: Check database connection
	if (!$conn) {
		die("Debug: Database connection failed: " . mysqli_connect_error());
	}
	echo "Debug: Database connection successful.<br>";

	if(isset($_POST['submit'])){
		// Debug: Check if POST data is received
		if (empty($_POST['fname']) || empty($_POST['mail']) || empty($_POST['cnum']) || empty($_POST['pwd']) || empty($_POST['cpwd']) || empty($_POST['address'])) {
			die("Debug: Missing required POST data.");
		}

		$fname = mysqli_real_escape_string($conn, $_POST['fname']);
		$mail = mysqli_real_escape_string($conn, $_POST['mail']);
		$cnum = mysqli_real_escape_string($conn, $_POST['cnum']);
		$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
		$cpwd = mysqli_real_escape_string($conn, $_POST['cpwd']);
		$address = mysqli_real_escape_string($conn, $_POST['address']);

		// Validate that passwords match
		if($pwd != $cpwd){
			echo '
				<script>
					alert("Passwords do not match!");
					window.location.href="signup.php";
				</script>
			';
			exit();
		}

		// Hash the password for security
		$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

		// Validate if the email is already in use
		$ValidationQuery = "SELECT * FROM user_tbl WHERE Mail LIKE BINARY '$mail'";
		$ValidationResult = mysqli_query($conn, $ValidationQuery);

		// Debug: Check query execution
		if (!$ValidationResult) {
			die("Debug: Validation query failed: " . mysqli_error($conn));
		}

		if(mysqli_num_rows($ValidationResult) > 0){
			echo '
				<script>
					alert("You are already registered!");
					window.location.href="signup.php";
				</script>
			';
		} else {
			// Insert new user into the database
			$InsertQuery = "INSERT INTO `user_tbl`(`FName`, `Mail`, `CNumber`, `Pwd`, `userlvl`, `Address`) 
			                VALUES ('$fname', '$mail', '$cnum', '$hashedPwd', '0', '$address')";
			$InsertResult = mysqli_query($conn, $InsertQuery);

			// Debug: Check query execution
			if (!$InsertResult) {
				die("Debug: Insert query failed: " . mysqli_error($conn));
			}

			include 'sendmail.php';

			if($InsertResult){
				echo '
					<script>
						alert("Successfully Registered!");
						window.location.href="../index.php"; // Redirect to login page after successful registration
					</script>
				';
			} else {
				echo '
					<script>
						alert("Error registering user. Please try again.");
						window.location.href="signup.php";
					</script>
				';
			}
		}
	}
?>
