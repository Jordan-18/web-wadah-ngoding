<?php
	session_start();
	require 'function.php'; 
	// cek cookie
	if (isset($_COOKIE['id']) && isset($_COOKIE['key'])){
		$id = $_COOKIE['id'];
		$key = $_COOKIE['key'];

		// ambil username berdasarkan id
		$resu = mysqli_query($conn,"SELECT username FROM user WHERE id = $id");

		$row = mysqli_fetch_assoc($resu);


		// cek cookie
		if($key === hash('sha256', $row['username'])){
			$_SESSION['login'] = true;
		}

	}
	// cek session 
	if(isset($_SESSION["login"])){
		header("Location:dashboard");
		exit;
	}


	if(isset($_POST["login"])){
		$username = $_POST["username"];
		$password = $_POST["password"];

		$result = mysqli_query($conn,"SELECT * FROM  user WHERE username = '$username'");;

		if(mysqli_num_rows($result) === 1){
		// cek password
			$row =mysqli_fetch_assoc($result);
		if(password_verify($password, $row["password"])){
			// set session 
			$_SESSION["login"] = true;
			$_SESSION["id"] = $row["id"];
			$_SESSION["username"] = $row["username"];
			if (isset($_POST['remember'])){
				// buat cookie
				setcookie('id',$row['id'],time()+60);
				setcookie('key',password_hash($row['username'], PASSWORD_DEFAULT),time() + 60);
			}
			header("Location: dashboard");
			exit;
			}
		}

		$error = true;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
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
				<form class="login100-form validate-form" action="" method="post">
					<span class="login100-form-logo">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login">
							Login
						</button>
					</div>

					<div class="text-center p-t-90" hidden>
						<a class="txt1" href="#">
							Forgot Password?
						</a>
                        <a>|</a>
						<a class="txt1" href="register.php">
							Register
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