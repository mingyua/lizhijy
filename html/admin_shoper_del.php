<?php
session_start();

include_once("config/M.class.php");

include_once("common.php");
$id=isset($_GET['id'])?$_GET['id']:"";
$shoper=new M('shoper');
if($result=$shoper->delete("id=$id")){
echo "<script type='text/javascript'>" ;
echo "window.location.href='admin_shoper.php'" ;
 echo "</script>" ;
 }
 ?>