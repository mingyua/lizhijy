<?php include_once("config/M.class.php");?>
<?php include_once("header.php");?>
<div class="admin">
   <form method="post">
    <div class="panel admin-panel">
    	<div class="panel-head"><strong>管理员组</strong></div>
        <div class="padding border-bottom">
            <input type="button" class="button button-small checkall" name="checkall" checkfor="id" value="全选" />
            <input type="button" class="button button-small border-yellow" value="批量删除" />
            <input type="button" class="button button-small border-blue" value="回收站" />
        </div>
        <table class="table table-hover">
        	<tr>
				<th width="*">管理组名称</th>
				<th width="100">编辑权限</th>
			</tr>
			
            <tr>
				<td>超级管理员</td>
				<td><a href="admin_group_access.php?id=1"><span class="icon-edit text-blue"></span></a> 
				</td>
			</tr>
            <tr>
				<td>普通管理员</td>
				<td><a href="admin_group_access.php?id=2"><span class="icon-edit text-blue"></span></a> 
				</td>
			</tr>
            <tr>
				<td>网站编辑</td>
				<td><a href="admin_group_access.php?id=3"><span class="icon-edit text-blue"></span></a> 
				</td>
			</tr>

			</table>
        <div class="panel-foot text-center">
            <ul class="pagination pagination-group">
            </ul>
			
        </div>
    </div>
    </form>
    </div>


