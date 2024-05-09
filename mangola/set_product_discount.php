<?php
session_start();
if (!(isset($_SESSION['name']) && isset($_SESSION['email']))) {
	header('Location: register.php');
}
include "includes/dbconnect.php";
$product_id = $_POST['product_id'];
$product_discount = $_POST['product_discount'];

$query = "UPDATE `products` SET `product_discount` = '$product_discount' WHERE `product_id` = '$product_id'";

// 执行更新操作
$result = mysqli_query($connection, $query);

// 检查是否至少更新了一行
if (mysqli_affected_rows($connection) > 0) {
	header('Location: admin.php?msg=111');
} else {
	header('Location: admin.php?msg=222');
}
