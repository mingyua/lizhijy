<?php include_once("config/M.class.php");?>
<?php include_once("header.php");?>
<?php
$id=isset($_GET['id'])?$_GET['id']:"";
	$apply=NEW M("apply");
	$kk=$apply->find("id=$id");

$uid=$_SESSION['id'];
$time=time();

?>
<script src="../js/Area.js" type="text/javascript"></script>	

<div class="admin">
<form method="post" class="text-gray" id="mess">
<div class="padding-big">
<h2 class="bold">在线申请</h2><hr>
  <div class="form-group">
    <div class="label"><label for="title">申请标题</label></div>
    <div class="field">
      <input type="text" class="input" id="title" name="title" size="50" value="<?php echo $kk['title']?>" data-validate="required:必填" placeholder="请简短描述你的意图" />
    </div>
  </div>
  <div class="form-group">
    <div class="label"><label for="name">您的姓名</label></div>
    <div class="field">
      <input type="text" class="input" id="name" name="name" size="50" value="<?php echo $kk['name']?>" data-validate="required:必填,chinese:必须是中文,length#<14:姓名必须在2-4个字" placeholder="请输入您的真实姓名" />
    </div>
  </div>
  <div class="form-group">
    <div class="label"><label for="city">所在城市</label></div>
    <div class="field">
	<select id="s_province" class="select" name="s_province" data-validate="required:必填"></select>
    <select id="s_city" class="select" name="s_city" data-validate="required:必填"></select>
               <!--<select id="s_county" name="s_county"></select>-->
    </div>
  </div>
 <div class="form-group">
    <div class="label"><label for="password">手机号码</label></div>
    <div class="field">
      <input type="text" class="input" id="tel" name="tel" size="50" value="<?php echo $kk['tel']?>"  placeholder="请输入有效联系方式" />
    </div>
  </div>  
 <div class="form-group">
    <div class="label"><label for="kinds">服务内容</label></div>
    <div class="field">
     <div class="button-group radio">
  <label class="button"><input name="kinds" value="1" type="radio" data-validate="radio:必填"><span class="icon icon-check"></span>我要出借</label>
  <label class="button"><input name="kinds" value="2" type="radio" data-validate="radio:必填"><span class="icon icon-check"></span>我要借款</label>
</div>
    </div>
  </div> 
 <div class="form-group">
    <div class="label"><label for="c_name">业务选择</label></div>
    <div class="field">
	<select id="" class="select" name="c_name">
	<option value="">个人</option>
	<option value="">企业</option>
	</select>
    <select id="" class="select" name="c_type" >
	<option value="">汽车抵押</option>
	<option value="">企业</option>
	</select>
	 
	 
    </div>
  </div> 
 <div class="form-group">
    <div class="label"><label for="money">借贷金额</label></div>
    <div class="field">
      <input type="text" class="input" id="money" name="money" size="50" value="<?php echo $kk['money']?>" data-validate="required:必填" placeholder="请输入您的借贷额度" />
    </div>
  </div><div class="form-group">
    <div class="label"><label for="longtime">借贷期限</label></div>
    <div class="field">
      <select id="" class="select" name="longtime" >
		<option value="1">1-3个月</option>
		<option value="2">4-7个月</option>
		<option value="3">8-12个月</option>
		<option value="4">一年以上</option>
	  </select>
    </div>
  </div> 
 <div class="form-group">
    <div class="label"><label for="desc">详细描述</label></div>
    <div class="field">
      
	   <textarea rows="8" style="width:600px;padding:5px;"  name="desc" placeholder="多行文本框"><?php echo $kk['descs']?></textarea>
    </div>
  </div> 
  <div class="form-group">
    <div class="label"><label for="status">审核状态</label></div>
	<div class="clear"></div>
    <div class="field">
       <input type="radio" value="0" name="status" <?php if($v['status']==0){echo "checked='checked'";} ?> />未审核
       <input type="radio" value="1" name="status" <?php if($v['status']==1){echo "checked='checked'";} ?> />已审核
	
    </div>
  </div> 
  <div class="form-group">
    <div class="label"><label for="cases">是否显示为案例</label></div>
	<div class="clear"></div>
    <div class="field">
       <input type="radio" value="0" name="cases" <?php if($v['cases']==0){echo "checked='checked'";} ?> />否
       <input type="radio" value="1" name="cases" <?php if($v['cases']==1){echo "checked='checked'";} ?> />是
	
    </div>
  </div> 
  </div>
  <div class="clear margin-bottom"></div>
 
  <div class="form-group">
    <div class="label"><label></label></div>

	<div class="field form-button">
 <input class="button bg-yellow" type="submit" name="sub" value="立即提交">
 
 </div>
 </div>
</form> 
</div>
<script type="text/javascript">
	var s=["s_province","s_city","s_county"];//三个select的name
	var opt0 = ["请选择","请选择","请选择"];//初始值
	_init_area();
    </script>

 <?php

if(!empty($_POST['sub'])){
	$m=intval($_POST['money']);
	
	if($m<1){
	$limit_m="1";
	}else if($m<5 and $m>=1){
	$limit_m="2";
	}else if($m<10 and $m>=5){
	$limit_m="3";
	}else if($m<50 and $m>10){
	$limit_m="4";
	}else if($m>=50){
	$limit_m="5";
	}
	if($id<>null){
	$apply1=$apply->update(
								"id=$id",
								"
								uid ='$_POST[uid]',
								kinds ='$_POST[kinds]',
								title ='$_POST[title]',
								title='$_POST[title]',
								city='$_POST[city]',
								arear='$_POST[arear]',
								tel='$_POST[tel]',
								c_name='$_POST[c_name]',
								c_type='$_POST[c_type]',
								money='$_POST[money]',
								limit_m='$limit_m',
								descs='$_POST[desc]',
								longtime='$_POST[longtime]',
								status='$_POST[status]',
								cases='0',
								time='$time'
								"
							);	
			if($apply1){
				echo "<script>alert('修改成功！');window.history.go(-1); </script>";
		}else{
				echo "<script>alert('修改失败！');window.history.go(-1); </script>";
			
		} 
	exit;
		
	}else{
	$applyata=$apply->insert(array(
									"id=>null",
									"uid"=>"$uid",
									"kinds" =>"$_POST[kinds]",
									"title" =>"$_POST[title]",
									"name" =>"$_POST[name]",
									"city"=>"$_POST[s_province]",
									"arear"=>"$_POST[s_city]",
									"tel"=>"$_POST[tel]",
									"c_name"=>"$_POST[c_name]",
									"c_type"=>"$_POST[c_type]",
									"money"=>"$_POST[money]",
									"limit_m"=>"$limit_m",
									"descs"=>"$_POST[desc]",
									"longtime"=>"$_POST[longtime]",
									"status"=>"0",
									"cases"=>"0",
									"time"=>time()
										));
										
		if($applyata){
				echo "<script>alert('申请成功！');window.history.go(-1); </script>";
		}else{
				echo "<script>alert('申请失败！');window.history.go(-1); </script>";
			
		} 

}
	
}
?>
