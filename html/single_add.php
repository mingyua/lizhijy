<?php include_once("config/M.class.php");?>
<?php include_once("header.php");?>
<?php
$id=isset($_GET['id'])?$_GET['id']:"";
$single = new M("single");
$v=$single->find("id=$id");

$kinds =$v['kinds'];
$cate=new M('cate');
$cid=$cate->find("id=$kinds");

 ?>

<div class="admin">
        <form method="post" class="form-x" enctype="multipart/form-data">
			<div class="line">
			<div class="x1"></div>
				<div class="x6">
					
                <div class="form-group">
                    <div class="label"><label for="title">优化标题</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="title" name="title" size="50" value="<?php echo $v['title']?>" placeholder="title标题内容，用于搜索引擎优化"  data-validate="required:请填写优化标题，建议在80字以内。" />
                    </div>
                </div>
                 <div class="form-group">
                    <div class="label"><label for="keywords">关键词</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="keywords" name="keywords" size="50" value="<?php echo $v['keywords']?>" placeholder="站点关键词，用于搜索引擎优化" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="desc">描述</label></div>
                    <div class="field">
                    	<textarea id="desc" name="desc"  placeholder="网站的描述，用于搜索引擎优化" ><?php echo $v['description']?></textarea>
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
                    	<input class="input" type="text" name="time" value="<?php if($v['time']<>null){echo date('Y-m-d H:i:s',$v['time']);}else{echo date('Y-m-d H:i:s',TIME());}?>" id="d241" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})">

                    </div>
                </div>
                
                <div class="form-button"><input class="button bg-main" name="submit" type="submit" value="提交"></div>
        </div>
    
	
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
	
		if($id<>null){
			$time_up=(strtotime($_POST['time']));
		$data= $single->update(
								"id=$id",
								"
								title ='$_POST[title]',
								url='$_POST[url]',
								pic='$logo',
								keywords='$_POST[keywords]',
								description='$_POST[desc]',
								contents='$_POST[contents]',
								author='$_SESSION[logname]',
								status='$_POST[status]',
								time='$time_up'
								"
								);
		if($data){
				echo "<script>alert('修改成功！');location.href='single.php'</script>";
		}else{
				echo "<script>alert('修改失败！');location.href='single.php'</script>";
			
		}
	
		
 }
 
										
}
?>			

    <script type="text/javascript">
        UE.getEditor('content',{
            //默认的编辑区域高度
            initialFrameWidth:960,
            initialFrameHeight:300,
           });
		UE.getEditor('desc', {
		    initialFrameWidth:480,
            initialFrameHeight:125,
			toolbars:[['FullScreen', 'Source', 'Undo', 'Redo', 'fontfamily', 'fontsize','Bold']],
			lang:"en",
			serverUrl: '/server/ueditor/controller.php'
		});

    </script>
