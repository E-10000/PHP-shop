<?php
header('Content-Type:text/html;charset=utf-8');
require 'init.php';

$error = array();    // 保存错误信息

//打开session
session_start();

//如果点击了删除
if(isset($_GET['hid']) && isset($_GET['hidPid'])){
	

	$shopCarProductArr=$_SESSION['shopCarProduct'];
	unset($shopCarProductArr[(int)$_GET['hid']]);
	$_SESSION['shopCarProduct']=$shopCarProductArr;
	$session_PID=$_SESSION['pid'];
	
	foreach($session_PID as $k=>$v){
		if($v == $_GET['hidPid']){
		unset($session_PID[$k]);
		}
	}
	$_SESSION['pid']=$session_PID;

	require 'shopCar_html.php';
}
//如果有选中商品加入购物车
else if(isset($_SESSION['pid'])){
	$shopCarProductArr=array();
	$shopCarTotal=array();
	$session_PID=$_SESSION['pid'];
	foreach($session_PID as $key =>$v){
		$sql="select * from product where Pid = $v;";
		$rst=db_fetch_row($sql);
		array_push($shopCarProductArr,$rst);

	}
	
	$_SESSION['shopCarProduct']=$shopCarProductArr;
	
	require 'shopCar_html.php';
}
else{
	
	require "shopCar_html.php";
}

?>