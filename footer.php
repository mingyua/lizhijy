<div class="layout border-top" style="background:#FFF" > 
<div class="container font14 padding-big">
<p class="flaot-right">
	<div class="bdsharebuttonbox float-right"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
	</p>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
 <?php
 $link=NEW M("link");
 $lv=$link->select("kinds=1");
 ?>
    <div class="text-left height-big">
		<span class="bold">友情链接：</span>
		<span>
<?php
foreach($lv as $v){
?>		
		<a href="<?php echo $v['url']?>"><?php echo $v['name']?></a>
<?php
}
?>		</span>
	</div>
	
	

</div>
<h2 id="footlm" class="text-center height-big text-white margin-bottom" style="background:#005BAC">
	<span><a href="about.php" class="text-white">关于我们</a>|</span>
	<span><a href="study.php" class="text-white">教育方法</a>|</span>
	<span><a href="class.php" class="text-white">学校课程</a>|</span>
	<span><a href="center.php" class="text-white">教学中心</a>|</span>
	<span><a href="case.php" class="text-white">成功案例</a>|</span>
	<span><a href="zhaos.php" class="text-white">招生详情</a>|</span>
	<span><a href="contact.php" class="text-white">来校考察</a></span>

</h2>
<?php
$config=NEW M("config");
$v=$config->find("id='1'");

?>

<div class="container">
	<div class="line">
		<div class="x12 foot">
		<?php echo $v['site_foot']?>			
			
		</div>
		
	</div>

</div>
</div>


<?php 
include_once("qq.php");
?>
<p style="display:block;" class="text-center">
<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1254865255'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1254865255%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
</p>

</body>
</html>