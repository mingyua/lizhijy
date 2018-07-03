<?php include_once("header.php");?>
</head>
<body>
<?php include_once('nav.php');?>
<div class="container">
<?php
$v=$article->find("id=$id");
?>
<div class="line">
	<div class="x3 margin-top " style="padding-right:20px;">
		 <div class="panel">
            <div class="panel-head bg3 text-white"><strong>相关阅读</strong></div>
				<div class="panel-body">
					<ul class="height">
					<?php
					$list=$article->select("kinds=$cid order by id DESC limit 8");
					foreach($list as $k){
					?>
						<li><span style="color:#F00">★</span><a href="show.php?cid=<?php echo $k['kinds']?>&id=<?php echo $k['id']?>"><?php echo $k['title']?></a></li>
					<?php
					}
					?>
					</ul>
				</div>
		</div>
		<div class="clearfix"></div>
		 <div class="panel margin-top margin-bottom" >
			<div class="panel-head bg3 text-white"><strong>最新资讯</strong></div>
				<div class="panel-body">
					<ul class="height">
					<?php
					$list=$article->select("kinds in(24,25,26,27,28,29) order by id DESC limit 8");
					foreach($list as $k){
					?>
						<li><a href="show.php?cid=<?php echo $k['kinds']?>&id=<?php echo $k['id']?>"><?php echo $k['title']?></a></li>
					<?php
					}
					?>
					</ul>
				</div>
		</div>
	</div>	<div class="x9" >
	
		<div class="detail padding height">
			<h1 class="bold padding-top padding-bottom"><?php echo $v['title']?></h1>
			<p class="text-center">时间：<?php echo date('Y-m-d H:i',$v['time'])?>   作者：青少年励志成长中心</p>
			<?php echo $v['contents']?>
			
		</div>
		
	</div>

</div>


<div class="clearfix"></div>
</div>
<div style="clear:both;"></div>
<?php include_once("footer.php");?>
