<?php include_once("config/M.class.php");?>
<?php include_once("header.php");?>
<div class="admin">
   <form method="post">
    <div class="panel admin-panel">
    	<div class="panel-head"><strong>在线客服</strong></div>
        <div class="padding border-bottom">
            <input type="button" class="button button-small checkall" name="checkall" checkfor="id" value="全选" />
            <a href="online_add.php"><input type="button" class="button button-small border-green" value="添加" /></a>
            <input type="button" class="button button-small border-yellow" value="批量删除" />
        </div>
        <table class="table table-hover table-bordered">
        	<tr>
				<th width="45">选择</th>
				<th width="*">标题</th>
				<th width="200">添加时间</th>
				<th width="200">操作</th>
			</tr>
 			 <?php
            include_once('config/page.class.php');
			$qq=new M('qq');
            $result=$qq->select("id>0");
            $total=$qq->select("1","*","count");
            $pageSize=9;
            //调用pageft()，每页显示10条信息（使用默认的20时，可以省略此参数），使用本页URL（默认，所以省略掉）。
            pageft($total,$pageSize,1,0,0,3);
            $result=$qq->select(" id>0 order by id DESC   limit $firstcount,$displaypg") ;
            foreach($result as $k){
				$cid=$k['kinds'];
			$cate=new M(cate);
            $cname=$cate->find("id=$cid");
				
				
            ?>
		
			<tr>
				<td><input type="checkbox" name="id" value="<?php echo $k['id']?>" /></td>
				<td><?php echo $k['title']?></td>
				<td><?php echo date('Y-m-d H:i:s',$k['time']) ?></td>
				<td><a href="online_add.php?id=<?php echo $k['id']?>"><span class="icon-edit text-blue"></span></a> <a href="online_del.php?id=<?php echo $k['id']?>" onclick="{if(confirm('确认删除?')){return true;}return false;}"><span class="icon-trash-o text-red"></span></a>
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
<div id="mydialog">
  <div class="dialog">
    <div class="dialog-head">
      <span class="close rotate-hover"></span>
      <strong>对话框标题</strong>
    </div>
    <div class="dialog-body">
      对话框内容
    </div>
    <div class="dialog-foot">
      <button class="button dialog-close">取消</button>
      <button class="button bg-green">确认</button>
    </div>
  </div>
</div>

