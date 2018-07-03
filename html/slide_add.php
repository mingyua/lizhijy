<?php include_once("config/M.class.php");?>
<?php include_once("header.php");?>
<?php
$id=isset($_GET['id'])?$_GET['id']:"";
$slide = new M("slide");
$v=$slide->find("id=$id");

$kinds =$v['kinds'];
$cate=new M('cate');
$cid=$cate->find("id=$kinds");
$time=time();
 ?>
 <div class="admin">
	 <fieldset id="sl-systemsetting">
		<legend>幻灯片管理</legend>
	      <form method="post" class="form-x"  enctype="multipart/form-data">
					<div class="form-group">
						<div class="label"><label>栏目分类</label></div>
							<div class="field">
							  <select class="input" name="kinds">
							  <option value="<?php echo $cid['id']?>"><?php echo $cid['name']?></option>
								<?php
								include_once('config/Cate.class.php');
								$cate=new M('cate');
								$result=$cate->select("module='slide'");
								$Cate=Cate::unlimitedForlevel($result,'&nbsp;&nbsp;┗━');

								foreach($Cate as $k){
								?>
							 <option value="<?php echo $k['id']?>"><?php echo $k['html'].$k['name']?></option>
							 <?php
								}
								?>
							  </select>
							  
							</div>
					</div>
					<div class="form-group">
						<div class="label"><label for="title">标题</label></div>
						<div class="field">
							<textarea class="input" rows="5" cols="50" name="title" placeholder="请填写幻灯片标题"><?php echo $v['title']?></textarea>
							<span>多张图片标题请用“|”分开</span>
						</div>
					</div>
					<div class="form-group">
						<div class="label"><label for="title">图片地址</label></div>
						<div class="field">
							<textarea class="input" rows="5" cols="50" name="pic" placeholder="请填写幻灯片图片地址"><?php echo $v['pic']?></textarea>
							<span>多张图片请用“|”分开</span>
						</div>
					</div>
					<div class="form-group">
						<div class="label"><label for="title">超链接地址</label></div>
						<div class="field">
							<textarea class="input" rows="5" cols="50" name="url" placeholder="请填写幻灯片超链接地址"><?php echo $v['url']?></textarea>
							<span>多张图片地址请用“|”分开</span>
						</div>
					</div>
					
               <div class="form-button"><input class="button bg-main" name="submit" type="submit" value="添加幻灯片"></div>
            </form>
<?php
 if(!empty($_POST['submit'])){

		$datac= $slide->update(
								"id='$id'",
								"
								kinds ='$_POST[kinds]',
								title ='$_POST[title]',
								url ='$_POST[url]',
								pic ='$_POST[pic]',
								time ='$time'
								
								"
								);
		if($datac){
				echo "<script>alert('修改成功！');location.href='slide.php'</script>";
		}else{
				echo "<script>alert('修改失败！');location.href='slide.php'</script>";
			
		}
	
		
 }

?>			
</fieldset>
	</div>
