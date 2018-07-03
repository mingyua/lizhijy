<?php include_once("config/M.class.php");?>
<?php include_once("header.php");?>
<?php include_once('../table/json.php');?>
<script type="text/javascript" src="../table/js/edit-plugin.js"></script>
<script type="text/javascript" src="../table/js/jquery.jeditable.mini.js"></script>
<script type="text/javascript" src="../table/js/jquery-ui.js"></script>
		<link rel="stylesheet" href="../uploadimg/themes/default/default.css" />
		<script src="../uploadimg/kindeditor.js"></script>
		<script src="../uploadimg/lang/zh_CN.js"></script>
<?php include_once("../imgjs.php");?>
<?php
$id=isset($_GET['id'])?$_GET['id']:"";

$query=NEW M("shoper");
$shoper=$query->find("id=$id");
$rs=$query->find("id=$id");
$id=$rs['id'];
$uids=$rs['uid'];
$kinds=$rs['kinds'];
$name=$rs['name'];
if($rs['sex']==1){$sex="男";}elseif($rs['sex']==2){$sex="女";};
$age=$rs['age'];
$card=$rs['card'];
$tel=$rs['tel'];
$phone=$rs['phone'];
$fax=$rs['fax'];
$email=$rs['email'];
$q_peo=$rs['q_peo'];
$q_x=$rs['q_x'];
$q_h=$rs['q_h'];
$q_time=date('Y-m-d',$rs['q_time']);
$q_money=$rs['q_money'];


if($rs['q_peocount']==0){$q_peocount="少于50人";}elseif($rs['q_peocount']==1){$q_peocount="50~200人";}elseif($rs['q_peocount']==2){$q_peocount="200~1000人";}elseif($rs['q_peocount']==3){$q_peocount="1000人以上";};



$q_addr=$rs['q_addr'];
$q_url=$rs['q_url'];

if($rs['marrage']==1){$marrage="已婚";}elseif($rs['marrage']==2){$marrage="未婚";}elseif($rs['marrage']==3){$marrage="其它";};


if($rs['income']==0){$income="1万以内";}elseif($rs['income']==1){$income="1-5万";}elseif($rs['income']==2){$income="5-10万";}elseif($rs['income']==3){$income="10万以上";};


if($rs['child']==0){$child="无";}elseif($rs['child']==1){$child="有";};


if($rs['worktime']==0){$worktime="1年以内";}elseif($rs['worktime']==1){$worktime="1-5年";}elseif($rs['study']==2){$worktime="5-10年";}elseif($rs['study']==3){$worktime="10年以上";};

if($rs['study']==0){$study="初中以下";}elseif($rs['study']==1){$study="高中";}elseif($rs['study']==2){$study="本科";}elseif($rs['study']==3){$study="本科以上";};


$worker=$rs['worker'];
$homecity=$rs['homecity'];
$workcity=$rs['workcity'];
$b_a=$rs['b_a'];
$b_b=$rs['b_b'];
$b_c=$rs['b_c'];
$b_d=$rs['b_d'];
$b_e=$rs['b_e'];
$b_f=$rs['b_f'];
$b_g=$rs['b_g'];
$b_h=$rs['b_h'];
$b_i=$rs['b_i'];
$imga=$rs['imga'];
$imgb=$rs['imgb'];
$imgc=$rs['imgc'];
$imgd=$rs['imgd'];
$imge=$rs['imge'];
$imgf=$rs['imgf'];
$imgg=$rs['imgg'];
$imgh=$rs['imgh'];
$ms=$rs['ms'];
$status=$rs['status'];
$time=$rs['time'];
?>
<script type="text/javascript">
$(function(){
	 $('.edit').editable('../table/save.php', { 
		 width     :160,
		 height    :26,
		 onblur    : "ignore",
         cancel    : '取消',
         submit    : '确定',
         indicator : '<img src="../table/css/loader.gif">',
         tooltip   : '单击可以编辑...',
		 callback  : function(value, settings) {
			 $("#modifiedtime").html("刚刚");
         }

     });
	 $('.edit_sex').editable('../table/save.php', { 
		 data      : '<?php echo json_encode($arr_sex); ?>',
		 type      : "select",
		 cancel    : '取消',
         submit    : '确定',
         indicator : '<img src="../table/css/loader.gif">',
         tooltip   : '单击可以编辑...',
		 style     : 'display: inline;padding:3px;'
	 });
	 $('.edit_marrage').editable('../table/save.php', { 
		 data      : '<?php echo json_encode($arr_marr); ?>',
		 type      : "select",
		 cancel    : '取消',
         submit    : '确定',
         indicator : '<img src="../table/css/loader.gif">',
         tooltip   : '单击可以编辑...',
		 style     : 'display: inline;padding:3px;'
	 });
	 $('.edit_study').editable('../table/save.php', { 
		 data     : '<?php echo json_encode($arr_study); ?>',
		 type      : "select",
		 cancel    : '取消',
         submit    : '确定',
         indicator : '<img src="../table/css/loader.gif">',
         tooltip   : '单击可以编辑...',
		 style     : 'display: inline;padding:3px;'
	 });
	 $('.edit_income').editable('../table/save.php', { 
		 data     : '<?php echo json_encode($arr_income); ?>',
		 type      : "select",
		 cancel    : '取消',
         submit    : '确定',
         indicator : '<img src="../table/css/loader.gif">',
         tooltip   : '单击可以编辑...',
		 style     : 'display: inline;padding:3px;'
	 });
	 $('.edit_wt').editable('../table/save.php', { 
		 data     : '<?php echo json_encode($arr_wt); ?>',
		 type      : "select",
		 cancel    : '取消',
         submit    : '确定',
         indicator : '<img src="../table/css/loader.gif">',
         tooltip   : '单击可以编辑...',
		 style     : 'display: inline;padding:3px;'
	 });
	 $('.edit_ch').editable('../table/save.php', { 
		 data     : '<?php echo json_encode($arr_ch); ?>',
		 type      : "select",
		 cancel    : '取消',
         submit    : '确定',
         indicator : '<img src="../table/css/loader.gif">',
         tooltip   : '单击可以编辑...',
		 style     : 'display: inline;padding:3px;'
	 });
	 
	 $('.edit_peo').editable('../table/save.php', { 
		 data     : '<?php echo json_encode($arr_peo); ?>',
		 type      : "select",
		 cancel    : '取消',
         submit    : '确定',
         indicator : '<img src="../table/css/loader.gif">',
         tooltip   : '单击可以编辑...',
		 style     : 'display: inline;padding:3px;'
	 });
	 $(".datepicker").editable('../table/save.php', { 
		 width     : 120,
		 type      : 'datepicker',
		 onblur    : "ignore",
		 cancel    : '取消',
         submit    : '确定',
         indicator : '<img src="../table/css/loader.gif">',
         tooltip   : '单击可以编辑...',
		 style     : 'display: inline'
	 });
	 $(".textarea").editable('../table/save.php', { 
		 type      : 'textarea',
		 rows      : 6,
		 cols      : 120,
		 onblur    : "ignore",
		 cancel    : '取消',
         submit    : '确定',
         indicator : '<img src="../../table/css/loader.gif">'
	 });	 
});
//调用jquery ui的datepicker日历插件
$.editable.addInputType('datepicker', {
    element : function(settings, original) {
        var input = $('<input class="input" />');
		input.attr("readonly","readonly");
        $(this).append(input);
        return(input);
    },
    plugin : function(settings, original) {
		var form = this;
		$("input",this).datepicker();
    }
});
</script>
<style>
.bookico img{width:200px;height:200px;}
</style>
<div class="admin">
<?php 
if($kinds==1){
?>
<div class="tab">
  <div class="tab-head">
    <ul class="tab-nav">
      <li class="active"><a href="#tab-start">客户基本信息</a></li>
      <li><a href="#tab-css">证件信息</a></li>
  </ul>
  </div>
  <div class="tab-body">
    <div class="tab-panel active" id="tab-start">

 <div class="msg"><strong>提示</strong>：点击表格中字段对应的内容即可进行在线编辑。</div>
<table class="table">
  <thead>
    <tr class="table_title">
      <td colspan="4"><span class="open"></span>客户信息</td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td width="20%" class="table_label">用户名</td>
      <td width="30%" class="edit" id="name-<?php echo $id; ?>"><?php echo $name; ?></td>
      <td width="20%" class="table_label">性别</td>
      <td width="30%" class="edit_sex" id="sex-<?php echo $id; ?>"><?php echo $sex; ?></td>
    </tr>
    <tr>
      <td class="table_label">年龄</td>
      <td class="edit" id="age-<?php echo $id; ?>"><?php echo $age; ?></td>
      <td class="table_label">身份证号码</td>
      <td class="edit" id="card-<?php echo $id; ?>"><?php echo $card; ?></td>
    </tr>
    <tr>
      <td class="table_label">婚姻状况</td>
      <td class="edit_marrage" id="marrage-<?php echo $id; ?>"><?php echo $marrage; ?></td>
      <td class="table_label">有无子女</td>
      <td class="edit_ch" id="child-<?php echo $id; ?>"><?php echo $child; ?></td>
    </tr>
    <tr>
      <td class="table_label">文化程度</td>
      <td class="edit_study" id="study-<?php echo $id; ?>"><?php echo $study; ?></td>
      <td class="table_label">户口所在地</td>
      <td class="edit" id="homecity-<?php echo $id; ?>"><?php echo $homecity; ?></td>
    </tr>
    <tr>
      <td class="table_label">收入范围</td>
      <td class="edit_income" id="income-<?php echo $id; ?>"><?php echo $income; ?></td>
      <td class="table_label">工作年限</td>
      <td class="edit_wt" id="worktime-<?php echo $id; ?>"><?php echo $worktime; ?></td>
    </tr>
    <tr>
      <td class="table_label">岗位职位</td>
      <td class="edit" id="worker-<?php echo $id; ?>"><?php echo $worker; ?></td>
      <td class="table_label">工作城市</td>
      <td class="edit" id="workcity-<?php echo $id; ?>"><?php echo $workcity; ?></td>
    </tr>
	
    <tr>
      <td class="table_label">发布借款</td>
      <td class="edit" id="b_a-<?php echo $id; ?>"><?php echo $b_a; ?></td>
      <td class="table_label">逾期次数</td>
      <td class="edit" id="b_b-<?php echo $id; ?>"><?php echo $b_b; ?></td>
    </tr>
    <tr>
      <td class="table_label">借款总额</td>
      <td class="edit" id="b_c-<?php echo $id; ?>"><?php echo $b_c; ?></td>
      <td class="table_label">成功借款</td>
      <td class="edit" id="b_d-<?php echo $id; ?>"><?php echo $b_d; ?></td>
    </tr>
    <tr>
      <td class="table_label">逾期已还</td>
      <td class="edit" id="b_e-<?php echo $id; ?>"><?php echo $b_e; ?></td>
      <td class="table_label">逾期金额</td>
      <td class="edit" id="b_f-<?php echo $id; ?>"><?php echo $b_f; ?></td>
    </tr>
    <tr>
      <td class="table_label">还清笔数</td>
      <td class="edit" id="b_g-<?php echo $id; ?>"><?php echo $b_g; ?></td>
      <td class="table_label">逾期未还</td>
      <td class="edit" id="b_h-<?php echo $id; ?>"><?php echo $b_h; ?></td>
    </tr>
    <tr>
      <td class="table_label">待还本息</td>
      <td class="edit" colspan="3" id="b_i-<?php echo $id; ?>"><?php echo $b_i; ?></td>

	  </tr>	
	
    <tr>
      <td class="table_label">简介</td>
      <td class="textarea" id="ms-<?php echo $id; ?>" colspan="3"><?php echo $ms; ?></td>
    </tr>
  </tbody>
</table>
</div>
	
	
    <div class="tab-panel" id="tab-css">
		<form class="form form-block margin-bottom" method="post" >
 <table class="table">
 <tr>
 <td>
   <div class="form-group">
   <div class="bookico"><div class="sfz"><?php if($shoper['imga']){?><img src="<?php echo $shoper['imga']?>" /><?php }else{echo "";}?></div></div>
   <div class="label"><label for="card">身份证扫描件（正反两面）</label></div>
   	<div class="clear"></div>
    <div class="field">
	<input type="hidden" id="url1" name="imga" value="<?php echo $shoper['imga']?>"  data-validate="required:必须上传" /> <input type="button" class="button input-file" id="image1" value="立即添加" />
    </div>
  </div> 
 </td><td>
 <div class="form-group">
 <div class="bookico"><div class="juz"><?php if($shoper['imgb']){?><img src="<?php echo $shoper['imgb']?>" /><?php }else{echo "";}?></div></div>
    <div class="label"><label for="upfile">现居住地证明文件（租房合同及近一个月水电费账单）</label></div>
	<div class="clear"></div>
    <div class="field">
	<input type="hidden" id="url2" name="imgb" value="<?php echo $shoper['imgb']?>"  data-validate="required:必须上传" /> <input type="button" class="button input-file" id="image2" value="立即添加" />
    </div>
  </div> 
 </td><td>
 <div class="form-group">
 <div class="bookico"><div class="yzbg"><?php if($shoper['imgc']){?><img src="<?php echo $shoper['imgc']?>" /><?php }else{echo "";}?> </div></div>
    <div class="label"><label for="upfile">验资报告扫描件（行车、房产证明）</label></div>
	<div class="clear"></div>
    <div class="field">
	<input type="hidden" id="url3" name="imgc" value="<?php echo $shoper['imgc']?>"  data-validate="required:必须上传" /> <input type="button" class="button input-file" id="image3" value="立即添加" />
    </div>
  </div> 
 </td>
 </tr>
 <tr>
 <td>
 <div class="form-group">
 <div class="bookico"><div class="lszd"><?php if($shoper['imgd']){?><img src="<?php echo $shoper['imgd']?>" /><?php }else{echo "";}?></div></div>
    <div class="label"><label for="upfile">近6个月企业对公流水或个人流水</label></div>
	<div class="clear"></div>
    <div class="field">
	<input type="hidden" id="url4" name="imgd" value="<?php echo $shoper['imgd']?>" /> <input type="button" class="button input-file" id="image4" value="立即添加" />
    </div>
  </div> 
 </td>
 <td>
 <div class="form-group">
 <div class="bookico"><div class="xingy"><?php if($shoper['imge']){?><img src="<?php echo $shoper['imge']?>" /><?php }else{echo "";}?></div></div>
    <div class="label"><label for="upfile">近一个月个人信用报告</label></div>
	<div class="clear"></div>
    <div class="field">
	<input type="hidden" id="url5" name="imge" value="<?php echo $shoper['imge']?>" /> <input type="button" class="button input-file" id="image5" value="立即添加" />
    </div>
  </div> 
 </td><td>
 <div class="form-group">
 <div class="bookico"><div class="yyzz"><?php if($shoper['imgf']){?><img src="<?php echo $shoper['imgf']?>" /><?php }else{echo "";}?></div></div>
    <div class="label"><label for="upfile">营业执照副本扫描件</label></div>
	<div class="clear"></div>
    <div class="field">
	<input type="hidden" id="url6" name="imgf" value="<?php echo $shoper['imgf']?>" /> <input type="button" class="button input-file" id="image6" value="立即添加" />
    </div>
  </div> 
 </td>
 </tr>
 <tr>
 <td></td>
 <td>
  <div class="form-group">
    <div class="label"><label for="status">审核状态</label></div>
	<div class="clear"></div>
    <div class="field">
       <input type="radio" value="0" name="status" <?php if($v['status']==0){echo "checked='checked'";} ?> />未审核
       <input type="radio" value="1" name="status" <?php if($v['status']==1){echo "checked='checked'";} ?> />已审核
	
    </div>
  </div> 

 </td>
 </tr>
 </table>
 <hr>

  <div class="form-button text-center"><input class="button bg-blue" type="submit" name="submit" value="立即提交"></div>
</form>
<?php
if(!empty($_POST['submit'])){
	
	$data=$query->update(
						"id='$id'",
						"
						imga='$_POST[imga]',
						imgb='$_POST[imgb]',
						imgc='$_POST[imgc]',
						imgd='$_POST[imgd]',
						imge='$_POST[imge]',
						imgf='$_POST[imgf]',
						status='$_POST[status]'
						"						
						);
		if($data){
				echo "<script>alert('修改成功！');location.href='admin_shoper.php'</script>";
		}else{
				echo "<script>alert('修改失败！');location.href='admin_shoper.php'</script>";
			
		} 
}
?>
	
	</div>
  </div>
</div>
<?php
}else{
?>	
<div class="tab">
  <div class="tab-head">
    <ul class="tab-nav">
      <li class="active"><a href="#tab-start">客户基本信息</a></li>
      <li><a href="#tab-css">证件信息</a></li>
  </ul>
  </div>
  <div class="tab-body">
    <div class="tab-panel active" id="tab-start">

 <div class="msg"><strong>提示</strong>：点击表格中字段对应的内容即可进行在线编辑。</div>
<table class="table">
  <thead>
    <tr class="table_title">
      <td colspan="4"><span class="open"></span>客户信息</td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td width="20%" class="table_label">企业名称</td>
      <td width="30%" class="edit" id="name-<?php echo $id;?>"><?php echo $name; ?></td>
      <td width="20%" class="table_label">所属行业</td>
      <td width="30%" class="edit" id="q_h-<?php echo $id; ?>"><?php echo $q_h; ?></td>
    </tr>
    <tr>
      <td class="table_label">企业性质</td>
      <td class="edit" id="q_x-<?php echo $id; ?>"><?php echo $q_x; ?></td>
      <td class="table_label">成立日期</td>
      <td class="datepicker" id="q_time-<?php echo $id; ?>"><?php echo $q_time; ?></td>
    </tr>
    <tr>
      <td class="table_label">注册资金</td>
      <td class="edit" id="q_money-<?php echo $id; ?>"><?php echo $q_money; ?></td>
      <td class="table_label">员工人数</td>
      <td class="edit_peo" id="q_peocount-<?php echo $id; ?>"><?php echo $q_peocount; ?></td>
    </tr>
    <tr>
      <td class="table_label">企业网站</td>
      <td class="edit" id="q_url-<?php echo $id; ?>"><?php echo $q_url; ?></td>
      <td class="table_label">联系人</td>
      <td class="edit" id="q_peo-<?php echo $id; ?>"><?php echo $q_peo; ?></td>
    </tr>
    <tr>
      <td class="table_label">联系人身份证号</td>
      <td class="edit" id="card-<?php echo $id; ?>"><?php echo $card; ?></td>
      <td class="table_label">手机号码</td>
      <td class="edit" id="tel-<?php echo $id; ?>"><?php echo $tel; ?></td>
    </tr>
    <tr>
      <td class="table_label">联系电话</td>
      <td class="edit" id="phone-<?php echo $id; ?>"><?php echo $phone; ?></td>
      <td class="table_label">传真</td>
      <td class="edit" id="fax-<?php echo $id; ?>"><?php echo $fax; ?></td>
    </tr>
	
    <tr>
      <td class="table_label">电子邮箱</td>
      <td class="edit" id="email-<?php echo $id; ?>"><?php echo $email; ?></td>
      <td class="table_label">通讯地址</td>
      <td class="edit" id="q_addr-<?php echo $id; ?>"><?php echo $q_addr; ?></td>
    </tr>
    <tr>
      <td class="table_label">企业简介</td>
      <td class="textarea" id="ms-<?php echo $id; ?>" colspan="3"><?php echo $ms; ?></td>
    </tr>
  </tbody>
</table>
</div>
	
	
    <div class="tab-panel" id="tab-css">
		<form class="form form-block margin-bottom" id="record" method="post" >
  <table class="table">
  <tr><td>
   <div class="form-group">
   <div class="bookico"><div class="sfz"><?php if($shoper['imga']){?><img src="<?php echo $shoper['imga']?>" /><?php }else{echo "";}?></div></div>
   <div class="label"><label for="card">身份证扫描件（正反两面）</label></div>
   	<div class="clear"></div>
    <div class="field">
	<input type="hidden" id="url7" name="imga" value="<?php echo $shoper['imga']?>"  data-validate="required:必须上传" /> <input type="button" class="button input-file" id="image7" value="立即添加" />
    </div>
  </div> 
  </td><td>
   <div class="form-group">
   <div class="bookico"><div class="yyzz"><?php if($shoper['imgb']){?><img src="<?php echo $shoper['imga']?>" /><?php }else{echo "";}?></div></div>
   <div class="label"><label for="imgb">营业执照副本扫描件</label></div>
   	<div class="clear"></div>
    <div class="field">
	<input type="hidden" id="url8" name="imgb" value="<?php echo $shoper['imgb']?>"  data-validate="required:必须上传" /> <input type="button" class="button input-file" id="image8" value="立即添加" />
    </div>
  </div> 
  </td>
  </tr>
  <tr>
  <td>
   <div class="form-group">
   <div class="bookico"><div class="yyzz"><?php if($shoper['imgg']){?><img src="<?php echo $shoper['imgg']?>" /><?php }else{echo "";}?></div></div>
   <div class="label"><label for="imgg">组织机构代码</label></div>
   	<div class="clear"></div>
    <div class="field">
	<input type="hidden" id="url9" name="imgg" value="<?php echo $shoper['imgg']?>"  data-validate="required:必须上传" /> <input type="button" class="button input-file" id="image9" value="立即添加" />
    </div>
  </div> 
  </td><td>
   <div class="form-group">
   <div class="bookico"><div class="yyzz"><?php if($shoper['imgh']){?><img src="<?php echo $shoper['imgh']?>" /><?php }else{echo "";}?></div></div>
   <div class="label"><label for="imgh">税务登记证</label></div>
   	<div class="clear"></div>
    <div class="field">
	<input type="hidden" id="url0" name="imgh" value="<?php echo $shoper['imgh']?>"  data-validate="required:必须上传" /> <input type="button" class="button input-file" id="image0" value="立即添加" />
    </div>
  </div> 
  </td>
  
  </tr>
  <tr>
 <td></td>
 <td>
  <div class="form-group">
    <div class="label"><label for="status">审核状态</label></div>
	<div class="clear"></div>
    <div class="field">
       <input type="radio" value="0" name="status" <?php if($v['status']==0){echo "checked='checked'";} ?> />未审核
       <input type="radio" value="1" name="status" <?php if($v['status']==1){echo "checked='checked'";} ?> />已审核
	
    </div>
  </div> 

 </td>
 </tr>
 </table>
 <hr>

  <div class="form-button text-center"><input class="button bg-blue" type="submit" name="sub" value="立即提交"></div>
</form>
<?php
if(!empty($_POST['sub'])){
	
	$data=$query->update(
						"id='$id'",
						"
						imga='$_POST[imga]',
						imgb='$_POST[imgb]',
						imgc='$_POST[imgg]',
						imgd='$_POST[imgh]',
						status='$_POST[status]'
						"						
						);
		if($data){
				echo "<script>alert('修改成功！');location.href='admin_shoper.php'</script>";
		}else{
				echo "<script>alert('修改失败！');location.href='admin_shoper.php'</script>";
			
		} 
}
?>
	
	</div>
  </div>
</div>





<?php	
}
?>


</div>


