<?php
// 设定字符集
header('Content-Type:text/html;charset=utf-8');
require 'init.php';

$error = array();    // 保存错误信息

// 封装函数：载入HTML模板文件
function showRegPage() {
    $error = $GLOBALS['error']; // 从全局变量读取错误信息
    
    define('APP', 'itcast');
    require 'register_html.php';

    exit;  // 终止程序继续执行
}

// 没有表单提交时，显示注册页面
if (empty($_POST)) {
    showRegPage();
}

// 执行到此处说明有表单提交

// 判断表单中各字段是否都已填写
$check_fields = array('uno', 'password', 'email');
foreach ($check_fields as $v) {
    if (empty($_POST[$v])) {
        $error[] = '错误：' . $v . '字段不能为空！';
    }
}
if (!empty($error)) {
    showRegPage();  // 显示错误信息并停止程序
}


// 接收需要处理的表单字段
$uno = trim($_POST['uno']);
$password = $_POST['password'];
$email = trim($_POST['email']);

// 载入表单验证函数库，验证用户名和密码格式
require 'lib/check_form.lib.php';
if (($result = checkUsername($uno)) !== true) {
    $error[] = $result;
}
if (($result = checkPassword($password)) !== true) {
    $error[] = $result;
}
if (($result = checkEmail($email)) !== true) {
    $error[] = $result;
}
if (!empty($error)) {
    showRegPage();  // 显示错误信息并停止程序
}


// SQL转义
$uno = mysqli_real_escape_string(db_init(), $uno);
$email = mysqli_real_escape_string(db_init(), $email);

// 判断用户名是否存在
$sql = "select `uno` from `users` where `uno`='$uno'";
$rst = mysqli_query(db_init(), $sql);

if (mysqli_fetch_row($rst)) {
    $error[] = '用户名已经存在，请换个用户名。';
    showRegPage();  // 显示错误信息并停止程序
	
}
// 生成密码盐
$salt = md5(uniqid(microtime()));

// 提升密码安全
$password = md5($salt . md5($password));
echo "<script>alert('用户 $uno 创建成功，请登陆 ');</script>";

// 拼接SQL语句
$sql = "insert into `users` (`uno`,`password`,`salt`,`email`) values ('$uno','$password','$salt','$email')";

// 执行SQL语句
$rst = mysqli_query(db_init(), $sql);

require 'login_html.php';
?>