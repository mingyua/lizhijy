<?php include_once("config/M.class.php");?>
<?php include_once("header.php");?>
<div class="admin">
   <form method="post">
    <div class="panel admin-panel">
    	<div class="panel-head"><strong>商家管理</strong></div>
        <div class="padding border-bottom">
            <input type="button" class="button button-small checkall" name="checkall" checkfor="id" value="全选" />
            <a href="../record.php" target="_blank"><input type="button" class="button button-small border-green" value="添加商家" /></a>
            <input type="button" class="button button-small border-yellow" value="批量删除" />
        </div>
        <table class="table table-hover table-bordered">
        	<tr>
				<th width="45">选择</th>
				<th width="*">商家名称</th>
				<th width="80">商家类型</th>
				<th width="100">联系电话</th>
				<th width="80">发布借款</th>
				<th width="80">借款总额</th>
				<th width="80">认证状态</th>
				<th width="200"> 添加时间</th>
				<th width="200">操作</th>
			</tr>
 			 <?php
            include_once('config/page.class.php');
			$shoper=new M('shoper');
            $result=$shoper->select("id>0");
            $total=$shoper->select("1","*","count");
            $pageSize=9;
            //调用pageft()，每页显示10条信息（使用默认的20时，可以省略此参数），使用本页URL（默认，所以省略掉）。
            pageft($total,$pageSize,1,0,0,3);
            $result=$shoper->select(" id>0 order by id DESC   limit $firstcount,$displaypg") ;
            foreach($result as $k){
            ?>
		
			<tr>
				<td><input type="checkbox" name="id" value="<?php echo $k['id']?>" /></td>
				<td><?php echo $k['name']?></td>
				<td><?php if($k['kinds']==0){echo "企业";}else{echo "个人";} ?></td>
				<td><?php echo $k['tel']?></td>
				<td><?php echo $k['b_a']?>次</td>
				<td><?php echo $k['b_f']?>万</td>
				<td><?php if($k['status']==0){echo "未审核";}else{echo "已审核";} ?></td>
				<td><?php echo date('Y-m-d H:i:s',$k['time'])?></td>
				<td><a href="admin_shoper_add.php?id=<?php echo $k['id']?>"><span class="icon-edit text-blue"></span></a> <a href="admin_shoper_del.php?id=<?php echo $k['id']?>" onclick="{if(confirm('确认删除?')){return true;}return false;}"><span class="icon-trash-o text-red"></span></a>
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

