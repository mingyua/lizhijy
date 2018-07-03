<?php include_once("config/M.class.php");?>
<?php include_once("header.php");?>
<?php
$config = new M("config");
$data=$config->find();
 ?>
 <?php
$pay=NEW M("pay");
$bl=$pay->find("id=1");
?>

 <div class="admin">
 <div class="tab">
  <div class="tab-head">
    <ul class="tab-nav">
      <li class="active"><a href="#tab-start">基本设置</a></li>
      <li><a href="#tab-css">系统变量设置</a></li>
      <li><a href="#tab-units">邮件设置</a></li>
  </ul>
  </div>
  <div class="tab-body">
    <div class="tab-panel active" id="tab-start">
	<fieldset id="sl-systemsetting">
    <legend>基本设置</legend>
   <form method="post" class="form-x"  enctype="multipart/form-data">
				<div class="form-group">
                	<div class="label"><label>网站维护状态</label></div>
                	<div class="field">
                        <div class="button-group button-group-small radio">
                            <label class="button active"><input name="pintuer" value="yes" checked="checked" type="radio"><span class="icon icon-check"></span> 开启</label>
                            <label class="button"><input name="pintuer" value="no" type="radio"><span class="icon icon-times"></span> 关闭</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="readme">维护说明</label></div>
                    <div class="field">
                    	<textarea class="input" rows="5" cols="50" placeholder="请填写维护说明"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="sitename">网站名称</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="sitename" name="sitename" size="50" placeholder="网站名称" data-validate="required:请填写你网站的名称" value="<?php echo $data['site_name'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="siteurl">网址</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="siteurl" name="siteurl" size="50" value="<?php echo $data['site_url'];?>" placeholder="请填写网址" data-validate="required:请填写网址" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="logo">标志</label></div>
                    <div class="field">
                    	<a class="button input-file" href="javascript:void(0);">+ 浏览文件<input size="100" type="file" name="logo" value="<?php echo $data['logo'];?>"  /></a>
						<a class="tips" data-toggle="hover" data-style="img" data-place="top" data-image="<?php echo $data['logo'];?>">LOGO</a>
						
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="title">优化标题</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="title" name="title" size="50" value="<?php echo $data['site_title'];?>" placeholder="title标题内容，用于搜索引擎优化" data-validate="required:请填写优化标题，建议在80字以内。" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="keywords">关键词</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="keywords" name="keywords" size="50" value="<?php echo $data['seo_keywords'];?>" placeholder="站点关键词，用于搜索引擎优化" data-validate="required:请填写站点关键词，建议在100字以内。" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="desc">描述</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="desc" name="desc" size="50" value="<?php echo $data['seo_description'];?>" placeholder="网站的描述，用于搜索引擎优化" data-validate="required:请填写网站的描述，建议在200字以内。" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="email">站点邮箱</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="email" name="email" size="50" value="<?php echo $data['site_email'];?>" placeholder="网站的描述，用于搜索引擎优化" data-validate="required:请填写网站的描述，建议在200字以内。" />
                    </div>
                </div>
                 <div class="form-group">
                    <div class="label"><label for="peo">联系人</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="peo" name="peo" size="50" value="<?php echo $data['site_peo'];?>" placeholder="网站的描述，用于搜索引擎优化" data-validate="required:请填写网站的描述，建议在200字以内。" />
                    </div>
                </div>
               <div class="form-group">
                    <div class="label"><label for="phone">联系电话</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="phone" name="phone" size="50" value="<?php echo $data['site_phone'];?>" placeholder="网站的描述，用于搜索引擎优化" data-validate="required:请填写网站的描述，建议在200字以内。" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="sitetel">座机</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="sitetel" name="sitetel" size="50" value="<?php echo $data['site_tel'];?>" placeholder="网站的描述，用于搜索引擎优化" data-validate="required:请填写网站的描述，建议在200字以内。" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="sitefax">传真</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="sitefax" name="sitefax" value="<?php echo $data['site_fax'];?>" size="50" placeholder="网站的描述，用于搜索引擎优化"  />
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="siteaddr">联系地址</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="siteaddr" name="siteaddr" size="50" value="<?php echo $data['site_addr'];?>" placeholder="网站的描述，用于搜索引擎优化" data-validate="required:请填写网站的描述，建议在200字以内。" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="siteicp">备案号码</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="siteicp" name="siteicp" size="50" value="<?php echo $data['site_icp'];?>" placeholder="网站的描述，用于搜索引擎优化" data-validate="required:请填写网站的描述，建议在200字以内。" />
                    </div>
                </div>
                 <div class="form-group">
                    <div class="label"><label for="sitefoot">底部版权</label></div>
                    <div class="field">
					<textarea id="neirong" class="input" rows="5" cols="50" name="sitefoot"><?php echo $data['site_foot'];?></textarea>
                    </div>
                </div>
               <div class="form-button"><input class="button bg-main" name="submit" type="submit" value="提交"></div>
            </form>
<?php
 if(!empty($_POST['submit'])){
			 include_once("config/UploadFile.class.php");
			$upload = new UploadFile();// 实例化上传类
			$upload->maxSize  = 1048576 ;// 设置附件上传大小
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->saveRule=time();//上传文件的文件名保存规则
			$upload->savePath =  '../Uploads/';// 设置附件上传目录
			if(!$upload->upload()) {// 上传错误提示错误信息
				$logo=$data['logo'];
				 }else{// 上传成功 获取上传文件信息
				$info =  $upload->getUploadFileInfo();
				 }
			if($info[0]['savename']){
			$logo=$info[0]['savepath'].$info[0]['savename'];
				}else{
			$logo=$data['logo'];
				}

		$datac= $config->update(
								"id=1",
								"site_title ='$_POST[title]',
								site_url ='$_POST[siteurl]',
								logo ='$logo',
								site_email ='$_POST[email]',
								site_name ='$_POST[sitename]',
								seo_keywords ='$_POST[keywords]',
								seo_description ='$_POST[desc]',
								site_peo ='$_POST[peo]',
								site_phone ='$_POST[phone]',
								site_tel ='$_POST[sitetel]',
								site_fax ='$_POST[sitefax]',
								site_icp ='$_POST[siteicp]',
								site_addr ='$_POST[siteaddr]',
								site_foot ='$_POST[sitefoot]'"
								);
		if($datac){
				echo "<script>alert('修改成功！');location.href='systemsetting.php'</script>";
		}else{
				echo "<script>alert('修改失败！');location.href='systemsetting.php'</script>";
			
		}
	
		
 }

?>			
</fieldset>
	</div>
	
	
    <div class="tab-panel" id="tab-css">
		<fieldset id="sl-systemsetting">
		<legend>系统变量设置</legend>
		   <form method="post" class="form-x"  enctype="multipart/form-data">
						<div class="form-group">
							<div class="label"><label>支付宝接口ID</label></div>
							<div class="field">
                    	<input type="text" class="input" id="APIid" name="APIid" size="50" value="<?php echo $bl['pay_id'];?>" placeholder="合作身份者ID" data-validate="required:合作身份者id，以2088开头的16位纯数字" />
							</div>
						</div>
						<div class="form-group">
							<div class="label"><label>支付宝接口KEY</label></div>
							<div class="field">
                    	<input type="password" class="input" id="APIkey" name="APIkey" size="50" value="<?php echo $bl['pay_key'];?>" placeholder="安全检验码" data-validate="required:安全检验码，以数字和字母组成的32位字符" />
							</div>
						</div>
						<div class="form-group">
							<div class="label"><label>其它账号</label></div>
							<div class="field">
                    	<input type="text" class="input" id="number" name="number" size="50" value="<?php echo $bl['pay_number'];?>" placeholder="网银账号" data-validate="required:网银账号必须是数字" />
							</div>
						</div>
						<div class="form-group">
							<div class="label"><label>兑换比例</label></div>
							<div class="field">
                    	<input type="text" class="input" id="exchange" name="exchange" size="50" value="<?php echo $bl['exchange'];?>" placeholder="必须输入纯数字" data-validate="required:请正确填写比例" /><div class="passcode">%</div>
							</div>
						</div>
						
						
						
               <div class="form-button"><input class="button bg-main" name="sub" type="submit" value="提交"></div>
            </form>
<?php
 if(!empty($_POST['sub'])){
	 $time=time();

		$paydata= $pay->update(
								"id=1",
								"
								pay_id ='$_POST[APIid]',
								pay_key ='$_POST[APIkey]',
								pay_number ='$_POST[number]',
								exchange ='$_POST[exchange]',
								time ='$time'
								"
								);
		if($paydata){
				echo "<script>alert('修改成功！');</script>";
		}else{
				echo "<script>alert('修改失败！');</script>";
			
		}
	
		
 }

?>			
					
		

		</fieldset>

	</div>
	
	
    <div class="tab-panel" id="tab-units">
		<fieldset id="sl-systemsetting">
		<legend>邮件设置</legend>
		
		

		</fieldset>

	
	</div>
  </div>
</div>

</div>
