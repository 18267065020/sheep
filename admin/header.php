<?php
$conf = include '../conf.php'; 
include '../xiunophp/xiunophp.php';   
if($_SESSION["role"] == 0)
{
    echo "<script>location.href='login.php';</script>";
}
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>点餐喽，小子们</title>
    <link rel="stylesheet" type="text/css" href="css/common.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <script type="text/javascript" src="js/libs/modernizr.min.js"></script>
    <script type="text/javascript" src="http://www.gongsibao.com/statics/js/home/jquery.min.js"></script>
</head>
<body>
<div class="topbar-wrap">
    <!--<div class="topbar-inner clearfix">-->
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo"><a href="index.php" class="navbar-brand">点餐喽，小子们</a></h1>
            <span onclick="javascript:location.href='main.php?param=loginout';" style="cursor:pointer;">注销</span>
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
                        <li><a href="index.php"><i class="icon-font">&#xe008;</i>点餐记录</a></li>
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
                        <li><a href="system.html"><i class="icon-font">&#xe045;</i>今日菜单</a></li>
                    </ul>
                </li>
                <?php }?>
            </ul>
        </div>
    </div>