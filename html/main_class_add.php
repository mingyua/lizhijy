<?php include_once("config/M.class.php");?>
<?php include_once("header.php");?>
<?php
$id=isset($_GET['id'])?$_GET['id']:"";
$cate = new M(cate);
$v=$cate->find("id=$id");
$pid=$v['pid'];
if($pid==0){
	$p_id="0";
	$p_name="顶级栏目";
}else{
$cate=new M('cate');
$cid=$cate->find("id=$pid");
$p_id=$cid['id'];
$p_name=$cid['name'];

}
 ?>

<div class="admin">
 <fieldset id="sl-systemsetting">
    <legend>分类添加</legend>
       <form method="post" class="form-x" enctype="multipart/form-data">
<div class="form-group">
                <div class="label"><label>上级栏目</label></div>
                	<div class="field">
                      <select class="input" name="pid">
					  <option value="<?php echo $p_id;?>"><?php  echo $p_name;?></option>
						<?php
						include_once('config/Cate.class.php');
						$cate=new M('cate');
						$result=$cate->select("id>0");
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
                    <div class="label"><label for="name">栏目名称</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="name" name="name" size="50" value="<?php echo $v['name'];?>" placeholder="请填写网址" data-validate="required:请填写网址" />
                    </div>
             </div>
				<div class="form-group">
                    <div class="label"><label for="url">链接地址</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="url" name="url" size="50" value="<?php echo $v['url'];?>" placeholder="请填写网址" />
                    </div>
             </div>
				<div class="form-group">
                    <div class="label"><label for="sort">链接地址格式：</label></div>
                    <div class="field">
                    	<textarea   placeholder="" style="width:100%;height:120px" >文字列表：http://m.qsn580.com/index/news/kinds/24.html   24为分类ID
案例(左图右文)列表：http://m.qsn580.com/index/cases/kinds/24.html   24为分类ID
团队(上图下文)列表：http://m.qsn580.com/index/team/kinds/24.html   24为分类ID
单页面：http://m.qsn580.com/index/contact/id/24.html   24为分类ID
							</textarea>
								

                    </div>
             </div>
			 <div class="form-group">
                    <div class="label"><label for="sort">排序</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="sort" name="sort" size="50" value="<?php echo $v['sort'];?>" placeholder="请填写网址"  />
                    </div>
             </div>

				<div class="form-group">
                    <div class="label"><label for="module">所属类型</label></div>
                    <div class="field">
                     	<input type="radio"  id="module" name="module" size="50" value="nav" <?php if($v['module']=="nav"){echo "checked='checked'";}?> data-validate="required:请填写网址" />导航
                    	<input type="radio"  id="module" name="module" size="50" value="list" <?php if($v['module']=="list"){echo "checked='checked'";}?> data-validate= "required:请填写网址" />列表
                    	<input type="radio"  id="module" name="module" size="50" value="single" <?php if($v['module']=="single"){echo "checked='checked'";}?> data-validate="required:请填写网址" />单页
                    	<input type="radio"  id="module" name="module" size="50" value="slide" <?php if($v['module']=="slide"){echo "checked='checked'";}?> data-validate="required:请填写网址" />幻灯片
                    </div>
             </div>
				<div class="form-group">
                    <div class="label"><label for="name">客户端</label></div>
                    <div class="field">
						<div class="button-group border-main checkbox"> 
							<label class="button <?php if($v['window']=="1"){echo "active";}?> "><input name="window" value="1" type="checkbox"  <?php if($v['window']=="1"){echo "checked='checked'";}?> >电脑端</label> 
							<label class="button <?php if($v['nav']=="1"){echo "active";}?>"> <input name="nav" value="1" type="checkbox" <?php if($v['nav']=="1"){echo "checked='checked'";}?>>手机端 </label> 
						</div>

                    </div>
             </div>
			 <div class="form-button"><input class="button bg-main" name="submit" type="submit" value="提交"></div>
	
	
		 </form>
 </fieldset>		 
</div>

<?php
 if(!empty($_POST['submit'])){
		$module=$_POST['module'];
		if(isset($_POST['window'])){
			$window="1";
		}else{
			$window="";
		}
		if(isset($_POST['nav'])){
			$nav="1";
		}else{
			$nav="";
		}
		if($id<>null){
		$data= $cate->update(
								"id=$id",
								"
								name ='$_POST[name]',
								pid ='$_POST[pid]',
								sort ='$_POST[sort]',
								module='$_POST[module]',
								window='$window',
								nav='$nav',
								url='$_POST[url]'
								"
								);
			if($v['module']==$module and $v['module']=="single"){
				$single=new M("single");
				$adds=$single->update(
								"id=$id",
								"
								name ='$_POST[name]',
								kinds ='$_POST[pid]'
								"
								);
				
			}else{
				$single=new M("single");
				$adds=$single->delete("kinds='$id'");

			}					
		if($data){
				echo "<script>alert('修改成功！');location.href='main_class.php'</script>";
		}else{
				echo "<script>alert('修改失败！');location.href='main_class.php'</script>";
			
		}
	
		
 }else{
	$data=$cate->insert(array(
									"id=>null",
									"name"=>"$_POST[name]",
									"pid" =>"$_POST[pid]",
									"sort" =>"$_POST[sort]",
									"module"=>"$_POST[module]",
									"window"=>'$window',
									"nav"=>'$nav',
									"url"=>"$_POST[url]"
										));
		if($module=="single"){
			$ccid=$cate->find('id>0 order by id desc limit 1');
			$kinds=$ccid['id'];
			$single=new M("single");
			$adds=$single->insert(array(
									"id=>null",
									"kinds" =>"$kinds"
									));
		
			
		}								
										
		if($data){
				echo "<script>alert('添加成功！');location.href='main_class.php'</script>";
		}else{
				echo "<script>alert('添加失败！');location.href='main_class.php'</script>";
			
		} 
}
										
}
?>			
