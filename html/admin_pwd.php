<?php include_once("config/M.class.php");?>
<?php include_once("header.php");?>
<?php
$id=$_SESSION['logid'];
$user = new M("user");
$v=$user->find("id=$id");
 ?>
 <div class="admin">
<fieldset id="sl-systemsetting">
    <legend>密码修改</legend>
   <form method="post" class="form-x"  enctype="multipart/form-data">
                <div class="form-group">
                    <div class="label"><label for="username">用户名</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="username" name="username" size="50" placeholder="用户名" data-validate="required:请填写您的用户名" value="<?php echo $v['username'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="password">密码</label></div>
                    <div class="field">
                    	<input type="password" class="input" id="password" name="password" size="50" value="" placeholder="请输入您的原密码" data-validate="required:请输入原密码" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="newpassword">新密码</label></div>
                    <div class="field">
                    	<input type="password" class="input" id="newpassword" name="newpassword" size="50" value="" placeholder="请输入您的新密码" data-validate="required:请输入您的新密码" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="repassword">确认新密码</label></div>
                    <div class="field">
                    	<input type="password" class="input" id="repassword" name="repassword" size="50" value="" placeholder="请输入您的原密码" data-validate="required:请输入原密码,repeat#newpassword:两次输入的密码不一致" />
                    </div>
                </div>
               <div class="form-button"><input class="button bg-main" name="submit" type="submit" value="提交"></div>
            </form>
<?php
 if(!empty($_POST['submit'])){
	 $password=md5($_POST['password']);
	 $newpassword=md5($_POST['newpassword']);
	if($password==$v['password']){
		$datac= $user->update(
								"id='$id'",
								"username ='$_POST[username]',
								password ='$newpassword'
								"
								);
		if($datac){
				echo "<script>alert('修改成功！');location.href='admin_pwd.php'</script>";
		}else{
				echo "<script>alert('修改失败！');location.href='admin_pwd.php'</script>";
			
		}
	}
		
 }

?>			
</fieldset>
</div>

