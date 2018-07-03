<?php include_once('header.php');
$apply=new M('apply');
$total1=$apply->select("kinds=1 and cases=1","*","count");
$total2=$apply->select("kinds=2 and cases=1","*","count");
?>
</head>
<body>
<?php include_once('nav.php');?>
  <DIV class="container margin-bottom" style="padding:0">
  <div class="banner mar-5" data-style="border-white">
	<div class="carousel">
		<?php
		$slide=NEW M("slide");
		$sv=$slide->find("kinds='37'");
			$title=explode('|',$sv['title']);
			$pic=explode('|',$sv['pic']);
 			$url=explode('|',$sv['url']);
           $total=$slide->select("1","*","count");
			$count= substr_count($sv['pic'],'|');

		for($i=0;$i<=$count;$i++){
			
		?>
      <div class="item">
        <a href="<?php echo $url[$i]?>" title=""><img src="<?php echo $pic[$i]?>"></a>
      </div>

	  <?php
		}
		?>
		  </div>
	
	</div>
	</DIV>
	<?php
		$vidoe=$single->find("id='22'");
	?>
  <DIV class="container margin-bottom border">
	<div class="line-small margin-top height-large">
	  <div class="x3" style="padding-right:20px;">
	  		<h3 class="b_l_r bg3 padding-left padding-right icon-caret-right text-white bold" ><span class="more" style="padding-top:4px;"><a class="text-white" href="news.php?cid=24" >更多</a></span> 教育视频</h3>

	  <p class="padding-top">
	  <?php echo $vidoe['contents']?>
	 
	 
</p>
	  </div>
	  <div class="x6" style="padding-right:20px;" >
	  		<h3 class="b_l_r bg3 padding-left padding-right icon-caret-right text-white bold" ><span class="more" style="padding-top:4px;"><a class="text-white" href="about.php" >更多</a></span> 学校简介</h3>
			<?php
			$ab=$single->find("kinds='2'");

			?>

	  <p class="padding-top">
			<?php echo $ab['description']?>
		</p>
	  </div>
	  	<div class="x3">
		<h3 class="b_l_r bg3 padding-left padding-right icon-caret-right text-white bold" ><span class="more" style="padding-top:4px;"><a class="text-white" href="about.php?cid=4" >更多</a></span> 教学优势</h3>
		 
			<?php
			$jx=$single->find("kinds='4'");

			?>

	  <div class="padding-top">

	  <?php echo $jx['description']?>
	</div>
	  </div>

	</div>
  
  
  </DIV>

  <DIV class="container margin-bottom border padding-top">
	  	   <h1 id="case" class="text-center bold" style="background:url(images/jyy.jpg) 0  20px repeat-x;" bdsfid="214"><a href="study.php" class="bule bg-white " bdsfid="215"><span style="display:block;width:200px;margin:auto; background:#FFF;" bdsfid="216"> 教育方法<tt class="text-little" style="padding-left:40px;" bdsfid="217">更多</tt><br bdsfid="218"><tt class="text-big" bdsfid="219">Education method</tt></span></a></h1>


  <div class="line-small  margin-bottom margin-top" >
  
  <div class="x3" style="padding-right:10px;">
	<a href=""><img src="images/wang.jpg" height="170"/></a>
 
  <ul class="list-text padding">
	<?php
	$list=$article->select("kinds=8 order by id DESC limit 8");
	foreach($list as $v){
	?>	
		<li class="icon-book font14"><a href="show.php?cid=<?php echo $v['kinds']?>&id=<?php echo $v['id']?>"><?php echo $v['title']?></a></li>
		
	<?php
	}
	?>
		
  
</ul>
  </div>
  
  <div class="x3 bg-white" style="min-height:365px;overflow:hidden;">
	<a href=""><img src="images/pan.jpg" /></a>
 
  <ul class="list-text padding">
	<?php
	$list=$article->select("kinds=9 order by id DESC limit 8");
	foreach($list as $v){
	?>	
		<li class="icon-book font14"><a href="show.php?cid=<?php echo $v['kinds']?>&id=<?php echo $v['id']?>"><?php echo $v['title']?></a></li>
		
	<?php
	}
	?>
		
  
</ul>
  </div> 
  
  <div class="x3 bg-white" style="min-height:365px;overflow:hidden;">
	<a href=""><img src="images/yan.jpg" /></a>
 
  <ul class="list-text padding">
	<?php
	$list=$article->select("kinds=10 order by id DESC limit 8");
	foreach($list as $v){
	?>	
		<li class="icon-book font14"><a href="show.php?cid=<?php echo $v['kinds']?>&id=<?php echo $v['id']?>"><?php echo $v['title']?></a></li>
		
	<?php
	}
	?>
		
  
</ul>
  </div>
   <div class="x3 bg-white" style="min-height:365px;overflow:hidden;">
	<a href=""><img src="images/zao.jpg" /></a>
 
  <ul class="list-text padding">
	<?php
	$list=$article->select("kinds=11 order by id DESC limit 8");
	foreach($list as $v){
	?>	
		<li class="icon-book font14"><a href="show.php?cid=<?php echo $v['kinds']?>&id=<?php echo $v['id']?>"><?php echo $v['title']?></a></li>
		
	<?php
	}
	?>
</ul>
  </div>
  
  </div>   </div>  
<div class="container margin-bottom border padding-top" >
 
 	   <h1 id="case" class="text-center  bold" style="background:url(images/case.jpg) 0  20px repeat-x;" bdsfid="302"><a href="case.php" class="bule">
	   <span style="display:block;width:200px;margin:auto; background:#FFF;" bdsfid="304"> 成功案例<tt class="text-little" style="padding-left:40px;" >更多</tt><br><tt class="text-big" >Successful cases</tt>
</span></a></h1><br>
   <link rel="stylesheet" href="layui/css/layui.css"  media="all">
<div class="layui-tab">
  <ul class="layui-tab-title" style="text-align:center">
    <li class="layui-this">网瘾</li>
    <li>叛逆</li>
    <li>厌学</li>
    <li>早恋</li>
  </ul>
  <div class="layui-tab-content">
    <div class="layui-tab-item layui-show">
		<div class="scrollleft banner" >
		  <ul class="">
			<?php
			$list=$article->select("kinds=19 order by id DESC limit 8");
			foreach($list as $v){
			?>	
			<li class="item"><a href="show.php?cid=<?php echo $v['kinds']?>&id=<?php echo $v['id']?>"><img src="<?php echo $v['pic']?>"/><?php echo $v['title']?></a></li>
				
			<?php
			}
			?>
		  </ul>
		</div>
    </div>
    <div class="layui-tab-item">
		<div class="scrollleft banner" >
		  <ul class="">
			<?php
			$list=$article->select("kinds=20 order by id DESC limit 8");
			foreach($list as $v){
			?>	
			<li class="item"><a href="show.php?cid=<?php echo $v['kinds']?>&id=<?php echo $v['id']?>"><img src="<?php echo $v['pic']?>"/><?php echo $v['title']?></a></li>
				
			<?php
			}
			?>
		  </ul>
		</div>
	</div>
    <div class="layui-tab-item">
		<div class="scrollleft banner">
		  <ul class="">
			<?php
			$list=$article->select("kinds=21 order by id DESC limit 8");
			foreach($list as $v){
			?>	
			<li class="item"><a href="show.php?cid=<?php echo $v['kinds']?>&id=<?php echo $v['id']?>"><img src="<?php echo $v['pic']?>"/><?php echo $v['title']?></a></li>
				
			<?php
			}
			?>
		  </ul>
		</div>

	</div>
    <div class="layui-tab-item">
		<div class="scrollleft banner">
		  <ul class="">
			<?php
			$list=$article->select("kinds=22 order by id DESC limit 8");
			foreach($list as $v){
			?>	
			<li class="item"><a href="show.php?cid=<?php echo $v['kinds']?>&id=<?php echo $v['id']?>"><img src="<?php echo $v['pic']?>"/><?php echo $v['title']?></a></li>
				
			<?php
			}
			?>
		  </ul>
		</div>
	</div>
    
  </div>
</div> 
<script src="layui/layui.js" charset="utf-8"></script>
<script>
layui.use('element', function(){
  var $ = layui.jquery
  ,element = layui.element; //Tab的切换功能，切换事件监听等，需要依赖element模块
  
  
});
</script> 
</div> 
  
<?php
$ad1=$link->find("kinds=3 and descs='AD1'");
?>
 <div class="container margin-bottom border padding-top" >
<div class="clearfix"></div>
<p><a href="<?php echo $ad1['url']?>"><img src="<?php echo $ad1['image']?>" width="100%" height="90" /></a></p> 
<div class="clearfix"></div>
</div>
<div class="container margin-bottom border padding-top" >
<div class="line">
<?php
$ad2=$link->find("kinds=3 and descs='AD2'");
?>

	<div class="x8" style="overflow:hidden;" >
		<p><a href="<?php echo $ad2['url']?>"><img src="<?php echo $ad2['image']?>" width="786" height="359" /></a></p>
	</div>
	<div class="x4" style="overflow:hidden;padding-left:20px;">

	<h2 class="panel-head bg3 text-white bold" >教育新闻 <tt class="text-little">News</tt><span class="more"><a href="news.php?cid=24" class="text-white">更多</a></span></h2>
		<ul class="list-text">
			<?php
			$list=$article->select("kinds=24 order by id DESC limit 11");
			foreach($list as $v){
			?>	
			<li><a href="show.php?cid=<?php echo $v['kinds']?>&id=<?php echo $v['id']?>"><?php echo $v['title']?></a></li>
				
			<?php
			}
			?>
		</ul>
	
	
	</div>
</div> 
</div>
<div class="container margin-bottom border padding-top" >
<div class="line">
	<div class="x8" style="overflow:hidden;" >
			<div class="team banner">
			<h2 class="panel-head bg3 text-white bold">师资团队<span class="more"><a href="about.php?cid=5" class="text-white">更多</a></span></h2>
			  <ul class="padding">
			<?php
			$list=$article->select("kinds=5 order by id DESC limit 20");
			foreach($list as $v){
			?>	
			<li class="item text-center"><a href="show.php?cid=<?php echo $v['kinds']?>&id=<?php echo $v['id']?>"><img src="<?php echo $v['pic']?>"/><br><?php echo $v['title']?></a></li>
				
			<?php
			}
			?>
			  </ul>
			</div>		
		
		
	</div>
	<div class="x4" style="overflow:hidden;padding-left:20px;">
	<h2 class="panel-head bg3 text-white bold">学员心声 <tt class="text-little">STUDENT VOICE</tt><span class="more"><a href="news.php?cid=26" class="text-white">更多</a></span></h2>
		<ul class="list-text">
			<?php
			$list=$article->select("kinds=26 order by id DESC limit 10");
			foreach($list as $v){
			?>	
			<li class="item"><a href="show.php?cid=<?php echo $v['kinds']?>&id=<?php echo $v['id']?>"><?php echo $v['title']?></a></li>
				
			<?php
			}
			?>
		</ul>
	
	
	</div>
</div> </div> 
<div class="container margin-bottom border padding-top padding-bottom" >
<div class="line margin-top">
	<div class="x4" style="overflow:hidden;">
	<div class="panel">
	<h2 class="panel-head bg3 text-white bold">疑问解答<span class="more"><a href="zhaos.php?cid=33" class="text-white">更多</a></span></h2>
		<?php 
		$fr=$article->find("kinds=33 order by id DESC");
		?>
		<div class="panel-body">
		<img src="<?php echo $fr['pic']?>" />
		<ul class="list-text">
			<?php
			$list=$article->select("kinds=33 order by id DESC limit 8");
			foreach($list as $v){
			?>	
			<li class="item"><span style="color:#F00" >★</span><a href="show.php?cid=<?php echo $v['kinds']?>&id=<?php echo $v['id']?>"><?php echo $v['title']?></a></li>
				
			<?php
			}
			?>
		</ul>
	
	
	</div>
	</div></div>
	<div class="x4" style="overflow:hidden;padding-left:20px;">
	<div class="panel">
	<h2 class="panel-head bg3 text-white bold">沟通日记<span class="more"><a href="news.php?cid=27" class="text-white">更多</a></span></h2>
		<?php 
		$frist=$article->find("kinds=27 order by id DESC");
		?>
<div class="panel-body">		<img src="<?php echo $frist['pic']?>" />

		<ul class="list-text">
			<?php
			$list=$article->select("kinds=27 order by id DESC limit 8");
			foreach($list as $v){
			?>	
			<li class="item"><span style="color:#F00" >★</span><a href="show.php?cid=<?php echo $v['kinds']?>&id=<?php echo $v['id']?>"><?php echo $v['title']?></a></li>
				
			<?php
			}
			?>
		</ul>
	
	
	</div>
	</div>
	</div>
	<div class="x4" style="overflow:hidden;padding-left:20px;">
	<div class="panel">
	<h2 class="panel-head bg3 text-white bold">家长反馈<span class="more"><a href="news.php?cid=29" class="text-white">更多</a></span></h2>
	<div class="panel-body">
		<ul class="list-text">
			<?php
			$list=$article->select("kinds=29 order by id DESC limit 8");
			foreach($list as $v){
			?>	
			<li class="item"><span style="color:#F00" >★</span><a href="show.php?cid=<?php echo $v['kinds']?>&id=<?php echo $v['id']?>"><?php echo $v['title']?></a></li>
				
			<?php
			}
			?>
		</ul>
	
	
	</div>
</div> 
</div> </div> </div> 
<?php
$ad3=$link->find("kinds=3 and descs='AD3'");
?>
<div class="container margin-bottom border padding-top" >
<div class="clearfix"></div>
<p><a href="<?php echo $ad3['url']?>"><img src="<?php echo $ad3['image']?>" width="100%" height="90" /></a></p> 
<div class="clearfix"></div>
</div>
<div class="container margin-bottom border padding-top" >
	   <h1 id="case" class="text-center  bold" style="background:url(images/case.jpg) 0  20px repeat-x;"><a href="about.php?cid=3" class="bule">
	   <span style="display:block;width:200px;margin:auto; background:#FFF;" bdsfid="1038"> 校园相册<tt class="text-little" style="padding-left:40px;" >更多</tt><br bdsfid="1040"><tt class="text-big" >Campus photo album
</tt>
</span></a></h1><br>
	  
	  <div class="blum banner" >
		  <ul class="">
			<?php
			$list=$article->select("kinds=3 order by id DESC limit 8");
			foreach($list as $v){
			?>	
			<li class="item"><a href="show.php?cid=<?php echo $v['kinds']?>&id=<?php echo $v['id']?>"><img src="<?php echo $v['pic']?>"/><?php echo $v['title']?></a></li>
				
			<?php
			}
			?>
		  </ul>
		</div>
<div class="clearfix"></div>
</div>
<div class="container margin-bottom border padding-top" >
	<div class="line  margin-top padding">
		<div class="x7" style="overflow:hidden;padding-right:20px;">
		<h2 class="panel-head bg3 text-white text-center"><a href="contact.php?cid=35" class="text-white">来校考察</a></h2>
    <div id="wrap" class="my-map ">
       <?php
		$map=$single->find("id='21'");
		echo $map['contents'];
	?>
    </div>
	
		</div>
		<div class="x5" style="overflow:hidden;">
		<h2 class="panel-head bg3 text-white text-center"><a href="contact.php?cid=36" class="text-white">联系我们 <tt class="text-small" bdsfid="1128">Contact us</tt></a></h2>
		<?php 
		$con=$single->find("kinds=36");
		?>
		  <a href="contact.php?cid=36"><img src="<?php echo $con['pic']?>" width="100%" height="300"></a>
		</div>
	</div>
	  

  </DIV>
 
 
<script src="js/scoll.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function(){
	$(".scrollleft").imgscroll({
		speed: 40,    //图片滚动速度
		amount: 0,    //图片滚动过渡时间
		width: 1,     //图片滚动步数
		dir: "left"   // "left" 或 "up" 向左或向上滚动
	});
	$(".team").imgscroll({
		speed: 40,    //图片滚动速度
		amount: 0,    //图片滚动过渡时间
		width: 1,     //图片滚动步数
		dir: "left"   // "left" 或 "up" 向左或向上滚动
	});
	$(".blum").imgscroll({
		speed: 40,    //图片滚动速度
		amount: 0,    //图片滚动过渡时间
		width: 1,     //图片滚动步数
		dir: "left"   // "left" 或 "up" 向左或向上滚动
	});
	
	
});
</script> 
<?php include_once('footer.php');?>
