<?php
session_start();
if (!(isset($_POST['user_name']) && isset($_POST['user_email']))) {
	header('Location: register.php?msg=108');
}
include "includes/dbconnect.php";
//fetch the user data
$name = $_POST['user_name'];
$email = $_POST['user_email'];
$phone = $_POST['user_phone'];
$password = $_POST['user_password'];

//check email address
if(empty($_POST['user_email'])|| !filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)){
	$errors[] = "Please go back and fill in your email address and make sure it is valid!<br/>";
} else{
	$user_email = $_POST['user_email'];
}
//check for already registerd user
$query1 = "SELECT * FROM `users` WHERE `email` LIKE '$email' OR `phone` LIKE '$phone'";
$result1 = mysqli_query($connection, $query1);
if (mysqli_num_rows($result1) == 0) {
	//push data to the DB
	$query = "INSERT INTO `users` (`user_id`, `name`, `email`, `phone`, `password`) VALUES (NULL, '$name', '$email', '$phone', '$password')";
	if (mysqli_query($connection, $query)) {
		//redirect
		// $_SESSION['name'] = $name;
		// $_SESSION['email'] = $email;
		// $_SESSION['phone'] = $phone;

		// // $pwd_hash = password_hash($password, PASSWORD_DEFAULT);
		// $query1 = "SELECT * FROM `users` WHERE `email` LIKE '$email' AND `password` LIKE '$password'";
		// // $query1 = "SELECT * FROM `users` WHERE `email` LIKE '$email' AND `password` LIKE '$pwd_hash'";
		// $result1 = mysqli_query($connection, $query1);
		// $row1 = mysqli_fetch_assoc($result1);
		// $_SESSION['user_id'] = $row1['user_id'];
		header('Location: index.php');
	}
} elseif (mysqli_num_rows($result1) == 1) {
	header('Location: register.php?msg=2');
} else {
	echo "Some Error occured!";
}


//redirect
