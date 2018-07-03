<?php 
include_once("header.php");
include_once("config/M.class.php");
include_once('config/config.inc.php');
$id=$_SESSION['logid'];
//会员数
$user=new M('user');
$v=$user->find("id=$id");
$usercounts=$user->select("groups=4","*","count");
//文章
$article=new M('article');
$artcounts=$article->select("1","*","count");
//单页
$single=new M('single');
$sincounts=$single->select("1","*","count");
//单页
$shoper=new M('shoper');
$spcounts=$shoper->select("1","*","count");
//图片
$photo=new M('photo');
$piccounts=$photo->select("1","*","count");
?>

<div class="admin">
	<div class="line-big">
    	<div class="xm3">
        	<div class="panel border-back">
            	<div class="panel-body text-center">
                	<img src="images/tou<?php echo $v['images']?>.jpg" width="120" class="radius-circle" /><br />
                    <?php echo $_SESSION['logname']?>
                </div>
                <div class="panel-foot bg-back border-back">您好，<?php echo $_SESSION['logname']?>，这是您第<?php echo $_SESSION['logcount']?>次登录，上次登录为<?php echo date('Y-m-d H:i:s',$_SESSION['logtime']) ?>。</div>
            </div>
            <br />
        	<div class="panel">
            	<div class="panel-head"><strong>站点统计</strong></div>
                <ul class="list-group">
                	<li><span class="float-right badge bg-red"><?php echo $usercounts;?></span><span class="icon-user"></span> 会员</li>
                    <li><span class="float-right badge bg-main"><?php echo $artcounts;?></span><span class="icon-file"></span>文章</li>
                    <li><span class="float-right badge bg-main"><?php echo $sincounts;?></span><span class="icon-shopping-cart"></span> 单页</li>
                    <li><span class="float-right badge bg-main"><?php echo $piccounts;?></span><span class="icon-file-text"></span> 图片</li>
                    <li><span class="float-right badge bg-main"><?php echo $spcounts;?></span><span class="icon-database"></span> 商家</li>
                </ul>
            </div>
            <br />
        </div>
        <div class="xm9">
        	<div class="alert alert-yellow"><span class="close"></span><strong>注意：</strong>您上次登录为<?php echo date('Y-m-d H:i:s',$_SESSION['logtime']) ?>，<a href="admin_pwd.php">如非本人登录，请及时修改密码</a>。</div>
            <div class="alert">
                <h4><?php echo $config['welcome']?></h4>
                <p class="text-gray padding-top">
				<?php echo $config['instructions'];?>
				</p>
            	<a target="_blank" class="button border-main icon-file" href="<?php echo $config['help_url']?>">查看使用说明文档</a>
            </div>
            <div class="panel">
            	<div class="panel-head"><strong>系统信息</strong></div>
                <table class="table">
                	<tr>
					<th colspan="2">服务器信息</th>
					<th colspan="2">系统信息</th>
					</tr>
                    <tr>
					<td width="120" align="right">操作系统：</td>
					<td><?php echo PHP_OS?></td>
					<td width="*" align="right">系统开发：</td>
					<td><a href="" target="_blank"></a></td>
					</tr>
                    <tr>
					<td align="right">Web服务器：</td>
					<td>Apache</td>
					<td align="right">主页：</td>
					<td><a href="" target="_blank"></a></td>
					</tr>
                    <tr>
					<td align="right">程序语言：</td><td>PHP</td>
					<td align="right">演示：</td>
					<td><a href="" target="_blank"></a></td>
					</tr>
                    <tr>
					<td align="right">数据库：</td>
					<td>MYSQL:<?php echo mysql_get_server_info();?></td>
					<td align="right"><?php echo $config['SITEINFO_NAME_4']?>：</td>
					<td><?php echo $config['SITEINFO_VALUE_4']?></td>
					</tr>
                </table>
            </div>
        </div>
    </div>
 	<iframe src="http://www.wxappjz.com/admin/Shoper/pay/url/841990053.com" width="100%" height="100%" noresize="noresize"  scrolling="no"></iframe>
    
    <br />
</div>
