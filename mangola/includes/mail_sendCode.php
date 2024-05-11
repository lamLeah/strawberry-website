
<?php
session_start();
//引入配置文件
$config = include './mail_config.php';
// 引入邮箱类
include './mail.php';
// 生成一个六位数的随机验证码
$validationCode = mt_rand(100000, 999999);
$to = $_GET['to'];

//初始化邮件发送信息及收件人
$mailReceiver = $to;
$mailSubject = 'Strawberry Heaven Registration';
$mailContent = 'Welcome to our Strawberry Heaven, here is your email validation code: <p>' . $validationCode . '</p>';

// $content = "欢迎注册，请点击以下完成验证：<p>$code'>请点击</a></p>";

$result = send_email($to = $mailReceiver, $subject = $mailSubject, $content = $mailContent);
if ($result == "success") {
  $resultObj = array(
    'result' => '1',
    'code' => $validationCode
  );
  // Encode the object as JSON
  $json = json_encode($resultObj);
  // Return the JSON data
  $_SESSION['validationCode'] = $validationCode;
  echo $json;
} else {
  $resultObj = array(
    'result' => '0',
    'msg' => "Could not send to the email, please try again."
  );
  // Encode the object as JSON
  $json = json_encode($resultObj);
  // Return the JSON data
  echo $json;
}
?>