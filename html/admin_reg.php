<?php include_once("config/M.class.php");?>
<?php include_once("header.php");?>
<div class="admin">
   <form method="post">
    <div class="panel admin-panel">
    	<div class="panel-head"><strong>管理员管理</strong></div>
        <div class="padding border-bottom">
            <input type="button" class="button button-small checkall" name="checkall" checkfor="id" value="全选" />
            <a href="admin_user_add.php"><input type="button" class="button button-small border-green" value="添加管理员" /></a>
            <input type="button" class="button button-small border-yellow" value="批量删除" />
        </div>
        <table class="table table-hover table-bordered">
        	<tr>
				<th width="45">选择</th>
				<th width="120">用户名称</th>
				<th width="*">用户类型</th>
				<th width="100">QQ账号</th>
				<th width="200">登录时间</th>
				<th width="200">注册时间</th>
				<th width="200">操作</th>
			</tr>
 			 <?php
            include_once('config/page.class.php');
			$user=new M('user');
            $result=$user->select("groups=4");
            $total=$user->select("1","*","count");
            $pageSize=9;
            //调用pageft()，每页显示10条信息（使用默认的20时，可以省略此参数），使用本页URL（默认，所以省略掉）。
            pageft($total,$pageSize,1,0,0,3);
            $result=$user->select(" groups=4 order by logintime DESC   limit $firstcount,$displaypg") ;
            foreach($result as $k){
            ?>
		
			<tr>
				<td><input type="checkbox" name="id" value="<?php echo $k['id']?>" /></td>
				<td><?php echo $k['tel']?></td>
				<td><?php if($k['groups']==1){echo "超级管理员";}else if($k['groups']==2){echo "普通管理员";}else if($k['groups']==3){echo "网站编辑";}else if($k['groups']==4){echo "注册会员";}?></td>
				<td><a  target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $k['qq']?>&site=qq&menu=yes"><img src="images/qq_blue.png"></a></td>
				<td><?php echo date('Y-m-d H:i:s',$k['logintime']) ?></td>
				<td><?php echo $k['loginip']?></td>
				<td><a href="admin_user_add.php?id=<?php echo $k['id']?>"><span class="icon-edit text-blue"></span></a> <a href="admin_user_del.php?id=<?php echo $k['id']?>" onclick="{if(confirm('确认删除?')){return true;}return false;}"><span class="icon-trash-o text-red"></span></a>
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

