<?php
header('Content-Type:text/html;charset=utf-8');
require 'init.php';


$error = array();    // 保存错误信息

//当资料都填齐的话
if(isset($_POST['pname'])&&isset($_POST['ptotal'])&&isset($_POST['pword'])&&isset($_FILES['pic'])){
	$pname=$_POST['pname'];
	$ptotal=$_POST['ptotal'];
	$pword=$_POST['pword'];
	$p=$_FILES['pic'];
	$pimg=$p['name'];
	$rst=FALSE;
	
	//获取上传文件的类型
	$type=substr(strrchr($pimg, '.'), 1);
	//判断上传文件类型
	//当为jpg或者是png的时候
	if($type=='jpg'||$type=='png'){
		//移动数据			
		move_uploaded_file($p['tmp_name'],iconv("UTF-8","gb2312",'images/product/'.$pimg));
		$sql="insert into product(Pname,Ptotal,Pword,PIMG) values('$pname',$ptotal,'$pword','$pimg');";
		$rst=mysqli_query(db_init(), $sql);	
	}
	else{
		echo "上传的图片不为png或者jpg格式，请重新输入，3秒后返回";
		header("refresh:3;url=admin_add.html");
	}
	
	
	if($rst){
		echo "添加成功！！3秒后返回管理员首页";
		header("refresh:3;url=admin.php");
	}
				
}
else{
	echo "资料没填满或者未知错误,3秒后返回添加界面";
	header("refresh:3;url=admin_add.html");
}


?>