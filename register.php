<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
	header('Location: ?page=');
	exit;
}
?>
<!doctype html>
<html lang="en">

<head>
	<title>Register - WoowBlog</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/logregstyle.css">
	<style>
		.loading {
			position: fixed;
			width: 100%;
			height: 100%;
			background: #fff;
			z-index: 9999;
		}

		.loading h1 {
			text-align: center;
			margin-top: 20%;
		}
	</style>
</head>

<body>
	<!-- loading icon here -->
	<div class="loading">
		<h1><img src="assets/img/loading.gif" alt=""></h1>
	</div>
	<!-- loading icon here -->

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div class="login-wrap p-4 p-md-5">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">Register</h3>
								</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
							</div>
							<form class="signin-form" id="regForm">
								<div class="message"></div>
								<div class="form-group mt-4">
									<input type="text" name="name" id="name" class="form-control" required>
									<label class="form-control-placeholder" for="name">Name</label>
									<span>
										<p class="text-danger" id="nameError"></p>
									</span>
								</div>
								<div class="form-group mt-3">
									<input type="email" name="email" id="email" class="form-control" required>
									<label class="form-control-placeholder" for="email">Email</label>
									<span id="emailError">

									</span>
								</div>
								<div class="form-group">
									<input id="password-field" type="password" name="password" class="form-control" required>
									<label class="form-control-placeholder" for="password">Password</label>
									<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
									<span>
										<p class="text-danger" id="passwordError"></p>
									</span>
								</div>
								<div class="form-group">
									<input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required>
									<label class="form-control-placeholder" for="password_confirmation">Confirm Password</label>
									<span toggle="#password_confirmation" class="fa fa-fw fa-eye field-icon toggle-password"></span>
									<span>
										<p class="text-danger" id="password_confirmationError"></p>
									</span>
								</div>
								<div class="form-group">
									<button type="submit" class="form-control btn btn-primary rounded submit px-3" id="regBtn" name="register">Register</button>
								</div>
							</form>
							<p class="text-center">Already Registred? <a href="?page=1">Login</a></p>
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

	<script>
		$(document).ready(function() {
			$('.loading').hide();
			// sweet alert start
			const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000,
				timerProgressBar: true,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				}
			})
			// sweet alert end

			const nameAlert = '<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Name is required';
			const emailAlert = '<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Email is required';
			const passwordAlert = '<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Password is required';
			const password_confirmationAlert = '<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Confirm Password is required';
			const passwordMatchAlert = '<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Password does not match';
			const validEmailAlert = '<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Invalid Email';

			// onchange email validation
			$('#email').on('change', function() {
				var email = $('#email').val();

				$.ajax({
					url: 'assets/inc/save.php',
					type: 'POST',
					data: {
						type: 10,
						email: email
					},
					success: function(data) {
						const result = JSON.parse(data, function(key, value) {
							return value;
						});
						if (result.status == 2) {
							$('#emailError').html('<p class="text-danger"><i class="fa fa-times-circle" aria-hidden="true"></i> ' + result.message + '</p>');
							return;
						} else if (result.status == 1) {
							// email validation
							if (email != '') {
								var regEx = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
								var validEmail = regEx.test(email);
								if (!validEmail) {
									$('#emailError').html('<p class="text-danger">' + validEmailAlert + '</p>');
									return;
								} else {
									$('#emailError').html('<p class="text-success"><i class="fa fa-check-circle" aria-hidden="true"></i> ' + result.message + '</p>');
								}
							}
						}
					}
				});
			});

			$('#regForm').submit(function(e) {
				e.preventDefault();
				var name = $('#name').val();
				var email = $('#email').val();
				var password = $('#password-field').val();
				var password_confirmation = $('#password_confirmation').val();
				// console.log(name, email, password, password_confirmation);
				// return;

				//form validation
				if (name == '' && email == '' && password == '' && password_confirmation == '') {
					$('#nameError').html(nameAlert);
					$('#emailError').html('<p class="text-danger">' + emailAlert + '</p>');
					$('#passwordError').html(passwordAlert);
					$('#password_confirmationError').html(password_confirmationAlert);
					return;
				} else if (name == '' && email == '' && password == '') {
					$('#nameError').html(nameAlert);
					$('#emailError').html('<p class="text-danger">' + emailAlert + '</p>');
					$('#passwordError').html(passwordAlert);
					$('#password_confirmationError').html('');
					return;
				} else if (name == '' && email == '' && password_confirmation == '') {
					$('#nameError').html(nameAlert);
					$('#emailError').html('<p class="text-danger">' + emailAlert + '</p>');
					$('#passwordError').html('');
					$('#password_confirmationError').html(password_confirmationAlert);
					return;
				} else if (name == '' && password == '' && password_confirmation == '') {
					$('#nameError').html(nameAlert);
					$('#emailError').html('');
					$('#passwordError').html(passwordAlert);
					$('#password_confirmationError').html(password_confirmationAlert);
					return;
				} else if (email == '' && password == '' && password_confirmation == '') {
					$('#nameError').html('');
					$('#emailError').html('<p class="text-danger">' + emailAlert + '</p>');
					$('#passwordError').html(passwordAlert);
					$('#password_confirmationError').html(password_confirmationAlert);
					return;
				} else if (name == '' && email == '') {
					$('#nameError').html(nameAlert);
					$('#emailError').html('<p class="text-danger">' + emailAlert + '</p>');
					$('#passwordError').html('');
					$('#password_confirmationError').html('');
					return;
				} else if (name == '' && password == '') {
					$('#nameError').html(nameAlert);
					$('#emailError').html('');
					$('#passwordError').html(passwordAlert);
					$('#password_confirmationError').html('');
					return;
				} else if (name == '' && password_confirmation == '') {
					$('#nameError').html(nameAlert);
					$('#emailError').html('');
					$('#passwordError').html('');
					$('#password_confirmationError').html(password_confirmationAlert);
					return;
				} else if (email == '' && password == '') {
					$('#nameError').html('');
					$('#emailError').html('<p class="text-danger">' + emailAlert + '</p>');
					$('#passwordError').html(passwordAlert);
					$('#password_confirmationError').html('');
					return;
				} else if (email == '' && password_confirmation == '') {
					$('#nameError').html('');
					$('#emailError').html('<p class="text-danger">' + emailAlert + '</p>');
					$('#passwordError').html('');
					$('#password_confirmationError').html(password_confirmationAlert);
					return;
				} else if (password == '' && password_confirmation == '') {
					$('#nameError').html('');
					$('#emailError').html('');
					$('#passwordError').html(passwordAlert);
					$('#password_confirmationError').html(password_confirmationAlert);
					return;
				} else if (name == '') {
					$('#nameError').html(nameAlert);
					$('#emailError').html('');
					$('#passwordError').html('');
					$('#password_confirmationError').html('');
					return;
				} else if (email == '') {
					$('#nameError').html('');
					$('#emailError').html('<p class="text-danger">' + emailAlert + '</p>');
					$('#passwordError').html('');
					$('#password_confirmationError').html('');
					return;
				} else if (password == '') {
					$('#nameError').html('');
					$('#emailError').html('');
					$('#passwordError').html(passwordAlert);
					$('#password_confirmationError').html('');
					return;
				} else if (password_confirmation == '') {
					$('#nameError').html('');
					$('#emailError').html('');
					$('#passwordError').html('');
					$('#password_confirmationError').html(password_confirmationAlert);
					return;
				} else if (password != password_confirmation) {
					$('#nameError').html('');
					$('#emailError').html('');
					$('#passwordError').html('');
					$('#password_confirmationError').html(passwordMatchAlert);
					return;
				} else {
					$('#nameError').html('');
					$('#emailError').html('');
					$('#passwordError').html('');
					$('#password_confirmationError').html('');
					$('#name').val('');
					$('#email').val('');
					$('#password-field').val('');
					$('#password_confirmation').val('');

					$.ajax({
						url: 'assets/inc/save.php',
						method: 'post',
						data: {
							type: 9,
							name: name,
							email: email,
							password: password,
							password_confirmation: password_confirmation
						},
						beforeSend: function() {
							// page freeze and loading icon show
							$('.loading').show();
						},
						success: function(response) {
							const result = JSON.parse(response, function(key, value) {
								return value;
							});
							// console.log(result);
							// return;
							if (result.status == 1) {
								Toast.fire({
									icon: 'success',
									title: result.message
								})
								setTimeout(function() {
									window.location.href = '?page=1';
								}, 3000);
							} else if (result.status == 2) {
								Toast.fire({
									icon: 'error',
									title: result.message
								})
							} else {
								Toast.fire({
									icon: 'error',
									title: 'Registration Failed'
								})
							}
						}
					})
				}
			});

		});
	</script>

</body>

</html>