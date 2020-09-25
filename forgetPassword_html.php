<!DOCTYPE HTML>
<html>
<head>
<title>登陆</title>
<link href="css/LoginStyle.css" rel="stylesheet" type="text/css" media="all"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 

</head>
<body>

<div class="login">
	
	<h2>上地猫  ，就够了</h2>
	<div class="login-top">
		<h1>忘记密码</h1>
		<form action="phpmail.php" method="post">
			<!--<input type="hidden" name="hidCode" id="hidCode" value="<?php
					if($checkCode!=null)
						echo $checkCode;
					else echo '';	?>" />
						-->
			<div class="wordAndText" >
				邮箱：
				<input type="text" name="email" id="email" value="<?php
					if(isset($email))
						echo $email;
					else echo ''; 	?>" />	
			</div>
    
		    <div class="forgot" >
		    	<input type="submit" value="发送邮件" >
		    </div>
	    
	    	<div class="wordAndText" >
				验证码：
				<input type="text" name="checkCode" id="checkCode" value="" />	
			</div>
	    	
	    	<div class="forgot">
		    	<input type="submit" value="验证" >
		    </div>
		    
	    </form>
	</div>
	<div class="login-bottom">
		<h5><a href="#">忘记密码</a></h5>
		<h3>新用户 &nbsp;<a href="register.php">注册</a>&nbsp </h3>
		<br />
		<h5><a href="admin_login.php">管理员登陆</a></h5>
	</div>
</div>	
</body>
</html>