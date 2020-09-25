<!DOCTYPE HTML>
<html>
<head>
<title>注册</title>
<link href="css/register.css" rel="stylesheet" type="text/css" media="all"/>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />

<script>
	//检查两次输入密码是否一致
	function checkForm(){
		var pw1 = document.getElementById("password").value;
		var pw2 = document.getElementById("repassword").value;
		if(pw1 !== pw2){
			alert('两次输入密码不一致！');
			return false;
		}
		return true;
	}
</script>
</head>
<body>

<div class="login">
	
	<h2>上地猫  ，就够了</h2>
	<div class="login-top">
		<h1>重设密码</h1>
		<form method="post" action="resetPassword.php"  onsubmit="return checkForm()">			
			
			<div id="wordAndText">
				邮件：
				<input type="text" name="email" id="email" value="<?php echo $email?>" />	
			</div>
			
			<div id="wordAndText">
				密码:
				<input type="password" name="password" id="password" value="" />	
			</div>
			
			<div id="wordAndText">
				确定密码
				<input type="password" name="repassword" id="repassword" value="" />	
			</div>

	    <div class="forgot">
	    	<input type="submit" value="确定修改" >
	    </div>
	    </form>
	</div>
	
	<div class="login-bottom">
		<h5><a href="forgetPassword_html.php">忘记密码</a></h5>
		<h3>旧用户 &nbsp;<a href="login_html.php">登陆</a>&nbsp </h3>
	</div>
</div>	


</body>
</html>