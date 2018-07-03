<?php include_once("config/M.class.php");?>
<?php include_once("header.php");?>
<?php
$id=isset($_GET['id'])?$_GET['id']:"";
$article = new M("article");
$v=$article->find("id=$id");

$kinds =$v['kinds'];
$cate=new M('cate');
$cid=$cate->find("id=$kinds");

$art_attr=new M('art_attr');
$av=$art_attr->find("aid=$id");
 ?>

<div class="admin">

    <div class="tab padding">
      <div class="tab-head">
        <ul class="tab-nav">
          <li class="active"><a href="#tab-set">添加文章</a></li>
          <li><a href="#tab-attr">属性设置</a></li>
          <li><a href="#tab-upload">上传设置</a></li>
          <li><a href="#tab-visit">访问限制</a></li>
        </ul>
      </div>
      <div class="tab-body">
        <br />
        <form method="post" class="form-x" enctype="multipart/form-data">
       <div class="tab-panel active" id="tab-set">
			<div class="line">
			<div class="x1"></div>
				<div class="x6">
					<div class="form-group">
                	<div class="label"><label>栏目分类</label></div>
                	<div class="field">
                      <select class="input" name="kinds">
					  <option value="<?php echo $cid['id']?>"><?php echo $cid['name']?></option>
						<?php
						include_once('config/Cate.class.php');
						$cate=new M('cate');
						$result=$cate->select("module<>'slide' and module<>'single' ");
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
                    <div class="label"><label for="title">优化标题</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="title" name="title" size="100" value="<?php echo $v['title']?>" placeholder="title标题内容，用于搜索引擎优化"  data-validate="required:请填写优化标题，建议在80字以内。" />
                    </div>
                </div>
                 <div class="form-group">
                    <div class="label"><label for="keywords">关键词</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="keywords" name="keywords" size="50" value="<?php echo $v['keywords']?>" placeholder="站点关键词，用于搜索引擎优化"  />
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="desc">描述</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="desc" name="desc" size="50" value="<?php echo $v['description']?>" placeholder="网站的描述，用于搜索引擎优化"  />
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="url">链接地址</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="url" name="url" size="50" value="<?php echo $v['url']?>" placeholder="网站的描述，用于搜索引擎优化"  />
                    </div>
                </div>
				</div>
				<div class="x4 padding-big">
				
				<div class="form-group">
                    <div class="float-left margin-bottom"><img src="<?php if( $v['pic']<>null){echo $v['pic'];}else{echo 'images/upload.png';}?>" width="135" height="113" /></div>
                    <div class="field">
                    	<a class="button input-file" href="javascript:void(0);">+ 浏览文件<input size="100" type="file" name="logo"  /></a>
                    </div>
                </div>
				
				</div>
			</div>
				
               <div class="form-group">
                    <div class="label"><label for="readme">内容</label></div>
                    <div class="field">
                    	<textarea id="content" name="contents"  placeholder="请填写维护说明" ><?php echo $v['contents']?></textarea>
                    </div>
                </div>
                 <div class="form-group">
                    <div class="label"><label for="siteurl">审核状态</label></div>
                    <div class="field">
                    	<input type="radio" value="0" name="status" <?php if($v['status']==0){echo "checked='checked'";} ?> />未审核
                    	<input type="radio" value="1" name="status" <?php if($v['status']==1){echo "checked='checked'";} ?> />已审核
						
                    </div>
                </div>
               <div class="form-group">
                    <div class="label"><label for="sitename">发布时间</label></div>
                    <div class="field">
                    	<input  class="input" type="text" name="time" value="<?php if($v['time']<>null){echo date('Y-m-d H:i:s',$v['time']);}else{echo date('Y-m-d H:i:s',TIME());}?>"  id="d241" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})">

                    </div>
                </div>
                
                <div class="form-button"><input class="button bg-main" name="submit" type="submit" value="提交"></div>
        </div>
        <div class="tab-panel" id="tab-attr">
		<div class="line">
				<div class="x6">
				  <div class="form-group">
						<div class="label"><label for="brand">品牌名称</label></div>
						<div class="field">
							<input type="text" class="input" id="brand" name="brand" size="50" value="<?php echo $av['brand']?>" />
						</div>
				   </div>

				  <div class="form-group">
						<div class="label"><label for="color">颜色</label></div>
						<div class="field">
							<input type="text" class="input" id="color" name="color" size="50" value="<?php echo $av['color']?>" />
						</div>
				   </div>
				  <div class="form-group">
						<div class="label"><label for="price">现价</label></div>
						<div class="field">
							<input type="text" class="input" id="price" name="price" size="50" value="<?php echo $av['price']?>"/>
						</div>
				   </div>
				  <div class="form-group">
						<div class="label"><label for="attr">发布状态</label></div>
						<div class="field">
							<input type="checkbox"  id="hot" name="hot" size="50" <?php if($av['hot']==1){echo "checked='checked'";}?> value="1" />热门
							<input type="checkbox"  id="hot" name="news" size="50" <?php if($av['news']==1){echo "checked='checked'";}?> value="1" />最新
							<input type="checkbox"  id="hot" name="top" size="50" <?php if($av['top']==1){echo "checked='checked'";}?> value="1" />推荐
						</div>
				   </div>

				   </div>

				<div class="x6">
				  <div class="form-group">
						<div class="label"><label for="mode">型号</label></div>
						<div class="field">
							<input type="text" class="input" id="mode" name="mode" size="50"  value="<?php echo $av['mode']?>"/>
						</div>
					</div>
				  <div class="form-group">
						<div class="label"><label for="size">尺寸</label></div>
						<div class="field">
							<input type="text" class="input" id="size" name="size" size="50"  value="<?php echo $av['size']?>"/>
						</div>
					</div>
				  <div class="form-group">
						<div class="label"><label for="oldprice">原价</label></div>
						<div class="field">
							<input type="text" class="input" id="oldprice" name="oldprice" size="50" value="<?php echo $av['oldprice']?>" />
						</div>
				   </div>
				</div>
		  </div>
		</div>
        <div class="tab-panel" id="tab-upload">上传设置</div>
        <div class="tab-panel" id="tab-visit">访问限制</div>
		 </form>

      </div>
    </div>
</div>
<?php
 if(!empty($_POST['submit'])){
			 include_once("config/UploadFile.class.php");
			$upload = new UploadFile();// 实例化上传类
			$upload->maxSize  = 1048576 ;// 设置附件上传大小
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->saveRule=time();//上传文件的文件名保存规则
			$upload->savePath =  '../Uploads/';// 设置附件上传目录
			if(!$upload->upload()) {// 上传错误提示错误信息
				$logo=$v['pic'];
				 }else{// 上传成功 获取上传文件信息
				$info =  $upload->getUploadFileInfo();
				 }
			if($info[0]['savename']){
			$logo=$info[0]['savepath'].$info[0]['savename'];
				}else{
			$logo=$v['pic'];
				}
				$time=time();

		if($id<>null){
			$time_up=(strtotime($_POST['time']));
			
		$data= $article->update(
								"id=$id",
								"
								kinds ='$_POST[kinds]',
								title ='$_POST[title]',
								retitle ='$_POST[retitle]',
								url='$_POST[url]',
								pic='$logo',
								keywords='$_POST[keywords]',
								description='$_POST[desc]',
								contents='$_POST[contents]',
								status='$_POST[status]',
								time='$time_up',
								author='$_SESSION[logname]'
								"
								);
		$upattr= $art_attr->update(
								"aid=$id",
								"
								brand ='$_POST[brand]',
								color ='$_POST[color]',
								size ='$_POST[size]',
								price='$_POST[price]',
								oldprice='$_POST[oldprice]',
								hot='$_POST[hot]',
								news='$_POST[news]',
								top='$_POST[top]',
								time='$time'
								"
								);
						
								
		if($data){
				echo "<script>alert('修改成功！');location.href='articles.php'</script>";
		}else{
				echo "<script>alert('修改失败！');location.href='articles.php'</script>";
			
		}
	
		
 }else{
	$data=$article->insert(array(
									"id=>null",
									"kinds"=>"$_POST[kinds]",
									"title" =>"$_POST[title]",
									"retitle" =>"$_POST[retitle]",
									"url"=>"$_POST[url]",
									"pic"=>"$logo",
									"keywords"=>"$_POST[keywords]",
									"description"=>"$_POST[desc]",
									"contents"=>"$_POST[contents]",
									"status"=>"$_POST[status]",
									"time"=>"$time",
									"author"=>"$_SESSION[logname]"

										));
		 $maxid=$article->find("id>0 order by id DESC LIMIT 1");								
		$inattr=$art_attr->insert(array(
									"id=>null",
									"aid"=>"$maxid[id]",
									"kinds" =>"$maxid[kinds]",
									"brand" =>"$_POST[brand]",
									"color" =>"$_POST[color]",
									"size"=>"$_POST[size]",
									"price"=>"$_POST[price]",
									"oldprice"=>"$_POST[oldprice]",
									"hot"=>"$_POST[hot]",
									"news"=>"$_POST[news]",
									"top"=>"$_POST[top]",
									"time"=>time()

									));								
										
		if($data){
				echo "<script>alert('添加成功！');location.href='articles.php'</script>";
		}else{
				echo "<script>alert('添加失败！');location.href='articles.php'</script>";
			
		} 
}
										
}
?>			

    <script type="text/javascript">
        UE.getEditor('content',{
            //默认的编辑区域高度
            initialFrameHeight:300,
           })
    </script>
