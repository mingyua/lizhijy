<?php
session_start();

include_once("config/M.class.php");

include_once("common.php");
$id=isset($_GET['id'])?$_GET['id']:"";
$apply=new M('apply');
if($result=$apply->delete("id=$id")){
echo "<script type='text/javascript'>" ;
echo "window.location.href='apply.php'" ;
 echo "</script>" ;
 }
 ?>