<?php
$conf = include '../conf.php'; 
include '../xiunophp/xiunophp.php';   
if($_SESSION["role"] == 0)
{
    echo "<script>location.href='login.php';</script>";
}
$count = db_find_one("select count(1) count from choicemenu where daydate=CURDATE()");
$countvalue = $count["count"];
if(!$countvalue)
{
    $users = db_find("select * from user where isnext=1");
    foreach ($users as $k1 => $v1) {
        $item_userid = $v1["id"];
        $item = db_find_one("select * from choicemenu where user_id=$item_userid order by daydate limit 0,1");
        $itemmenu = $item["menu_id"];
        db_exec("insert into choicemenu values(null,$itemmenu,$item_userid,CURDATE(),0)");
    }
}
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>hey，点餐喽，小子们</title>
    <link rel="stylesheet" type="text/css" href="css/common.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <script type="text/javascript" src="js/libs/modernizr.min.js"></script>
    <script type="text/javascript" src="http://www.gongsibao.com/statics/js/home/jquery.min.js"></script>
</head>
<body>
<div class="topbar-wrap">
    <!--<div class="topbar-inner clearfix">-->
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo"><a href="index.php" class="navbar-brand">hey，点餐喽，小子们</a></h1>
            <h1 class="topbar-logo">欢迎您，<?php echo $_SESSION["username"];?></h1>
            <span onclick="javascript:location.href='main.php?param=loginout';" style="cursor:pointer;">注销</span><span style="width:10px; display:inline-block;"></span>
            <span id="updatepw" style="cursor:pointer;">修改密码</span>
            <span></span>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                    <ul class="sub-menu">
                        <li><a href="index.php"><i class="icon-font">&#xe008;</i>我要点餐</a></li>
                        <li><a href="trace.php"><i class="icon-font">&#xe008;</i>点餐记录</a></li>
                    </ul>
                </li>
                <?php if($_SESSION["role"] == 1)
                { ?>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>系统管理</a>
                    <ul class="sub-menu">
                        <li><a href="user.php"><i class="icon-font">&#xe017;</i>用户管理</a></li>
                        <li><a href="hotel.php"><i class="icon-font">&#xe037;</i>餐厅管理</a></li>
                        <li><a href="menu.php"><i class="icon-font">&#xe046;</i>菜品管理</a></li>
                        <li><a href="over.php"><i class="icon-font">&#xe045;</i>今日菜单</a></li>
                    </ul>
                </li>
                <?php }?>
            </ul>
        </div>
    </div>
    <script type="text/javascript">
        $("#updatepw").click(function(){
            if($(this).next().html() == "")
            {
                $(this).next().append('<span style="width:10px; display:inline-block;"></span><input type="password" id="userpw" name="userpw" value="<?php echo $_SESSION["userpw"];?>" />');
                $("#userpw").after('<span style="width:10px; display:inline-block;"></span><a href="javascript:void(0)" id="sub">保存</a>');
            }
        });
        $("#sub").live("click",function(){
            var obj = $(this);
            $.post("main.php?param=updatepw",
              {
                pw:$("#userpw").val()
              },
              function(data){
                var data = JSON.parse(data);
                if(data.isSuccess)
                {
                    var item = obj.closest("span");
                    item.html("保存成功");
                        setTimeout(function(){location.reload();},1000);
                }
                else
                {
                    alert(data.mes);
                }
              });
        });
    </script>