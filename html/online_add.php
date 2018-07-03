<?php include_once("config/M.class.php");?>
<?php include_once("header.php");?>
<?php
$id=isset($_GET['id'])?$_GET['id']:"";
$qq = new M("qq");
$v=$qq->find("id=$id");

$kinds =$v['kinds'];
$cate=new M('cate');
$cid=$cate->find("id=$kinds");
$time=time();
 ?>
 <div class="admin">
	 <fieldset id="sl-systemsetting">
		<legend>在线客服</legend>
	      <form method="post" class="form-x"  enctype="multipart/form-data">
					<div class="form-group">
						<div class="label"><label for="title">客服名称</label></div>
						<div class="field">
							<textarea class="input" rows="5" cols="50" name="title" placeholder="请填写客服名称"><?php echo $v['title']?></textarea>
							<span>多个客服标题请用“,”分开</span>
						</div>
					</div>
					<div class="form-group">
						<div class="label"><label for="title">客服QQ</label></div>
						<div class="field">
							<textarea class="input" rows="5" cols="50" name="qq" placeholder="请填写客服QQ"><?php echo $v['qq']?></textarea>
							<span>多个客服QQ请用“,”分开</span>
						</div>
					</div>
					<div class="form-group">
						<div class="label"><label for="desc">客服描述</label></div>
						<div class="field">
							<textarea class="input" rows="5" cols="50" name="desc" placeholder="请填写客服描述"><?php echo $v['contents']?></textarea>
							<span>多个客服描述请用“|”分开</span>
						</div>
					</div>
					
               <div class="form-button"><input class="button bg-main" name="submit" type="submit" value="立即提交"></div>
            </form>
<?php
 if(!empty($_POST['submit'])){
		$time=time();
		if($id<>null){
		$data= $qq->update(
								"id=$id",
								"
								title ='$_POST[title]',
								qq ='$_POST[qq]',
								contents='$_POST[desc]',
								sort='1',
								status='1',
								time='$time'
								"
								);
		if($data){
				echo "<script>alert('修改成功！');location.href='online.php'</script>";
		}else{
				echo "<script>alert('修改失败！');location.href='online.php'</script>";
			
		}
	
		
 }else{
	$data=$qq->insert(array(
									"id=>null",
									"title" =>"$_POST[title]",
									"qq"=>"$_POST[qq]",
									"contents"=>"$_POST[desc]",
									"sort"=>"1",
									"status"=>"1",
									"time"=>"$time"
										));
										
		if($data){
				echo "<script>alert('添加成功！');location.href='online.php'</script>";
		}else{
				echo "<script>alert('添加失败！');location.href='online.php'</script>";
			
		} 
}
										
}
?>			
</fieldset>
	</div>
