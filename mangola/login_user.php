
<?php

session_start();
if (!(isset($_SESSION['name']) && isset($_SESSION['email']))) {
	echo "to LOGIN_USER.PHP";
	header('Location: register.php');
}
include "includes/dbconnect.php";


$email = $_POST['user_email'];
$password = $_POST['user_password'];

// $pwd_decrpt = password_verify($password, $hash)

// $query = "SELECT * FROM `users` WHERE `email` LIKE '$email' AND `password` LIKE '$password'";
$query = "SELECT * FROM `users` WHERE `email` LIKE '$email'";

//running the serch in DB and storing in $result
$result = mysqli_query($connection, $query);

//function to return the number of rows in $result

$num_rows = mysqli_num_rows($result);

if ($num_rows == 1) {
	//correct login
	//retriving session name
	$row = mysqli_fetch_assoc($result);


	if (($_SESSION['email'] == "admin@strawberryHeaven.com") && ($row['password'] == "1234")) {
		header('Location: admin.php');
	} else {
		// check pwd
		if (password_verify($password, $row['password'])) {
			$_SESSION['name'] = $row['name'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['user_id'] = $row['user_id'];
			header('Location: products.php');
		} else {
			header('Location: index.php');
		}
	}
} else {	//incorrect login
	//redirect
	header('Location: index.php');
}
