<?php
session_start();
if (!(isset($_SESSION['name']) && isset($_SESSION['email']))) {
	header('Location: register.php');
}
include "includes/dbconnect.php";


$product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];
$product_description = $_POST['product_description'];
$product_discount = $_POST['product_discount'];

$filename = $_FILES['image']['name'];
$temp_name = $_FILES['image']['tmp_name'];
if (move_uploaded_file($temp_name, "images/" . $filename)) {
	$query = "INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_description`, `product_discount`, `product_image`) VALUES (NULL, '$product_name', '$product_price', '$product_description', '$product_discount', '$filename')";
	if (mysqli_query($connection, $query)) {
		header('Location: admin.php?msg=1');
	}
} else {
	header('Location: admin.php?msg=2');
}
