<!DOCTYPE html>
<html lang="en">
<head>
	<title>CMS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/bootstrap/css/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===============================================================================================-->
	<!-- Toastr CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

	<!-- Toastr JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="signup_query.php">
					<span class="login100-form-title p-b-43">
						CMS | Sign-up Account
					</span>
					
					
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" pattern="[A-Za-z\s.]*" title="Only letters (A-Z, a-z) and periods (.) are allowed." name="fname">
						<span class="focus-input100"></span>
						<span class="label-input100">Full Name</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="email" name="mail">
						<span class="focus-input100"></span>
						<span class="label-input100">E-Mail</span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="number" name="cnum">
						<span class="focus-input100"></span>
						<span class="label-input100">Contact Number</span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="address">
						<span class="focus-input100"></span>
						<span class="label-input100">Address</span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" id="pwd" name="pwd">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" id="pwd1" name="cpwd">
						<span class="focus-input100"></span>
						<span class="label-input100">Confirm Password</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" onclick="showPwd()">
							<label class="label-checkbox100" for="ckb1">
								Show Password
							</label>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit">
							Sign-Up
						</button>
					</div>
					
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							or return to login form
						</span>
					</div>

					<div class="login100-form-social flex-c-m">
						<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa-solid fa-right-to-bracket"></i>
						</a>
						<span class="txt2">
							<a href="../index.php" class="txt1">
								Login
							</a>
						</span>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('../img/bg.jpg');">
				</div>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/daterangepicker/moment.min.js"></script>
	<script src="../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../js/main.js"></script>
<!--Show Password-->
	<script>
		function showPwd(){
			  var x = document.getElementById("pwd");
			  var y = document.getElementById('pwd1');
			  if (x.type === "password" && y.type === "password") {
			    x.type = "text";
			    y.type = "text";
			  } else {
			    x.type = "password";
			    y.type = "password";
			  }
		}
	</script>
</body>
</html>