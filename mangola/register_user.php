<?php
session_start();
if (!(isset($_POST['user_name']) && isset($_POST['user_email']))) {
    header('Location: register.php?msg=108');
    exit;
}

include "includes/dbconnect.php";

// Fetch the user data
$name = $_POST['user_name'];
$email = $_POST['user_email'];
$phone = $_POST['user_phone'];
$password = $_POST['user_password'];
$code = $_POST['user_email_validation_code'];

// Check email address
if (empty($_POST['user_email']) || !filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Please go back and fill in your email address and make sure it is valid!<br/>";
} else {
    $user_email = $_POST['user_email'];
}

// Check user validation
if (!isset($_SESSION['validationCode']) || $code != $_SESSION['validationCode']) {
    header('Location: register.php?msg=3');
    exit;
}

// Check for already registered user
$query1 = "SELECT * FROM `users` WHERE `email` LIKE '$email' OR `phone` LIKE '$phone'";
$result1 = mysqli_query($connection, $query1);

if (mysqli_num_rows($result1) == 0) {
    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Push data to the DB
    $query = "INSERT INTO `users` (`user_id`, `name`, `email`, `phone`, `password`) VALUES (NULL, '$name', '$email', '$phone', '$hashedPassword')";
    if (mysqli_query($connection, $query)) {
        // Perform automatic login
        $query2 = "SELECT * FROM `users` WHERE `email` = '$email'";
        $result2 = mysqli_query($connection, $query2);
        $row2 = mysqli_fetch_assoc($result2);

        $_SESSION['user_id'] = $row2['user_id'];
        $_SESSION['name'] = $row2['name'];
        $_SESSION['email'] = $row2['email'];
        $_SESSION['phone'] = $row2['phone'];

        header('Location: index.php');
        exit;
    }
} elseif (mysqli_num_rows($result1) == 1) {
    header('Location: register.php?msg=2');
    exit;
} else {
    echo "Some error occurred!";
    exit;
}

// Redirect