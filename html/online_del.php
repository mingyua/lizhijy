<?php
session_start();

include_once("config/M.class.php");

include_once("common.php");
$id=isset($_GET['id'])?$_GET['id']:"";
$qq=new M('qq');
if($result=$qq->delete("id=$id")){
echo "<script type='text/javascript'>" ;
echo "window.location.href='online.php'" ;
 echo "</script>" ;
 }
 ?>