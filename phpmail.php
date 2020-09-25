<?php
	header('Content-type:text/html;charset=utf-8');
	//phpmailer准备
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php'; 
    require 'PHPMailer/src/PHPMailer.php'; 
    require 'PHPMailer/src/SMTP.php'; 
	require 'lib/function.php';
	session_start();
//如果输入了邮箱和验证码
if($_POST['email']!=null&&$_POST['checkCode']!=null){
	$userCheckCode=strtolower($_POST['checkCode']);
	$systemCheckCode=strtolower($_SESSION['checkCode']);
	$email=$_POST['email'];		
	
	if($userCheckCode==$systemCheckCode){
		require 'resetPassword_html.php';
	}else{
		echo "<script>alert('验证码不正确');</script>";
		require 'forgetPassword_html.php';
	}	
}
else if($_POST['email']!=null){
	$email=$_POST['email'];

	//phpmailer代码！！！
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //服务器配置
        $mail->CharSet ="UTF-8";                     //设定邮件编码
        $mail->SMTPDebug = 0;                        // 调试模式输出
        $mail->isSMTP();                             // 使用SMTP
        $mail->Host = 'smtp.qq.com';                // SMTP服务器
        $mail->SMTPAuth = true;                      // 允许 SMTP 认证
        $mail->Username = '742891270@qq.com';                // SMTP 用户名  即邮箱的用户名
        $mail->Password = 'xxxxxxxxxxxxxxxxxxxxxxx';             // SMTP 密码  部分邮箱是授权码(例如163邮箱)
        $mail->SMTPSecure = 'ssl';                    // 允许 TLS 或者ssl协议
        $mail->Port = 465;                            // 服务器端口 25 或者465 具体要看邮箱服务器支持

        $mail->setFrom('742891270@qq.com', '地猫购物网');  //发件人
        $mail->addAddress($email, '客户');  // 收件人
        //$mail->addAddress('ellen@example.com');  // 可添加多个收件人
        $mail->addReplyTo('742891270@qq.com', '地猫购物网'); //回复的时候回复给哪个邮箱 建议和发件人一致
        //$mail->addCC('cc@example.com');                    //抄送
        //$mail->addBCC('bcc@example.com');                    //密送

        //发送附件
       // $mail->addAttachment($com[1]);         // 添加附件
//      $mail->addAttachment($com[1]);         // 添加附件
        
        // $mail->addAttachment('../thumb-1.jpg', 'new.jpg');    // 发送附件并且重命名
		$checkCode=createCode(6); //验证码
		
		$_SESSION['checkCode']=$checkCode;
		
        //Content
        $mail->isHTML(true);                                  // 是否以HTML文档格式发送  发送后客户端可直接显示对应HTML内容
        $mail->Subject = '地猫购物网验证码';
        $mail->Body    = '以下是你的验证码：'.$checkCode;
        $mail->AltBody = '如果邮件客户端不支持HTML则显示此内容';

        $mail->send();
        echo "<script>alert('已经发送邮箱给：$email');</script>";
    } catch (Exception $e) {
        echo 'fail: ', $mail->ErrorInfo."<br>";
    }
	require 'forgetPassword_html.php';
}
//什么都没填
else{
	require 'forgetPassword_html.php';
}

?>
