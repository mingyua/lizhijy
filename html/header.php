<?php 
include_once("config/M.class.php");
include_once("config/config.inc.php");
session_start();
if($_SESSION['logname']==null){
echo "<script>window.parent.location.href='login.php'</script>";
}

include_once("common.php");//权限
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title><?php echo $config['SITE_NAME']?></title>
    <link rel="stylesheet" href="css/pintuer.css">
     <link rel="stylesheet" href="css/admin.css">
    <script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.all.js"></script>
	<script language="javascript" type="text/javascript" src="../Date/WdatePicker.js"></script>
	<script type="text/javascript">
		window.UEDITOR_HOME_URL='../Ueditor/';
		</script>   
	<script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>
    <script src="js/respond.js"></script>
    <script src="js/admin.js"></script>
    <link type="image/x-icon" href="favicon.ico" rel="shortcut icon" />
    <link href="favicon.ico" rel="bookmark icon" />
	<script type="text/javascript">
$(document).ready(function()
  {
  $(".btn1").click(function(){
    $("#box").animate({height:"460px"});
  });
  $(".btn2").click(function(){
    $("#box").animate({height:"130px"});
  });
});
</script>

</head>