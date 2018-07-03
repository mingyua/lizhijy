<?php include_once("config/M.class.php");?>
<?php include_once("header.php");?>
<div class="admin">
   <form method="post">
    <div class="panel admin-panel">
    	<div class="panel-head"><strong>分类管理</strong></div>
        <div class="padding border-bottom">
            <input type="button" class="button button-small checkall" name="checkall" checkfor="id" value="全选" />
            <a href="main_class_add.php"><input type="button" class="button button-small border-green" value="添加分类" /></a>
            <input type="button" class="button button-small border-yellow" value="批量删除" />
            <input type="button" class="button button-small border-blue" value="回收站" />
        </div>
        <table class="table table-hover">
        	<tr>
				<th width="45">选择</th>
				<th width="60">ID</th>
				<th width="*">分类名称</th>
				<th width="">链接地址</th>
				<th width="100">所属类型</th>
				<th width="100">操作</th>
			</tr>
			
 			 <?php
            include_once('config/Cate.class.php');
			$cate=new M('cate');
            $result=$cate->select("id>0 order by sort DESC ");
			$Cate=Cate::unlimitedForlevel($result,'&nbsp;&nbsp;┗━');

            foreach($Cate as $k){
            ?>
		
            <tr>
				<td><input type="checkbox" name="id" value="<?php echo $k['id']?>" /></td>
				<td><?php echo $k['id']?></td>
				<td><?php echo $k['html'].$k['name']?></td><td><?php echo $k['url']?></td>
				<td><?php if($k['module']=="nav"){ echo "导航";}elseif($k['module']=="list"){ echo "列表";}elseif($k['module']=="single"){ echo "单页";}elseif($k['module']=="slide"){ echo "幻灯片";}?></td>
				<td><a href="main_class_add.php?id=<?php echo $k['id']?>"><span class="icon-edit text-blue"></span></a> <a href="main_class_del.php?id=<?php echo $k['id']?>" onclick="{if(confirm('确认删除?')){return true;}return false;}"><span class="icon-trash-o text-red"></span></a>
				</td>
			</tr>
			<?php
			}
			?>
			</table>
    </div>
    </form>
    </div>


