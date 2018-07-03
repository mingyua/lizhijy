<?php include_once("config/M.class.php");?>
<?php include_once("header.php");?>
<?php
$config = new M("config");
$data=$config->find();
 ?>
   <form method="post" class="form-x"  enctype="multipart/form-data">
<div id="box" style="background:#98bf21;height:100px;width:100px;margin:6px;">
</div>
<a class="btn1">Animate</a>
<a class="btn2">Reset</a>
</form>