// 获取发送按钮的引用
const sendButton = document.querySelector('.btn-success');

// 设置发送验证码的函数
function sendEmailValidationCode() {
    // 在发送验证码之前，禁用发送按钮
    sendButton.disabled = true;

    // 模拟发送验证码的异步操作，比如发送请求到服务器
    setTimeout(function() {
        // 重新启用发送按钮
        sendButton.disabled = false;
    }, 60000); // 5000毫秒（即5秒）后重新启用发送按钮
}