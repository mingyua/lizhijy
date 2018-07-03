<?php
session_start();

include_once("config/M.class.php");

include_once("common.php");
$id=isset($_GET['id'])?$_GET['id']:"";
$photo=new M('photo');
if($result=$photo->delete("id=$id")){
echo "<script type='text/javascript'>" ;
echo "window.location.href='picture.php'" ;
 echo "</script>";
 }
 ?>