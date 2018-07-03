<?php
session_start();

include_once("config/M.class.php");

include_once("common.php");
$id=isset($_GET['id'])?$_GET['id']:"";
$articles=new M('article');
$arrt=new M('art_attr');
$delattr=$arrt->delete("aid=$id");
if($result=$articles->delete("id=$id")){
echo "<script type='text/javascript'>" ;
echo "window.location.href='articles.php'" ;
 echo "</script>" ;
 }
 ?>