<?php  
include './header.php';
$hotel = db_find_one("select id,name from hotel where isdefault=1");
$hotelid = $hotel["id"];
$user_id = $_SESSION["user"];
$isc = db_find_one("select * from choicemenu where user_id=$user_id and daydate=CURDATE()");
?>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.php">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">结束点餐</span></div>
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
                <div class="result-title">
                    <div class="result-list">
                    <?php 
                                if(!db_find_one("select * from choicemenu where isover=1 and daydate=CURDATE()"))
                                {?>
                        <a href="javascript:void(0)" id="but">结束点餐</a><?php }else{ ?> <a href="javascript:void(0)" id="ret">再次开启今日点餐</a><?php }?></div></div>
                    <table class="result-tab" width="100%">
                        <tr>
                            <th width="5%">标签ID</th>
                            <th width="10%">菜品名称</th>
                            <th width="60%">已点餐人</th>
                            <th width="10%">菜品价格</th>
                            <th width="5%">点餐人数</th>
                            <th width="5%">费用</th>
                        </tr>
                        <?php
                        $arr = db_find("select * from menu where hotel_id=$hotelid and isdelete=0 and isuse=1 order by addtime desc ");
                        $num = 0;
                        $countprice = 0;
                        foreach ($arr as $key => $value) {
                            $num++;
                            $price = $value["price"];
                            ?>
                        <tr>
                            <td data-id="<?php echo $value["id"];?>"><?php echo $num;?></td>  
                            <td><?php echo $value["name"];?></td> 
                            <td><?php 
                    $noc = db_find("select name from `user` u1 join choicemenu cm ON cm.user_id=u1.id and cm.daydate=CURDATE() and menu_id=".$value["id"]); 
                    foreach ($noc as $key => $v) {
                        echo $v["name"]."、";
                    }
                    ?></td> 
                            <td><?php echo $price;?></td> 
                            <td><?php echo count($noc);?></td> 
                            <td><?php $countprice += (count($noc) * $price); echo count($noc) * $price;?></td> 
                        </tr>
                            <?php
                        }
                        ?>
                        <tr><td>总计：</td><td colspan="7"><?php echo $countprice; ?></td></tr>
                    </table>
                </div>
        </div>
    </div>
    <!--/main-->
    <script type="text/javascript">
    $("#but").click(function(){
        var obj = $(this);
        $.post("main.php?param=over",
          {
          },
          function(data){
            var data = JSON.parse(data);
            if(data.isSuccess)
            {
                location.reload();
            }
            else
            {
                alert(data.mes);
            }
          });
    });
    $("#ret").click(function(){
        var obj = $(this);
        $.post("main.php?param=retover",
          {
          },
          function(data){
            var data = JSON.parse(data);
            if(data.isSuccess)
            {
                location.reload();
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