<?php  
include './header.php';
//$arr = db_find_one('SELECT * FROM ecs_goods'); 
?>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.php">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">用户管理</span></div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="adduser.php"><i class="icon-font"></i>新增用户</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"></th>
                            <th>标签ID</th>
                            <th>用户名称</th>
                            <th>用户权限</th>
                            <th>创建时间</th>
                            <th>操作</th>
                        </tr>
                        <?php
                        $arr = db_find("select * from user");
                        foreach ($arr as $key => $value) {
                            ?>
                        <tr>
                            <td class="tc"><input name="id[]" value="<?php echo $value["id"];?>" type="checkbox"></td>
                            <td><?php echo $value["id"];?></td>  
                            <td><a href="adduser.php?id=<?php echo $value['id'];?>"><?php echo $value["name"];?></a> </td> 
                            <td><?php echo $value["role_id"] == 1 ? "管理员" : "用户";?></td>
                            <td><?php echo $value["addtime"];?></td>
                            <td>
                                <a class="link-update" href="adduser.php?id=<?php echo $value['id'];?>">修改</a>
                                <a class="link-del" href="dropuser.php?id=<?php echo $value['id'];?>">删除</a>
                            </td>
                        </tr>
                            <?php
                        }
                        ?>
                    </table>
                    <div class="list-page"> 
                    2 条 1/1 页
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>