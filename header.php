 <?php
function isMobile(){  
    $useragent=isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';  
    $useragent_commentsblock=preg_match('|\(.*?\)|',$useragent,$matches)>0?$matches[0]:'';        
    function CheckSubstrs($substrs,$text){  
        foreach($substrs as $substr)  
            if(false!==strpos($text,$substr)){  
                return true;  
            }  
            return false;  
    }
    $mobile_os_list=array('Google Wireless Transcoder','Windows CE','WindowsCE','Symbian','Android','armv6l','armv5','Mobile','CentOS','mowser','AvantGo','Opera Mobi','J2ME/MIDP','Smartphone','Go.Web','Palm','iPAQ');
    $mobile_token_list=array('Profile/MIDP','Configuration/CLDC-','160¡Á160','176¡Á220','240¡Á240','240¡Á320','320¡Á240','UP.Browser','UP.Link','SymbianOS','PalmOS','PocketPC','SonyEricsson','Nokia','BlackBerry','Vodafone','BenQ','Novarra-Vision','Iris','NetFront','HTC_','Xda_','SAMSUNG-SGH','Wapaka','DoCoMo','iPhone','iPod');  

    $found_mobile=CheckSubstrs($mobile_os_list,$useragent_commentsblock) ||  
              CheckSubstrs($mobile_token_list,$useragent);  

    if ($found_mobile){  
        return true;  
    }else{  
        return false;  
    }  
}
if(isMobile()){
	header('Location:http://m.qsn580.com');
}		
include_once("html/config/M.class.php");
 session_start();
$link=new M("link");
$single=new M("single");
$cate=new M("cate");
$article=new M("article");
$config=NEW M("config");
$v=$config->find("id='1'");
$id=intval(isset($_GET['id'])?$_GET['id']:"");
$cid=intval(isset($_GET['cid'])?$_GET['cid']:"");
if($id){
$seo_tit=$article->find("id='$id'");
$bz1="-";	
}
if($cid){
$seo_tits=$cate->find("id='$cid'");	
$bz="-";
}
$wangzhi='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];//ULR
$uid=$_SESSION['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv = "X-UA-Compatible" content = "IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=0.3, user-scalable=no" />
<title><?php echo $seo_tits['name'].$bz.$seo_tit['title'].$bz1.$v['site_title']?></title>
<link rel="icon" href="favicon.ico" type="image/x-icon" /> 
<meta name="Keywords" content="<?php echo $v['seo_keywords']?>" />
<meta name="description" content="<?php echo $v['seo_description']?>" />
<link href="css/pintuer.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" />