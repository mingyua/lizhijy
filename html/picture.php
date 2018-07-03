<?php include_once("config/M.class.php");?>
<?php include_once("header.php");?>
<?php
$photo = new M("photo");
$data=$photo->select("id>0");
 ?>
 		<link rel="stylesheet" href="upload/control/css/zyUpload.css" type="text/css">
		
		<script type="text/javascript" src="upload/jquery-1.7.2.js"></script>
		<!-- 引用核心层插件 -->
		<script type="text/javascript" src="upload/core/zyFile.js"></script>
		<!-- 引用控制层插件 -->
		<script type="text/javascript" src="upload/control/js/zyUpload.js"></script>
		<!-- 引用初始化JS -->
		<script type="text/javascript" src="upload/demo.js"></script>
	<script type="text/javascript">   
	function setCopy(content){    
		if(navigator.userAgent.toLowerCase().indexOf('ie') > -1) {    
			clipboardData.setData('Text',content);    
			alert ("该地址已经复制到剪切板");    
		} else {    
			prompt("请复制网站地址:",content);    
		}    
	}    
	   
	</script>     

 <div class="admin">
 <div class="tab">
  <div class="tab-head">
    <ul class="tab-nav">
      <li class="active"><a href="#tab-start">图片列表</a></li>
      <li><a href="#tab-css">上传图片</a></li>
  </ul>
  </div>
  <div class="tab-body">
    <div class="tab-panel active" id="tab-start">
	<fieldset id="sl-systemsetting">
    <legend>图片列表</legend>
	<?php
	foreach($data as $v){
	?>
	<div style="width:100px;height:150px;float:left;margin:5px;">
	<img src="..<?php echo $v['image']?>" width="100" height="100"  />	
	<a href="http://<?php echo $_SERVER['SERVER_NAME'].$v['image']?>" onclick="setCopy(this.href);return false;" class="btn01" target="_self">复制</a>  
	<a href="pic_del.php?id=<?php echo $v['id']?>">删除</a>  
	</div>

	<?php	
	}
	?>

</fieldset>
	</div>
	
	
    <div class="tab-panel" id="tab-css">
		<fieldset id="sl-systemsetting">
		<legend>上传图片</legend>
	
	    <div id="demo" class="demo"></div>   
		</fieldset>

	</div>
	</body>
</html>