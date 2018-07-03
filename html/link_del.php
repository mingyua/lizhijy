<?php
session_start();

include_once("config/M.class.php");

include_once("common.php");
$id=isset($_GET['id'])?$_GET['id']:"";
$link=new M('link');
if($result=$link->delete("id=$id")){
echo "<script type='text/javascript'>" ;
echo "window.location.href='link.php'" ;
 echo "</script>";
 }
 ?>