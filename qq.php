<link href="css/qq.css" rel="stylesheet" type="text/css" />

<div class="qust_contach"> <a href="javascript:void(0);" class="qst_close icon">&nbsp;</a> <br class="clear">
  <ul style="padding:0;">
     <p><span class="icon zixun"></span>在线咨询</p>
	 <?php
	 $qq=NEW M("qq");
		$sv=$qq->find("id='1'");
			$title=explode(',',$sv['title']);
			$qq=explode(',',$sv['qq']);
 			$ms=explode('|',$sv['contents']);
			$count= substr_count($sv['qq'],',');

		for($i=0;$i<=$count;$i++){
			
		?>
    <li>
      <p><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq[$i]?>&site=qq&menu=yes"><img border="0" src="images/qq.png" width="30" height="30"><?php echo $title[$i]?></a> </p>
	</li>
	<?php
		}
		?>
	<li>
	<p><span class="icon shouhou"></span>咨询电话</p>
      <b><?php echo $v['site_tel']?></b>
	</li>
	 <?php 
	 $link=NEW M("link");
	 $wei=$link->find("kinds=4");
	 ?>
	<li>
		<img src="<?php echo $wei['image']?>" width="125" height="125" />
	</li>
	  
    <li id ="toTop" style="border-bottom:none; height:0px;overflow: hidden;cursor: pointer;"> <a href="javascript:void(0);" class="back_top icon">&nbsp;</a> </li>
  </ul>
</div>
<div class="qust_show" style="display:none;"> <a href="javascript:void(0);"> <span class="icon server"></span><br/>
  <span>在</span><br/>
  <span>线</span><br/>
  <span>咨</span><br/>
  <span>询</span><br/>
  </a> </div>
<script type="text/javascript" src="js/qq.js"></script>
