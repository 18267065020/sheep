<?php  
include './header.php';
$table = "menu";
$hotel = db_find_one("select id,name from hotel where isdefault=1");
$hotelid = $hotel["id"];
?>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.php">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">菜单管理</span></div>
        </div>
        <div class="result-wrap">
                <div class="result-title">
                    <div class="result-list">
                        餐厅名称：<?php echo $hotel["name"];?>
                    </div>
                </div>
                <div class="result-content">
                	<div>未点餐人：</div>
                    <table class="result-tab" width="100%">
                        <tr>
                            <th width="5%">标签ID</th>
                            <th width="10%">菜品名称</th>
                            <th width="10%">菜品价格</th>
                            <th width="5%">操作</th>
                            <th width="70%">已点餐人</th>
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
                            <td><a class="link-update" href="javascript:void(0);" data-id="<?php echo $value['id'];?>">点餐</a></td> 
                            <td>点餐人</td> 
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
    </script>
</div>
</body>
</html>