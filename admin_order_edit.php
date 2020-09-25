<?php
header('Content-Type:text/html;charset=utf-8');
require 'init.php';
$error = array();    // 保存错误信息

//管理员订单页面点击修改
if(isset($_GET['id'])){
	$oid=$_GET['id'];
	$sql="select * from orders where Oid = $oid;";
	$orders=db_fetch_row($sql);
	require "admin_order_edit.html";
}
//如果所有信息都齐全
else if(isset($_POST['oid'])&& isset($_POST['uid'])&& isset($_POST['pid']) &&isset($_POST['number']) &&isset($_POST['Ototal_Amount']) &&isset($_POST['otime'])){
	$oid=$_POST['oid'];
	$uid=$_POST['uid'];
	$pid=$_POST['pid'];
	$number=$_POST['number'];
	$Ototal_Amount=$_POST['Ototal_Amount'];
	$otime=trim($_POST['otime']);
	$sql="update orders set Uid=$uid,Pid=$pid,number=$number,Ototal_Amount=$Ototal_Amount,Otime='$otime' where Oid=$oid;";
	$rst=mysqli_query(db_init(), $sql);
	if($rst){
		echo "<script>alert('修改成功');</script>";
	}
	
	require "admin_order.php";	
}
else if(isset($_GET['delete'])){
	$delete=$_GET['delete'];
	$sql="delete from orders where Oid=$delete;";
	mysqli_query(db_init(), $sql);
	echo "<script>alert('删除成功');</script>";
	require "admin_order.php";	
}
?>