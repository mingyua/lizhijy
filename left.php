<?php
$config=NEW M("config");
$site=$config->find("id='1'");
$xl=$single->find("kinds=35");
?>

<div class="clearfix"></div>
<br> <h2 style="height:40px;line-height:40px;background:#005BAC;text-align:center;color:#FFF;">疑问解答</h2>
 <ul class="list-text" id="list"><br>
			<?php
			$list=$article->select("kinds=33 order by id DESC limit 8");
			foreach($list as $v){
			?>	
			<li class="item"><span style="color:#F00">★</span><a href="show.php?cid=<?php echo $v['kinds']?>&id=<?php echo $v['id']?>"><?php echo $v['title']?></a></li>
				
			<?php
			}
			?>

</ul>  
<div class="clearfix"></div>
<br>
 <h2 style="height:40px;line-height:40px;background:#005BAC;text-align:center;color:#FFF;">联系方式</h2>
 <ul class="list-text padding-left" id="list"><br>
	<li>联系人：<?php echo $site['site_peo']?></li>
	<li>联系电话：<?php echo $site['site_tel']?>  <?php echo $site['site_phone']?></li>
	<li>联系地址：<?php echo $site['site_addr']?></li>
	<li class='text-small'><?php echo $xl['description']?></li>
</ul>  
<div class="clearfix"></div>
<br>
 <h2 style="height:40px;line-height:40px;background:#005BAC;text-align:center;color:#FFF;">教育新闻</h2>
 <ul class="list-text" id="list"><br>
	<?php
			$list=$article->select("kinds=24 order by id DESC limit 8");
			foreach($list as $v){
			?>	
			<li><a href="show.php?cid=<?php echo $v['kinds']?>&id=<?php echo $v['id']?>"><?php echo $v['title']?></a></li>
				
			<?php
			}
			?>
</ul>  