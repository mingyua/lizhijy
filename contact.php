<?php include_once('header.php');?>
</head>
<body class="">
<?php include_once('nav.php');?>
<div class="container-layout">
  <DIV class="container">
  <br>
   <div id="subnav" class="line-middle bg-white border ">
  <div class="xm3 border-right" style="padding:0;">
 <h2 style="height:40px;line-height:40px;background:#005BAC;text-align:center;color:#FFF;">栏目导航</h2>
 <ul class="padding-top">
			<?php
			$about=new M("cate");
			$val=$about->select("pid='34'  and window='1'");
			foreach($val as $v){
			?>
               <li class="leftli" style="padding:5px 0;text-align:center;"><a href="contact.php?cid=<?php echo $v['id']?>"><?php echo $v['name']?></a></li>
 			<?php	
			}
			?>
</ul>
<?php include_once('left.php');?>
  </div>
  <div class="xm9 border-left ">
<div class="detail padding-big">
<?php
$cate=new M("cate");
$about=new M("single");
if($cid==null){
$val=$about->find("kinds='35'");
$cname=$cate->find("id='35'");

}else{
$val=$about->find("kinds='$cid'");
$cname=$cate->find("id='$cid'");

	
}
?>
<h2 class="text-large bold tit-border padding-bottom"><?php echo $cname['name']?></h2>

<?php 
	echo $val['contents'];
?>
				
				
</div>  
</div>
</div>



  
  </DIV>
  <br>
</div> 
  <?php include_once('footer.php');?>
