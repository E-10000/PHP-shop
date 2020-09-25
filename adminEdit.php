<?php
header('Content-Type:text/html;charset=utf-8');
require 'init.php';
//有BUG，编辑直接提交，不选图片，数据库就没用图片了

$error = array();    // 保存错误信息

//管理员首页点击修改
if(isset($_GET['id'])){
	$pid=$_GET['id'];
	$sql="select * from product where Pid = $pid;";
	$product=db_fetch_row($sql);
	require "adminEdit_html.php";
}
//如果有名字，有价格，有简介,有商品id
else if (isset($_POST['pname'])&& isset($_POST['ptotal']) &&isset($_POST['pword'])&&isset($_POST['pid'])) {
	$pname=$_POST['pname'];
	$ptotal=$_POST['ptotal'];
	$pword=$_POST['pword'];
//	$pimg=$_POST['pic'];
//	$pimg=$_FILES['pic']['name'];
	$p=isset($_FILES['pic'])?$_FILES['pic']:null;
	$pimg=$p['name'];
	$pid=$_POST['pid'];
	
	//如果没有选择提交图片
	if($pimg==null){
		$sql="select PIMG from product where Pname ='$pname' and Ptotal=$ptotal;";
		$pimg=db_fetch_column($sql);
	}
	//当提交了图片
	else{
		//获取上传文件的类型
		$type=substr(strrchr($pimg, '.'), 1);
		//判断上传文件类型
		//当为jpg或者是png的时候
		if($type=='jpg'||$type=='png'){
			//移动数据			
			move_uploaded_file($p['tmp_name'],iconv("UTF-8","gb2312",'images/product/'.$pimg));
		}
		//当不是jpg也不是png时
		else{
			echo "<script>alert('图像类型不符合要求，允许类型为:jpg,png');</script>";
			//当不符合类型，将$pimg变为原本的
			$sql="select PIMG from product where Pname ='$pname' and Ptotal=$ptotal;";
			$pimg=db_fetch_column($sql);
		}
	}	
	
//	
//	
	$sql="update product set Pname='$pname',Ptotal=$ptotal,Pword='$pword',PIMG='$pimg' where Pid=$pid;";
	$rst=mysqli_query(db_init(), $sql);	
	echo "<script>alert('修改成功');</script>";
	include 'admin.php';
}
//点击了删除
else if(isset($_GET['delete'])){
	$delete=$_GET['delete'];
	$sql="delete from product where Pid=$delete;";
	mysqli_query(db_init(), $sql);
	echo "<script>alert('删除成功');</script>";
	include 'admin.php';
}
?>