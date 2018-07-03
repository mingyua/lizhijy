<?php
include_once("config/M.class.php");
$id=isset($_GET['id'])?$_GET['id']:"";
$cate=new M('cate');
$single=new M("single");
$module=$cate->find("id=$id");
if($module['module']=="single"){
	$del=$single->delete("kinds=$id");
}
if($result=$cate->delete("id=$id")){
echo "<script type='text/javascript'>" ;
echo "window.location.href='main_class.php'" ;
 echo "</script>" ;
 }
 ?>