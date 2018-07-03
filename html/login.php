<?php 
session_start();
include_once("config/M.class.php");
$login="login";
if($_SESSION['logname']){
echo "<script>window.parent.location.href='index.php'</script>";	
}

?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>后台管理-后台管理</title>
    <link rel="stylesheet" href="css/pintuer.css">
     <link rel="stylesheet" href="css/admin.css">
	<script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>
    <script src="js/respond.js"></script>
    <script src="js/admin.js"></script>
    <link type="image/x-icon" href="favicon.ico" rel="shortcut icon" />
    <link href="favicon.ico" rel="bookmark icon" />

</head>
<body>
<div class="container">
    <div class="line">
        <div class="xs6 xm4 xs3-move xm4-move">
            <br /><br />
            <div class="media media-y">
                <a href="" target="_blank"><img src="images/logo.png" class="radius" alt="后台管理系统" /></a>
            </div>
            <br /><br />
            <form  method="post">
            <div class="panel">
                <div class="panel-head"><strong>登录后台管理系统</strong></div>
                <div class="panel-body" style="padding:30px;">
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="text" class="input" name="admin" placeholder="登录账号" data-validate="required:请填写账号,length#>=5:账号长度不符合要求" />
                            <span class="icon icon-user"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="password" class="input" name="password" placeholder="登录密码" data-validate="required:请填写密码,length#>=6:密码长度不符合要求" />
                            <span class="icon icon-key"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="field">
                            <input type="text" class="input" name="code" placeholder="填写右侧的验证码" data-validate="required:请填写右侧的验证码" />
                            <img src="config/code.php" width="80" height="32" onclick="javascript:this.src='config/code.php?tm='+Math.random();" class="passcode" />
                        </div>
                    </div>
                </div>
                <div class="panel-foot text-center"><input type="submit" name="submit" value="立即登录后台" class="button button-block bg-main text-big"></div>
            </div>
            </form>
        </div>
    </div>
</div>
<?php
if(!empty($_POST['submit'])){
	$code = trim($_POST['code']);
	$user_name = $_POST['admin'];
	$pwd = md5($_POST['password']);
	
	$code = trim($_POST['code']);
	if($code<>$_SESSION["verify"]){
				echo "<script>alert('验证码错误！');location.href='login.php'</script>";
    }else{
	$user=new M('user');
	$name=$user->find("username='$user_name'");
	if($name and $pwd=$name['password']){
				$_SESSION['logname']=$name['username'];
				$_SESSION['logtime']=$name['logintime'];
				$_SESSION['logcount']=$name['count'];
				$_SESSION['groups']=$name['groups'];
				$_SESSION['lock']=$name['locks'];
				$_SESSION['logid']=$name['id'];
				$TIME=TIME();
				$user->update(
								"id='$name[id]'",
								"
								count =$name[count]+1,
								logintime =$TIME,
								loginip ='$_SERVER[REMOTE_ADDR]'
								"
								);
			header("Location:index.php"); 
				//确保重定向后，后续代码不会被执行 
			exit;						
	}else{
		echo "<script>alert('用户不存在！');location.href='login.php'</script>";
	}
	
	
	}		
}

?>


</body>
</html>