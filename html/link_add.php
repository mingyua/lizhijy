<?php include_once("config/M.class.php");?>
<?php include_once("header.php");?>
<?php
$id=isset($_GET['id'])?$_GET['id']:"";
$link = new M(link);
$v=$link->find("id=$id");

$kinds =$v['kinds'];
$cate=new M('cate');
$cid=$cate->find("id=$kinds");
$time=time();
 ?>
 <div class="admin">
	 <fieldset id="sl-systemsetting">
		<legend>友情管理</legend>
	      <form method="post" class="form-x"  enctype="multipart/form-data">
			<div class="line">
				<div class="x1"></div>	
				<div class="x6">
					<div class="form-group">
						<div class="label"><label>分类选择</label></div>
							<div class="field">
							  <input type="radio" name="kinds" value="1" <?php if($v['kinds']==1){echo "checked='checked'";} ?>>友情链接
							  <input type="radio" name="kinds" value="2" <?php if($v['kinds']==2){echo "checked='checked'";}?>>合作伙伴
							  <input type="radio" name="kinds" value="3"<?php if($v['kinds']==3){echo "checked='checked'";}?>>广告
							  <input type="radio" name="kinds" value="4" <?php if($v['kinds']==4){echo "checked='checked'";}?>>微信
							  
							</div>
					</div>

					<div class="form-group">
						<div class="label"><label>昵称</label></div>
							<div class="field">
							  <input class="input" name="name" value="<?php echo $v['name']?>" placeholder="请填写幻灯片标题">
							  
							</div>
					</div>
					
					<div class="form-group">
						<div class="label"><label>链接地址</label></div>
							<div class="field">
							  <input class="input" name="url" value="<?php echo $v['url']?>" placeholder="请填写幻灯片标题">
							  
							</div>
					</div>
				</div>	
				<div class="x5">
					<div class="form-group">
						<div class="label"><label></label></div>
							<div class="field">
							  
							   <div class="float-left margin-bottom"><img src="<?php if( $v['image']<>null){echo '../'.$v['image'];}else{echo 'images/upload.png';}?>" width="135" height="113" /></div>
                    <div class="field">
                    	<a class="button input-file" href="javascript:void(0);">+ 浏览文件<input size="100" type="file" name="logo"  /></a>
							  
							</div>
					</div>				
				</div>
			</div>	
					<div class="form-group">
						<div class="label"><label>描述</label></div>
							<div class="field">
							  <textarea class="input" rows="5" cols="50" name="desc" placeholder="请填写描述"><?php echo $v['descs']?></textarea>
							  
							</div>
					</div>
					<div class="form-group">
						<div class="label"><label>状态</label></div>
							<div class="field">
							  <input type="checkbox" name="status" value="1" <?php if($v['status']==1){echo "checked='checked'";} ?>>审核
							  <input type="checkbox" name="enable" value="1" <?php if($v['enable']==1){echo "checked='checked'";} ?>>显示
							</div>
					</div>
			
					
               <div class="form-button"><input class="button bg-main" name="submit" type="submit" value="立即提交"></div>
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
				$logo=$v['image'];
				 }else{// 上传成功 获取上传文件信息
				$info =  $upload->getUploadFileInfo();
				 }
			if($info[0]['savename']){
				$path=explode('../',$info[0]['savepath']);
				$logo=$path[1].$info[0]['savename'];
				}else{
			$logo=$v['image'];
				}
				$time=time();

		if($id<>null){
		$data= $link->update(
								"id=$id",
								"
								name ='$_POST[name]',
								kinds ='$_POST[kinds]',
								image='$logo',
								url='$_POST[url]',
								descs='$_POST[desc]',
								status='$_POST[status]',
								enable='$_POST[enable]',
								time='$time'
								"
								);
								
		if($data){
				echo "<script>alert('修改成功！');location.href='link.php'</script>";
		}else{
				echo "<script>alert('修改失败！');location.href='link_add.php'</script>";
			
		}
	
		
 }else{
	$data=$link->insert(array(
									"id=>null",
									"name"=>"$_POST[name]",
									"kinds" =>"$_POST[kinds]",
									"image"=>"$logo",
									"url"=>"$_POST[url]",
									"descs"=>"$_POST[desc]",
									"status"=>"$_POST[status]",
									"enable"=>"$_POST[enable]",
									"time"=>"$time"
										));
										
		if($data){
				echo "<script>alert('添加成功！');location.href='link.php'</script>";
		}else{
				echo "<script>alert('添加失败！');location.href='link_add.php'</script>";
			
		} 
}
										
}
?>			
</fieldset>
	</div>
