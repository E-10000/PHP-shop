<?php
header('Content-Type:text/html;charset=utf-8');
//require 'init.php';
//也是不给加载init.php，唉

// 连接数据库，设置字符集，选择数据库
$link = mysqli_connect('localhost', 'root', 'root') or exit('数据库连接失败！');
mysqli_set_charset($link, 'utf8');
mysqli_select_db($link, 'shop') or exit('itcast数据库不存在！');


$error = array();    // 保存错误信息

session_start();
if(isset($_SESSION['admininfo'])){
$sql="select * from orders";
$result=mysqli_query($link, $sql);
$rows=array();
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	$rows[]=$row;
}
mysqli_free_result($result);
$order=$rows;
require "admin_order.html";
}
else{
	echo "<script>alert('还没有进行管理员登陆');</script>";
	include "admin_login.php";
}
?>