<?php

$v= explode('/',$_SERVER['PHP_SELF']);
$url= explode('.',$v[2]);
$gid=$_SESSION['groups'];
$lock=$_SESSION['lock'];
$access=new M("access");
if($url[0]=="top" || $url[0]=="left" || $url[0]=="admin" ){
$node_access="1";	
}else{
$acess=$access->select("gid='$gid'");
$data=array();
 foreach($acess as $v){
	$data[]=array($v['nid']);	
 }
$node=NEW M("node");
if($_SESSION['lock']==1){
$node_access=$_SESSION['access'];
$node_access=$url[0];	
}else{
$arr=arr2str($data); //将数组转换成字符串，函数在数据链接中
$nod=$node->find("id in($arr) and name='$url[0]'");
$_SESSION['access']=$nod['name'];
$node_access=$_SESSION['access'];
}

}
if(empty($node_access)){
	echo "<script>alert('您没有些权限,请与管理员联系！');window.location.href='admin.php'</script>";exit;
}
?>
