<?php include_once("header.php");?>
<?php include_once("config/M.class.php");?>
<?php
$id=isset($_GET['id'])?$_GET['id']:"";
$user = new M("user");
$v=$user->find("id=$id");
 ?>
 <div class="admin">
<fieldset id="sl-systemsetting">
    <legend>添加用户</legend>
   <form method="post" class="form-x"  enctype="multipart/form-data">
<div class="line_big">
	<div id="box" class="x6" style="height:180px;overflow:hidden">
                <div class="form-group">
                    <div class="label"><label for="username">用户名称</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="username" name="username" size="50" placeholder="用户名称" data-validate="required:请填写你的用户名称" value="<?php echo $v['username'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="password">密码</label></div>
                    <div class="field">
					<?php if($id<>null){?>
                    	<span><input type="password" class="input float-left width1" id="password" name="password" size="50" value="<?php echo $v['password'];?>" placeholder="请输入大于6位数的密码" data-validate="required:请设置您的密码" /></span>
						<span class="margin-left"><input class="float-left" id="yes" type="checkbox" checked="checked" name="tong" value="1">允许修改</span>
					<?php }else{ ?>
                    	<input type="password" class="input" id="password" name="password" size="50" value="<?php echo $v['password'];?>" placeholder="请输入大于6位数的密码" data-validate="required:请设置您的密码" />
					<?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="keywords">所属分组</label></div>
                    <div class="field">
                    	<select class="input" name="groups">
					  <option value="<?php echo $v['groups']?>"><?php if($v['groups']==1){echo "超级管理员";}else if($v['groups']==2){echo "普通管理员";}else if($v['groups']==3){echo "网站编辑";}else if($v['groups']==4){echo "注册会员";}?></option>
						
					 <option value="1">超级管理员</option>
					 <option value="2">普通管理员</option>
					 <option value="3">网站编辑</option>
					 <option value="4">注册会员</option>
					 
					  </select>
                    </div>
                </div>
				<div class="margin-big-top"><hr><br></div>
                 <div class="form-group">
                    <div class="label"><label for="realname">真实姓名</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="realname" name="realname" size="50" value="<?php echo $v['realname'];?>" placeholder="你的真实姓名"  />
                    </div>
                </div>
               <div class="form-group">
                    <div class="label"><label for="tel">联系电话</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="tel" name="tel" size="50" value="<?php echo $v['tel'];?>" placeholder="联系人手机号码" />
                    </div>
                </div>
              <div class="form-group">
                    <div class="label"><label for="qq">QQ</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="qq" name="qq" size="50" value="<?php echo $v['qq'];?>" placeholder="您的QQ号码"  />
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="email">邮箱</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="email" name="email" size="50" value="<?php echo $v['email'];?>" placeholder="联系邮箱"  />
                    </div>
                </div>
      	</div>	
	<div class="x6">
				<div class="form-group">
                    <div class="label"><label for="images">头像</label></div>
                    <div class="field">
<div id="radio_wrap">
	<ul>
		<li class="c <?php if($v['images']==1){echo "checked";}?>">
			<input type="radio" id="radio_a_01" name="images" value="1" <?php if($v['images']==1){echo "checked='checked'";}?> />
			<label for="radio_a_01"  ><img src="images/tou1.jpg" alt="" /></label>
			<i></i>
		</li>
		<li class="c <?php if($v['images']==2){echo "checked";}?>">
			<input type="radio" id="radio_a_02" name="images" value="2" <?php if($v['images']==2){echo "checked='checked'";}?> />
			<label for="radio_a_02" ><img src="images/tou2.jpg" alt="" /></label>
			<i></i>
		</li>
		<li class="c <?php if($v['images']==3){echo "checked";}?>">
			<input type="radio" id="radio_a_03" name="images" value="3" <?php if($v['images']==3){echo "checked='checked'";}?> />
			<label  for="radio_a_03"><img src="images/tou3.jpg" alt="" /></label>
			<i></i>
		</li>
		<li class="c <?php if($v['images']==4){echo "checked";}?>">
			<input type="radio" id="radio_a_04" name="images" value="4" <?php if($v['images']==4){echo "checked='checked'";}?> />
			<label for="radio_a_04"><img src="images/tou4.jpg" alt="" /></label>
			<i></i>
		</li>
	</ul>
</div>
						
                    </div>
                </div>
	</div>	
</div>
<div class="clear"></div>				
               <div class="form-button">
			   <input class="button bg-main" name="submit" type="submit" value="提交">
			   <input class="button btn1" type="button" value="展开">
			   <input class="button btn2" type="button" value="收取">

			   </div>
            </form>
<?php
 if(!empty($_POST['submit'])){
		$groups=$_POST['groups'];
		if($groups==4){
		$url="admin_reg.php";
		}else{
		$url="admin_user.php";
		}
		if($id<>null){
		$TIME=time();
		 	$tong=$_POST['tong'];
			if($tong==1){
			$password =md5($_POST['password']);
			}else{
			$password =$_POST['password'];
			}

		$data= $user->update(
								"id=$id",
								"
								groups ='$_POST[groups]',
								username ='$_POST[username]',
								password ='$password',
								realname='$_POST[realname]',
								sex='$_POST[sex]',
								educational='$_POST[educational]',
								address='$_POST[address]',
								count='$_POST[count]',
								qq='$_POST[qq]',
								tel='$_POST[tel]',
								email='$_POST[email]',
								images='$_POST[images]',
								tip='$_POST[tip]',
								url='$_POST[url]',
								logintime='$TIME',
								loginip='$_SERVER[REMOTE_ADDR]'
								"
							);
		if($data){
				echo "<script>alert('修改成功！');location.href='$url'</script>";
		}else{
				echo "<script>alert('修改失败！');location.href='$url'</script>";
			
		}
	
		
 }else{
	$data=$user->insert(array(
									"id=>null",
									"groups"=>"$_POST[groups]",
									"username" =>"$_POST[username]",
									"password" =>md5("$_POST[password]"),
									"realname"=>"$_POST[realname]",
									"sex"=>"$_POST[sex]",
									"educational"=>"$_POST[educational]",
									"address"=>"$_POST[address]",
									"count"=>"$_POST[count]",
									"qq"=>"$_POST[qq]",
									"tel"=>"$_POST[tel]",
									"email"=>"$_POST[email]",
									"images"=>"$_POST[images]",
									"tip"=>"$_POST[tip]",
									"url"=>"$_POST[url]",
									"logintime"=>TIME(),
									"loginip"=>"$_SERVER[REMOTE_ADDR]"
										));
										
		if($data){
				echo "<script>alert('添加成功！');location.href='$url'</script>";
		}else{
				echo "<script>alert('添加失败！');location.href='$url'</script>";
			
		} 
}
										
}
?>			
</fieldset>
</div>

<script type="text/javascript">

(function() {
    var radioWrap = document.getElementById("radio_wrap"),
        li = radioWrap.getElementsByTagName("li");
    for(var i = 0; i < li.length; i++){
        li[i].onclick = function() {
            for(var i = 0; i < li.length; i++){
                li[i].className = "";
            }
            this.className = "checked";
        }
    }
})();
</script>
