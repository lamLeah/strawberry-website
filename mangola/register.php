<!DOCTYPE html>
<html>
	<head>
		<script src="mangola/js/validationButton.js"></script>
	</head>

<?php include "includes/css_header.php" ?>


<body style="background-color:#2F3235 !important">

	<?php include "includes/header_prelogin.php" ?>


	<div id="main_body" class="container">


		<div class="row">
			<div class="col-md-8 margin-top50">
				<h1 class="text-white font-80px text-center"><b>Get the best Strawberries at the cheapest price from Strawberry Heaven</b></h1>
			</div>

			<div class="col-md-4 margin-top50">
				<h2 class="text-white text-center"> <b>Create an Account here</b> </h2>
				<form class="form" action="register_user.php" method="POST">
					<label class="text-white">First Name:</label>
					<input type="Name" class="form-control" placeholder="Enter your Name" name="user_name" required><br>
					<label class="text-white">Email:</label>
					<input type="email" class="form-control" placeholder="Enter your Email" name="user_email" required>
					<br>
					<p id="email-hint" style="display: none; color: red"><span>Could not send to the email, please try again.</span></p>
					<button type="button" class="btn btn-lg btn-success" onclick="sendEmailValidationCode()"> Send Validation Code</button>
					<br>
					<br>
					<label class="text-white">Validation code:</label>
					<input type="text" id="email-validation-code" class="form-control" placeholder="Enter your Code" name="user_email_validation_code" required><br>
					<label class="text-white">Phone:</label>
					<input type="tel" class="form-control" placeholder="Enter your Phone" name="user_phone" required><br>
					<label class="text-white">Password:</label>
					<input type="password" class="form-control" placeholder="Password" name="user_password" required><br>
					<input type="submit" class="btn btn-danger btn-lg btn-block" value="Register" name=""><br>
				</form>
				<p class="text-white"><i>Already a member?<a href="index.php">Login Here</a></i></p>
			</div>
			<?php
			if (isset($_GET['msg'])) {
				if ($_GET['msg'] == '2') {
					echo "<h3 class='text-center text-white margin-top50'><i>User Email OR Phone Already Taken!</i></h3>";
				} elseif ($_GET['msg'] == '3') {
					echo "<h3 class='text-center text-white margin-top50'><i>Validation Code is not correct, please try again!</i></h3>";
				}
			}


			if ($_SERVER["REQUEST_MEHTOD"] == "POST") {
				$user_name = $_POST['user_name'];
				$user_email = $_POST['user_email'];
				$user_phone = $_POST['user_phone'];
				$user_password = $_POST['user_password'];
				if (strpos($user_email, '@') === false || strpos($user_email, '.com') === false)
					echo "Incalid email format. Email must contain '@' and end with '.com' .";
			}

			$strongRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#\$%\^&\*\(\)_])[A-Za-z\d!@#\$%\^&\*\(\)_]{8,}$/";

			if (!preg_match($strongRegex, $user_password)) {
				echo "Password must be at least 8 characters long, and include at least one uppercase letter, one lowercase letter, one number, and one special character.";
			}
			?>
		</div>
	</div>
</body>
<script>
	function sendEmailValidationCode() {

		// Create a new XMLHttpRequest object
		var xhr = new XMLHttpRequest();
		// Configure the request
		xhr.open("GET", "./includes/mail_sendCode.php?to=rainklekou@gmail.com", true);
		// Define the callback function
		xhr.onreadystatechange = function() {
			if (xhr.readyState === 4 && xhr.status === 200) {
				// Handle the response from the server
				var response = JSON.parse(xhr.responseText);
				if (response.result == '1') {
					sessionStorage.setItem('validationCode', response.code);
					document.querySelector('#email-hint').style.display = "none"
				} else {
					document.querySelector('#email-hint').style.display = "block"
				}
			}
		};

		// Send the request
		xhr.send();
	}
</script>

</html>