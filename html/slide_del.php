<?php
session_start();

include_once("config/M.class.php");

include_once("common.php");
$id=isset($_GET['id'])?$_GET['id']:"";
$slide=new M('slide');
if($result=$slide->delete("id=$id")){
echo "<script type='text/javascript'>" ;
echo "window.location.href='slide.php'" ;
 echo "</script>" ;
 }
 ?>