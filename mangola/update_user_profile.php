<?php

session_start();


include "includes/dbconnect.php";
// 获取表单数据
$userId = $_POST['userId'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$query = '';

// 处理数据...
if ($_FILES['image']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['image']['tmp_name'])) {
    // 文件已成功上传
    $filename = $_FILES['image']['name'];
    $temp_name = $_FILES['image']['tmp_name'];
    $file_type = explode('/', $_FILES['image']['type'])[1];
    $finalFilepath = "images/user_profiles/" . $userId . "." . $file_type;
    if (move_uploaded_file($temp_name, $finalFilepath)) {
        // move user profile image successfully
        $query = "UPDATE `users` SET `name` = '$name', `email` = '$email', `phone` = '$phone', `address` = '$address', `user_profile_image` = '$finalFilepath' WHERE `user_id` = '$userId'";
    } else {
        // 图片保存失败
        header('Location: profile.php?msg=2');
    }
} else {

    $query = "UPDATE `users` SET `name` = '$name', `email` = '$email', `phone` = '$phone', `address` = '$address' WHERE `user_id` = '$userId'";
}

if (mysqli_query($connection, $query)) {
    header('Location: profile.php?msg=1');
} else {
    header('Location: profile.php?msg=2');
}
