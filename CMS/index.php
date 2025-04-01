<!DOCTYPE html>
<html lang="en">
<head>
    <title>CMS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

</head>
<body style="background-color: #666666;">
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="login-query/login_query.php" autocomplete="off" id="loginForm">
                    <span class="login100-form-title p-b-43">
                        CMS | Login to continue
                    </span>

                    <!-- Error message container -->
                    <?php if (isset($_GET['error']) && $_GET['error'] == 'invalid'): ?>
                        <div style="color: red; text-align: center; margin-bottom: 10px;">
                            Incorrect password or email. Please try again.
                        </div>
                    <?php endif; ?>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="mail">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Email</span>
                    </div>
                    
                    
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" id="pwd" name="pwd">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                    </div>

                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" onclick="showPwd()">
                            <label class="label-checkbox100" for="ckb1">
                                Show Password
                            </label>
                        </div>

                        <div>
                            <a href="#" class="txt1" onclick="showModal()">
                                Forgot Password?
                            </a>
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <input type="submit" name="submit" class="login100-form-btn" value="Login">
                        
                    </div>
                    
                    <div class="text-center p-t-46 p-b-20">
                        <span class="txt2">
                            or sign up account
                        </span>
                    </div>

                    <div class="login100-form-social flex-c-m">
                        <a href="register/signup" class="login100-form-social-item flex-c-m bg2 m-r-5">
                            <i class="fa-solid fa-cross"></i>
                        </a>
                        <span class="txt2">
                            <a href="register/signup" class="txt1">
                                Register Here!
                            </a>
                        </span>
                    </div>
                </form>

                <div class="login100-more" style="background-image: url('img/bg.jpg');">
                </div>
            </div>
        </div>
    </div>

<!-- Modal HTML -->
<div id="forgotPasswordModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reset Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="resetPasswordForm" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label for="resetEmail">Enter your email address:</label>
                        <input type="email" class="form-control" id="resetEmail" name="mail" required>
                    </div>
                    <div name="warningDiv" id="WarningDiv"></div>
                    <button type="submit" class="btn btn-primary" id="resetPasswordBtn">Send Temporary Password</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(document).ready(function(){
    $("#resetPasswordForm").submit(function(e){
        e.preventDefault();  // Prevent the default form submission

        var email = $("#resetEmail").val();

        $.ajax({
            url: "forgot_password_query.php",  // The PHP file that processes the form
            type: "POST",
            data: {
                mail: email,
                password: true  // Include this to trigger the password reset process
            },
            success: function(response){
                // Check the response from PHP
                if(response.includes('Success')) {
                    alert("Success! Your temporary password has been sent to your email.");
                } else if(response.includes('Email not found')) {
                    alert("Error: Email not found!");
                } else {
                    alert("An error occurred. Please try again.");
                }
            }
        });
    });
});
</script>


<!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="js/main.js"></script>
<!--Show Password-->
    <script>
        function showPwd(){
            var x = document.getElementById("pwd");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        // Show the modal
        function showModal() {
            var modal = document.getElementById("forgotPasswordModal");
            $(modal).modal('show');
        }
    </script>
</body>
</html>
