<?php  
include './header.php';
$hotel = db_find_one("select id,name from hotel where isdefault=1");
$hotelid = $hotel["id"] ? $hotel["id"] : 0;
$user_id = $_SESSION["user"];
$isc = db_find_one("select * from choicemenu where user_id=$user_id and daydate=CURDATE()");
?>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.php">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">我要点餐</span></div>
        </div>
        <div class="result-wrap">
                <div class="result-title">
                    <div class="result-list">
                        餐厅名称：<?php echo $hotel["name"];?>
                    </div>
                </div>
                <div class="result-content">
                	<div>未点餐人：<?php 
                    $noc = db_find("select name from `user` where id not in (select user_id from choicemenu where daydate=CURDATE()) "); 
                    foreach ($noc as $key => $value) {
                        echo $value["name"]."、";
                    }
                    ?></div>
                    <table class="result-tab" width="100%">
                        <tr>
                            <th width="5%">标签ID</th>
                            <th width="10%">菜品名称</th>
                            <th width="10%">菜品价格</th>
                            <th width="10%">操作</th>
                            <th width="10%">以后都吃这个</th>
                            <th width="55%">已点餐人</th>
                        </tr>
                        <?php
                        $arr = db_find("select * from menu where hotel_id=$hotelid and isdelete=0 and isuse=1 order by addtime desc ");
                        $num = 0;
                        foreach ($arr as $key => $value) {
                            $num++;
                            ?>
                        <tr>
                            <td data-id="<?php echo $value["id"];?>"><?php echo $num;?></td>  
                            <td><?php echo $value["name"];?></td> 
                            <td><?php echo $value["price"];?></td> 
                            <td><?php
                                if(db_find_one("select * from choicemenu where isover=1 and daydate=CURDATE()"))
                                {
                                    echo "今日点餐已结束";
                                }
                                else{
                                if($isc && $isc["menu_id"] == $value["id"])
                                {?>
                                <a class="link-del" href="javascript:void(0);" data-id="<?php echo $value['id'];?>">取消</a>
                                <?php 
                                }elseif(!$isc){ ?>
                                <a class="link-update" href="javascript:void(0);" data-id="<?php echo $value['id'];?>">点餐</a>
                                <?php }}?>
                            </td> 
                            <td>
                            <?php 
                            $menu_id = $value["id"];
                            $isnext = db_find_one("select * from choicemenu where user_id=$user_id and menu_id=$menu_id and daydate=CURDATE()");
                            $usernext = db_find_one("select * from user where id=$user_id");
                            if($isnext)
                            {
                                if($usernext["isnext"]){
                                ?>
                                <a class="link-next2" href="javascript:void(0);" data-id="<?php echo $value['id'];?>">取消</a>
                                <?php
                                }else{
                                    ?>
                                    <a class="link-next1" href="javascript:void(0);" data-id="<?php echo $value['id'];?>">确定</a>
                                <?php }}
                                ?>
                            </td> 
                            <td><?php 
                    $noc = db_find("select name from `user` u1 join choicemenu cm ON cm.user_id=u1.id and cm.daydate=CURDATE() and menu_id=".$value["id"]); 
                    foreach ($noc as $key => $value) {
                        echo $value["name"]."、";
                    }
                    ?></td> 
                        </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
        </div>
    </div>
    <!--/main-->
    <script type="text/javascript">
    $(".link-update").click(function(){
        var obj = $(this);
        $.post("main.php?param=order",
          {
            menu:obj.attr("data-id")
          },
          function(data){
            var data = JSON.parse(data);
            if(data.isSuccess)
            {
                var item = obj.closest("tr");
                item.html("<td colspan='" + item.children("td").length + "'>点餐成功</td>");
                    setTimeout(function(){location.reload();},1000);
            }
            else
            {
                alert(data.mes);
            }
          });
    });
    $(".link-del").click(function(){
        var obj = $(this);
        $.post("main.php?param=orderdel",
          {
            menu:obj.attr("data-id")
          },
          function(data){
            var data = JSON.parse(data);
            if(data.isSuccess)
            {
                var item = obj.closest("tr");
                item.html("<td colspan='" + item.children("td").length + "'>取消成功</td>");
                    setTimeout(function(){location.reload();},1000);
            }
            else
            {
                alert(data.mes);
            }
          });
    });
    $(".link-next1").click(function(){
        var obj = $(this);
        $.post("main.php?param=next",
          {
            next:1
          },
          function(data){
            var data = JSON.parse(data);
            if(data.isSuccess)
            {
                var item = obj.closest("tr");
                item.html("<td colspan='" + item.children("td").length + "'>连续吃这个成功</td>");
                    setTimeout(function(){location.reload();},1000);
            }
            else
            {
                alert(data.mes);
            }
          });
    });
    $(".link-next2").click(function(){
        var obj = $(this);
        $.post("main.php?param=next",
          {
            next:0
          },
          function(data){
            var data = JSON.parse(data);
            if(data.isSuccess)
            {
                var item = obj.closest("tr");
                item.html("<td colspan='" + item.children("td").length + "'>取消连续吃这个</td>");
                    setTimeout(function(){location.reload();},1000);
            }
            else
            {
                alert(data.mes);
            }
          });
    });
    </script>
</div>
</body>
</html>