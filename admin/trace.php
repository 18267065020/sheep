<?php  
include './header.php';
$table = "menu";
$page = param("trace");
if(!$page)
{
    $page = 1;
}
if($page <= 0)
{
    $page = 1;
}
$user_id = $_SESSION["user"];
$count = db_find_one("select count(0) nums from choicemenu where user_id=$user_id");
$count = $count["nums"];
$pagesize = 10;
$countpage = ($count % $pagesize) == 0 ? ($count / $pagesize) : ceil($count / $pagesize);
if($page > $countpage)
{
    if($countpage == 0)
    {
        $page = 1;
        $countpage = 1;
    }
    else
    {
        $page = $countpage;
    }
}
?>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.php">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">点餐记录</span></div>
        </div>
        <div class="result-wrap">
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th width="10%">标签ID</th>
                            <th width="25%">餐厅名称</th>
                            <th width="25%">菜品名称</th>
                            <th width="20%">菜品价格</th>
                            <th width="20%">日期</th>
                        </tr>
                        <?php
                        $arr = db_find("select h1.name hotel,m1.name menu,m1.price,cm.daydate from choicemenu cm left join menu m1 on m1.id=cm.menu_id left join hotel h1 on h1.id=m1.hotel_id where cm.user_id=$user_id order by cm.daydate desc limit " . ($page - 1) * $pagesize . "," . $pagesize);
                        $num = 0;
                        foreach ($arr as $key => $value) {
                            $num++;
                            ?>
                        <tr>
                            <td><?php echo $num;?></td>  
                            <td><?php echo $value["hotel"];?></td> 
                            <td><?php echo $value["menu"];?></td> 
                            <td><?php echo $value["price"];?></td> 
                            <td><?php echo $value["daydate"];?></td>
                        </tr>
                            <?php
                        }
                        ?>
                    </table>
                    <div class="list-page"> 
                    <a href="<?php echo $table;?>.php?page=1">首页</a> 
                    <a href="<?php echo $table;?>.php?page=<?php echo $page > 1 ? ($page - 1) : 1; ?>">上一页</a> 
                    <?php echo $count;?> 条 <?php echo $page;?>/<?php echo $countpage;?> 页 
                    <a href="<?php echo $table;?>.php?page=<?php echo $page >= $countpage ? $countpage : ($page + 1);?>">下一页</a> 
                    <a href="<?php echo $table;?>.php?page=<?php echo $countpage;?>">尾页</a>
                    </div>
                </div>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>