<!DOCTYPE HTML>
<html>
<head>
<title>登陆</title>
<!-- Custom Theme files -->
<link href="css/LoginStyle.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<!--<meta name="keywords" content="Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />-->
<!--Google Fonts-->
<!--<link href='http://fonts.useso.com/css?family=Roboto:500,900italic,900,400italic,100,700italic,300,700,500italic,100italic,300italic,400' rel='stylesheet' type='text/css'>
<link href='http://fonts.useso.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>-->
<!--Google Fonts-->

</head>
<body>
<?php if(!empty($error)): ?>
	<div class="error-box">登陆失败，错误信息如下：
		<ul><?php foreach($error as $v) echo "<li>$v</li>"; ?></ul>
	</div>
<?php endIf; ?>
<div class="login">
	
	<h2>上地猫  ，就够了</h2>
	<div class="login-top">
		<h1>登陆</h1>
		<form action="login.php" method="post">

			<div class="wordAndText">
				用户名：
				<input type="text" name="uno" id="username" value="" />	
			</div>
			<div class="wordAndText">
				密码:
				<input type="password" name="password" id="password" value="" />	
			</div>
			<div id="yanzhengma">
				验证码: &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp
				<img src="CreateCheckCode.php"/  id="code_img">
				<a href="#" id="change">看不清，换一张</a>
				<input type="text" name="checkcode" id="checkcode" value="" />	
			</div>
			
	    
	    <div class="forgot">
	    	<input type="submit" value="登陆" >
	    </div>
	    </form>
	</div>
	<div class="login-bottom">
		<h5><a href="forgetPassword_html.php">忘记密码</a></h5>
		<h3>新用户 &nbsp;<a href="register.php">注册</a>&nbsp </h3>
		<br />
		<h5><a href="admin_login.php">管理员登陆</a></h5>
	</div>
</div>	

<script>
	var change = document.getElementById("change");
	var img = document.getElementById("code_img");
	change.onclick = function(){
		img.src = "CreateCheckCode.php?t="+Math.random(); //增加一个随机参数，防止图片缓存
		return false; //阻止超链接的跳转动作
	}
</script>
</body>
</html>