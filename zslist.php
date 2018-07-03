<div class="line height-big">

<ul class="list-text">
<?php
include_once('html/config/page.class.php');
$articles=new M('article');
$result=$articles->select("kinds=$cid");
$total=$articles->select("kinds=$cid","*","count");
$pageSize=26;
pageft($total,$pageSize,1,0,0,3);
$result=$articles->select(" kinds=$cid order by id DESC   limit $firstcount,$displaypg") ;
foreach($result as $k){
?>

	<li><span class="date"><?php echo date('Y-m-d H:i',$k['time']) ?></span><a href="show.php?cid=<?php echo $k['kinds']?>&id=<?php echo $k['id']?>" target="_blank" ><?php echo $k['title']?></a></li>

<?php
}
?>
</ul>  
</div>      
<div class="panel-foot text-center">
	<ul class="pagination pagination-group">
	<?php echo $pagenav?>
	</ul>
</div>
