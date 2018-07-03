<?php include_once("config/M.class.php");?>
<?php include_once("header.php");?>
<div class="admin">
   <form method="post">
    <div class="panel admin-panel">
    	<div class="panel-head"><strong>文章列表</strong></div>
        <div class="padding border-bottom">
            <input type="button" class="button button-small checkall" name="checkall" checkfor="id" value="全选" />
            <a href="art_add.php"><input type="button" class="button button-small border-green" value="添加文章" /></a>
            <input type="button" class="button button-small border-yellow" value="批量删除" />
            <input type="button" class="button button-small border-blue" value="回收站" />
        </div>
        <table class="table table-hover table-condensed">
        	<tr>
				<th width="45">选择</th>
				<th width="*">文章标题</th>
				<th width="120">所属分类</th>
				<th width="100">审核状态</th>
				<th width="100">操作员</th>
				<th width="100">操作</th>
			</tr>
			
 			 <?php
            include_once('config/page.class.php');
			$articles=new M('article');
            $result=$articles->select("kinds<>0");
            $total=$articles->select("1","*","count");
            $pageSize=9;
            //调用pageft()，每页显示10条信息（使用默认的20时，可以省略此参数），使用本页URL（默认，所以省略掉）。
            pageft($total,$pageSize,1,0,0,3);
            $result=$articles->select(" kinds<>0 order by id DESC   limit $firstcount,$displaypg") ;
            foreach($result as $k){
				$kinds =$k['kinds'];
				$cate=new M('cate');
				$cid=$cate->find("id=$kinds");

            ?>
		
            <tr>
				<td><input type="checkbox" name="id" value="<?php echo $k['id']?>" /></td>
				<td><?php echo $k['title']?></td>
				<td><?php echo $cid['name']?></td>
				<td><?php if($k['status']==0){echo "<span class='icon-times text-red'></span>";}else{echo "<span class='icon-check text-green'></span>";} ?></td>
				<td><?php echo $k['author']?></td>
				<td><a href="art_add.php?id=<?php echo $k['id']?>"><span class="icon-edit text-blue"></span></a> <a href="art_del.php?id=<?php echo $k['id']?>" onclick="{if(confirm('确认删除?')){return true;}return false;}"><span class="icon-trash-o text-red"></span></a>
				</td>
			</tr>
			<?php
			}
			?>
			</table>
        <div class="panel-foot text-center">
            <ul class="pagination pagination-group">
               <?php echo $pagenav?>
            </ul>
			
        </div>
    </div>
    </form>
    </div>


