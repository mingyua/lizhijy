 <?php
$adTOP=$link->find("kinds=3 and descs='ADtop'");
?>
<p style="margin:0;padding:0;text-align:center;"><a href="<?php echo $adTOP['url']?>" class="text-center" style="margin:auto;width:100%;max-width:1920px;"><img src="<?php echo $adTOP['image']?>" class="text-center" style="margin:auto" /></a> </p>
<div class="container-layout  padding-big-top">
 <div class="container">

<div class="clearfix"></div>
 
    <div class="line">
      <div class="xs7 xm6 xb7">
        <a href="index.php"><img src="<?php echo $v['logo']?>" alt="<?php echo $v['site_title']?>" /></a>
        </div>
      <div class="xs5 xm6 xb5">
		<?php
		$tel=$link->find("kinds=3 and descs='tel'");
		?>
	   <dl class="float-right" style="background:url(<?php echo $tel['image']?>); height:108px;width:232px;"></dl>
      </div>
    </div>
  </div>
</div>
<div id="navers" class="container-layout">
  <div class="container" style="background:none">
    <ul class="nav nav-menu nav-inline">
      <li class="act">
        <a href="index.php">首页</a>
      </li>
	  <span></span>
      <li class="">
        <a href="about.php" >关于我们</a>
		<ul>
			<?php
			$cate=new M("cate");
			$val=$cate->select("pid='1' and window='1'");
			foreach($val as $v){
			?>
                <li class=""><a href="about.php?cid=<?php echo $v['id']?>"><?php echo $v['name']?></a></li>
 			<?php	
			}
			?>
		</ul>
      </li><span></span>
      <li class="">
        <a href="study.php">教育方法</a>
		<ul>
			<?php
			$val=$cate->select("pid='7' and window='1'");
			foreach($val as $v){
			?>
                <li class=""><a href="study.php?cid=<?php echo $v['id']?>"><?php echo $v['name']?></a></li>
 			<?php	
			}
			?>
		</ul>
      </li><span></span>
      <li class="">
        <a href="class.php" >相关课程</a>
		<ul>
			<?php
			$val=$cate->select("pid='12' and window='1'");
			foreach($val as $v){
			?>
                <li class=""><a href="class.php?cid=<?php echo $v['id']?>"><?php echo $v['name']?></a></li>
 			<?php	
			}
			?>
		</ul>
      </li><span></span>
      <li class="">
        <a href="center.php" >教学中心</a>
		<ul>
			<?php
			$val=$cate->select("pid='15' and window='1'");
			foreach($val as $v){
			?>
                <li class=""><a href="center.php?cid=<?php echo $v['id']?>"><?php echo $v['name']?></a></li>
 			<?php	
			}
			?>
		</ul>
      </li><span></span>
      <li class="">
        <a href="case.php">成功案例</a>
		<ul>
			<?php
			$val=$cate->select("pid='18' and window='1'");
			foreach($val as $v){
			?>
                <li class=""><a href="case.php?cid=<?php echo $v['id']?>"><?php echo $v['name']?></a></li>
 			<?php	
			}
			?>
		</ul>
      </li><span></span>
	  <li class="">
        <a href="news.php" >教育新闻</a>
		<ul>
			<?php
			$val=$cate->select("pid='23' and window='1'");
			foreach($val as $v){
			?>
                <li class=""><a href="news.php?cid=<?php echo $v['id']?>"><?php echo $v['name']?></a></li>
 			<?php	
			}
			?>
		</ul>
      </li><span></span>
	  <li class="">
        <a href="zhaos.php" >招生详情</a>
		<ul>
			<?php
			$val=$cate->select("pid='30' and window='1'");
			foreach($val as $v){
			?>
                <li class=""><a href="zhaos.php?cid=<?php echo $v['id']?>"><?php echo $v['name']?></a></li>
 			<?php	
			}
			?>
		</ul>
      </li><span></span>
	  <li class="">
        <a href="contact.php" >来校考察</a>
		<ul>
			<?php
			$val=$cate->select("pid='34' and window='1'");
			foreach($val as $v){
			?>
                <li class=""><a href="contact.php?cid=<?php echo $v['id']?>"><?php echo $v['name']?></a></li>
 			<?php	
			}
			?>
		</ul>
      </li><span></span>
	  
	  
	  
    </ul>
  </div>
</div>
</div>