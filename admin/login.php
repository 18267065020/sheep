<?php
$conf = include '../conf.php'; 
include '../xiunophp/xiunophp.php';   
//$arr = db_find_one('SELECT * FROM ecs_goods'); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>公司宝技术部点餐系统</title>
<link href="eat/style_log.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="eat/style.css">
<link rel="stylesheet" type="text/css" href="eat/userpanel.css">
<link rel="stylesheet" type="text/css" href="eat/jquery.ui.all.css">

</head>

<body class="login" mycollectionplug="bind">
<div class="login_m">
<div class="login_logo">公司宝技术部点餐系统</div>
<div class="login_boder">

<div class="login_padding" id="login_model">

  <h2>账号</h2>
  <label>
    <input type="text" id="username" class="txt_input txt_input2" value="">
  </label>
  <h2>密码</h2>
  <label>
    <input type="password" name="textfield2" id="userpwd" class="txt_input" value="">
  </label>
 
  <p class="forgot"><a id="iforget" href="javascript:void(0);">&nbsp;</a></p>
  <div class="rem_sub">
  <div class="rem_sub_l">
   </div>
    <label>
      <input type="submit" class="sub_button" name="button" id="button" value="SIGN-IN" style="opacity: 0.7;">
    </label>
  </div>
</div>

<div id="forget_model" class="login_padding" style="display:none">
<br> 
  <div class="rem_sub">
  <div class="rem_sub_l">
   </div>
    <label>
     <input type="submit" class="sub_buttons" name="button" id="Retrievenow" value="Retrieve now" style="opacity: 0.7;">
     　　　
     <input type="submit" class="sub_button" name="button" id="denglou" value="Return" style="opacity: 0.7;">　　
    
    </label>
  </div>
</div>






<!--login_padding  Sign up end-->
</div><!--login_boder end-->
</div><!--login_m end-->
 <br> <br>
<p align="center"> by -- 杨顺康 qq:373175646 </p>



</body></html>