<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
	header('Location: ?page=');
	exit;
}
$message = '';
if (isset($_POST['login'])) {
	require_once 'assets/inc/connection.php';
	$email = $connection->real_escape_string($_POST['email']);
	$password = $connection->real_escape_string($_POST['password']);
	if ($email == '' || $password == '') {
		$message = 'All fields are required';
	} else {
		$sql = "SELECT * FROM `users` WHERE `email` = '$email' LIMIT 1";
		$result = $connection->query($sql);
		if ($result->num_rows > 0) {
			$user = $result->fetch_assoc();
			if (password_verify($password, $user['password'])) {
				$_SESSION['logged_in'] = true;
				$_SESSION['user_id'] = $user['id'];
				$_SESSION['user_name'] = $user['name'];
				$_SESSION['user_email'] = $user['email'];
				$_SESSION['user_role'] = $user['role'];
				if (isset($_SESSION['logged_in']) && $_SESSION['user_role'] == '1') {
					header('Location: ?page=');
					// $message = 'user';
				} else {
					// header('Location: admin/admin-dashboard.php');
					$message = 'admin';
				}
			} else {
				$message = 'Password is incorrect';
			}
		} else {
			$message = 'Invalid email or password';
		}
	}
}
?>
<!doctype html>
<html lang="en">

<head>
	<title>Login - WoowBlog</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/logregstyle.css">

</head>

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div class="login-wrap p-4 p-md-5">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">Login</h3>
								</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
							</div>
							<?php if (isset($message) && $message != '') : ?>
								<div class="alert alert-danger" role="alert">
									<?php echo $message; ?>
								</div>
							<?php endif; ?>
							<form action="?page=1" method="POST" class="signin-form">
								<div class="form-group mt-3">
									<input type="email" class="form-control" name="email" required>
									<label class="form-control-placeholder" for="email">Email</label>
								</div>
								<div class="form-group">
									<input id="password-field" type="password" name="password" class="form-control" required>
									<label class="form-control-placeholder" for="password">Password</label>
									<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
								</div>
								<div class="form-group">
									<button type="submit" class="form-control btn btn-primary rounded submit px-3" name="login">Login</button>
								</div>
								<div class="form-group d-flex">
									<div class="w-50 text-left">
										<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
											<input type="checkbox">
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-right">
										<a href="#">Forgot Password</a>
									</div>
								</div>
							</form>
							<p class="text-center">Not a member? <a href="?page=2">Register</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="assets/js/jquery-3.6.0.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/logreg.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>