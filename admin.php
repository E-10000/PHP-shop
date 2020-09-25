<?php
header('Content-Type:text/html;charset=utf-8');
//require 'init.php';
//这个不给加载init.php，迷之bug

// 连接数据库，设置字符集，选择数据库
$link = mysqli_connect('localhost', 'root', 'root') or exit('数据库连接失败！');
mysqli_set_charset($link, 'utf8');
mysqli_select_db($link, 'shop') or exit('shop数据库不存在！');
$error = array();    // 保存错误信息

session_start();

//点击查询
if(isset($_POST['title'])){
	$title=trim($_POST['title']);
	$sql="select * from product where Pname like '%$title%'";	
	$product=db_fetch_all2($link,$sql);
	require "admin_html.php";
}
//当登陆的了时候
else if(isset($_SESSION['admininfo'])){
	$sql="select * from product";
	$product=db_fetch_all2($link,$sql);
	require "admin_html.php";
}
//其他情况
else{
	echo "<script>alert('还没有进行管理员登陆');</script>";
	include "admin_login.php";
}

//获取多行数据
function db_fetch_all2($link,$sql) {
    $result=mysqli_query($link, $sql);
	$rows=array();
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		$rows[]=$row;
	}
	mysqli_free_result($result);
	return $rows;
}

?>