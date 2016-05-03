<?php
$conf = include '../conf.php'; 
include '../xiunophp/xiunophp.php';   
//$arr = db_find_one('SELECT * FROM user'); 
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>公司宝技术部点餐系统</title>
    <link href="eat/style_log.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="http://www.gongsibao.com/statics/js/home/jquery.min.js"></script>

</head>

<body>
<div class="login_m">
<div class="login_logo">公司宝技术部点餐系统</div>
<div class="login_boder">

<div class="login_padding" id="login_model">

  <h2>账号</h2>
  <label>
    <input type="text" id="username" name="username" class="txt_input txt_input2" value="">
  </label>
  <h2>密码</h2>
  <label>
    <input type="password" id="userpwd" name="userpwd" class="txt_input" value="">
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

<!--login_padding  Sign up end-->
</div><!--login_boder end-->
</div><!--login_m end-->
 <br> <br>
<p align="center"> by -- 杨顺康 qq:373175646 </p>
<script type="text/javascript">
  $("#button").click(function(){
    if($.trim($("#username").val()) == "")
    {
      alert("请输入账号");
      return;
    }
    if($.trim($("#userpwd").val()) == "")
    {
      alert("请输入密码");
      return;
    }
    $.post("main.php?param=login",
      {
        name:$("#username").val(),
        pw:$("#userpwd").val()
      },
      function(data){
        var data = JSON.parse(data);
        if(data.isSuccess)
        {
            location.href = "index.php";
        }
        else
        {
            alert(data.mes);
        }
      });
  });
  $(document).keydown(function(e){
    if(e.keyCode==13){
       $("#button").click();
    }
  });
</script>

</body></html>