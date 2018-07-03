<div class="line text-center height-big">
<?php
include_once('html/config/page.class.php');
$articles=new M('article');
$result=$articles->select("kinds=$cid");
$total=$articles->select("kinds=$cid","*","count");
$pageSize=12;
pageft($total,$pageSize,1,0,0,3);
$result=$articles->select(" kinds=$cid order by id DESC   limit $firstcount,$displaypg") ;
foreach($result as $k){
?>

	<div id="<?php if($cid==3){echo "xyxc";}else{echo "teamd";} ?>" class="x4  padding"><a href="show.php?cid=<?php echo $k['kinds']?>&id=<?php echo $k['id']?>" target="_blank" ><img src="<?php echo $k['pic']?>" class="border" /><br><?php echo $k['title']?></a></div>

<?php
}
?>
</div>        
<div class="panel-foot text-center">
	<ul class="pagination pagination-group">
	<?php echo $pagenav?>
	</ul>
</div>
