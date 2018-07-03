<?php include_once("header.php");?>
<body>
<script type="text/javascript">
$(function(){
$(".subNav").click(function(){
			$(this).toggleClass("currentDd").siblings(".subNav").removeClass("currentDd")
			$(this).toggleClass("currentDt").siblings(".subNav").removeClass("currentDt")
			
			// 修改数字控制速度， slideUp(500)控制卷起速度
			$(this).next(".navContent").slideToggle(500).siblings(".navContent").slideUp(500);
	})	
})
</script>
<div class="nav nav-inline admin-nav">
	<div class="subNav currentDd currentDt icon-home">核心设置</div>
	<ul class="navContent">
			<li><a href="admin.php" target="main">后台首页</a></li>
			<li><a href="systemsetting.php" target="main">系统设置</a></li>
			<li><a href="main_class.php" target="main">分类管理</a></li>
			<li><a href="admin_pwd.php" target="main">密码修改</a></li>
	</ul>
	<div class="subNav icon-file-text">文章管理</div>
	<ul class="navContent">
			<li><a href="articles.php" target="main">文章列表</a></li>
			<li><a href="single.php" target="main">单页文章</a></li>
	</ul>
	<div class="subNav icon-shopping-cart hidden">财务管理</div>
	<ul class="navContent hidden">
			<li><a href="#" target="main"></a></li>
	</ul>
	<div class="subNav icon-user hidden" >会员管理</div>
	<ul class="navContent hidden">
			<li><a href="admin_user.php" target="main">管理员</a></li>
			<li><a href="admin_reg.php" target="main">注册会员</a></li>
			<li><a href="admin_shoper.php" target="main">商家管理</a></li>
	</ul>
	<div class="subNav icon-user icon-envelope ">留言管理</div>
	<ul class="navContent hidden">
			<li><a href="message.php" target="main">留言列表</a></li>
			<li><a href="apply.php" target="main">申请列表</a></li>
	</ul>
	<div class="subNav icon-user icon-picture-o">模型管理</div>
	<ul class="navContent">
			<li><a href="slide.php" target="main">幻灯片管理</a></li>
			<li><a href="link.php" target="main">友情管理</a></li>
			<li><a href="online.php" target="main">在线客服</a></li>
	</ul>
	<div class="subNav icon-user icon-picture-o"> 图片空间</div>
	<ul class="navContent">
			<li><a href="picture.php" target="main">图片列表</a></li>
	</ul>
	<div class="subNav hidden icon-user icon-unlock-alt">权限管理</div>
	<ul class="navContent hidden">
			<li><a href="admin_group.php" target="main">管理员组</a></li>
	</ul>	
	<div class="subNav icon-user icon-unlock-alt">手机站</div>
	<ul class="navContent">
			<li><a href="http://m.qsn580.com/menage/index" target="main">管理</a></li>
	</ul>	</div>
