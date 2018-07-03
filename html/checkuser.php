<?php
 include_once("config/M.class.php");
 $name=$_GET['username'];
	$user=new M('user');
	$getdata=$user->find("username={value}");

if($getdata){
	echo '{"getdata":"true"}';
		}else{
	echo '{"getdata":"false"}';
			
			}




?>