<?php include_once("config/M.class.php");?>
<?php include_once("header.php");?>

<div class="admin">
<fieldset id="sl-systemsetting" class="padding-large">
    <legend>基本设置</legend>
<form method="post" class="form-x"  enctype="multipart/form-data">
	<?php
	$id=isset($_GET['id'])?$_GET['id']:"";
	$node=new M("node");
	$value=$node->select(" id>0 order by id ASC");
	foreach($value as $v){
		$access=new M("access");
		$val=$access->select("nid='$v[id]' and gid='$id' order by nid ASC");
		$nid=isset($val[0]['nid'])?$val[0]['nid']:"";

	?>
	<p class="float-left width1" >
	<input name="access[]" type="checkbox" value="<?php echo $v['id']?>" <?php if($v['id']==$nid){echo "checked='checked'";}?> ><?php echo $v['title']?>
	</p>
	<?php 
	}
	?>
	<div class="clear"></div>
	<div class="form-button"><input class="button bg-main" name="submit" type="submit" value="修改权限"></div>
</form>
<?php

if(!empty($_POST['submit'])){
	
	$ace=new M("access");
	$delall =mysql_query("Delete from think_access where gid=".$id);

	$in  = "";
	foreach($_POST['access'] as $v)
	{
	$tmp=explode('_',$v);
	$in.="('".$tmp[0]."','".$id."'),";
	}
	 $in = rtrim($in,",");		
	$sqlstr =mysql_query("insert into think_access (nid,gid) values".$in);
	if($sqlstr){
		
		echo "<script>alert('修改成功！');window.location.href='admin_group.php'</script>";
	}


}

?>
</fieldset>
				
				
				
				