<?php
include_once("config/upconfig.php");
?>

<?php
$time=time();
		include_once("config/UploadFile.class.php");
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$savepath='../uploads/'.date('Ymd').'/';
		$upload->saveRule = time().rand();
		if (!file_exists($savepath)){
			mkdir($savepath);
		}
		$upload->savePath =  $savepath;// 设置附件上传目录
		if(!$upload->upload()) {// 上传错误提示错误信息
			$this->error($upload->getErrorMsg());
		}else{// 上传成功 获取上传文件信息
		
		$info =  $upload->getUploadFileInfo();
		$image=substr($info[0]['savepath'], 2) . $info[0]['savename'];
		$sql="INSERT INTO `think_photo` VALUES (null, '0', '".$image."', '".$time."')";
		 if(mysql_query("$sql")){
			echo "<script>alert('上传成功！');<script>";
		}else{
			echo "<script>alert('上传失败！');<script>";
			}
}?>

