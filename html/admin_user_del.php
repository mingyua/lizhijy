<?php
session_start();
include_once("config/M.class.php");
include_once("common.php");
$id=isset($_GET['id'])?$_GET['id']:"";
$user=new M('user');
$locks=$user->find("id=$id");
$username=$locks['locks'];
if($username==1){
echo "<script type='text/javascript'>alert('此用户不能删除！');window.location.href='admin_user.php'</script>" ;exit;
	
}
if($result=$user->delete("id=$id")){
echo "<script type='text/javascript'>" ;
echo "window.location.href='admin_user.php'" ;
 echo "</script>" ;
 }
 ?>