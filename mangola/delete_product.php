<?php
session_start();
if (!(isset($_SESSION['name']) && isset($_SESSION['email']))) {
	header('Location: register.php');
}
include "includes/dbconnect.php";
$product_id = $_POST['product_id'];

$query = "DELETE FROM `mangola`.`products` WHERE `product_id` LIKE '$product_id'";
$querySelect = "SELECT * FROM `products` WHERE `product_id` LIKE '$product_id'";
$row = mysqli_fetch_assoc(mysqli_query($connection, $querySelect));
if ($row) {
	// delete file
	$filePath = './images/' . $row['product_image']; // 要删除文件的路径
	if (file_exists($filePath)) {
		unlink($filePath);
	}

	// delete from database
	if (mysqli_query($connection, $query)) {
		header('Location: admin.php?msg=11');
	} else {
		header('Location: admin.php?msg=22');
	}
} else {
	header('Location: admin.php?msg=22');
}
