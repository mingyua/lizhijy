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
			$val=$about->select("pid='15'  and window='1'");
			foreach($val as $v){
			?>
               <li class="leftli" style="padding:5px 0;text-align:center;"><a href="center.php?cid=<?php echo $v['id']?>"><?php echo $v['name']?></a></li>
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

if($cid==null){
$val=$article->select("kinds='17'");
$cname=$cate->find("id='17'");
$where="kinds=17";
}else{
$val=$article->select("kinds='$cid'");
$cname=$cate->find("id='$cid'");
$where="kinds=$cid";
	
}
?>
<h2 class="text-large bold tit-border padding-bottom"><?php echo $cname['name']?></h2>

<ul class="list-text height-big">
<?php
include_once('html/config/page.class.php');
$result=$article->select("$where");
$total=$article->select("$where","*","count");
$pageSize=26;
pageft($total,$pageSize,1,0,0,3);
$result=$article->select(" $where order by id DESC   limit $firstcount,$displaypg") ;
foreach($result as $k){
?>

	<li><span class="date"><?php echo date('Y-m-d H:i',$k['time']) ?></span><a href="show.php?cid=<?php echo $k['kinds']?>&id=<?php echo $k['id']?>" target="_blank" ><?php echo $k['title']?></a></li>

<?php
}
?>
</ul>        
<div class="panel-foot text-center">
	<ul class="pagination pagination-group">
	<?php echo $pagenav?>
	</ul>
</div>
				
				
</div>  
</div>
</div>



  
  </DIV>
  <br>
</div> 
  <?php include_once('footer.php');?>
