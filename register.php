<?php
session_start();
require 'function.php'; 

if(isset($_POST["register"]) ){
    if(register($_POST) > 0 ){
		header('Location: login.php');
		exit;
    }else{
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register New Account</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="login_assets/images/icons/door-open-fill.svg"/>
	<link rel="stylesheet" type="text/css" href="login_assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="login_assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="login_assets/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="login_assets/vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="login_assets/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="login_assets/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="login_assets/vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="login_assets/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="login_assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="login_assets/css/main.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('login_assets/images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="" method="POST">
					<span class="login100-form-logo">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Register
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter Email">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xe0be;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass2" placeholder="Confirm Password">
						<span class="focus-input100" data-placeholder="&#xe899;"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="register">
							Register
						</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
                        <a>|</a>
						<a class="txt1" href="login.php">
							Login
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
	<script src="login_assets/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="login_assets/vendor/animsition/js/animsition.min.js"></script>
	<script src="login_assets/vendor/bootstrap/js/popper.js"></script>
	<script src="login_assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="login_assets/vendor/select2/select2.min.js"></script>
	<script src="login_assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="login_assets/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="login_assets/vendor/countdowntime/countdowntime.js"></script>
	<script src="login_assets/js/main.js"></script>

</body>
</html>