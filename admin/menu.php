<?php  
include './header.php';
$table = "menu";
$page = param("page");
if(!$page)
{
    $page = 1;
}
if($page <= 0)
{
    $page = 1;
}
$count = db_count($table);
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
            <div class="crumb-list"><i class="icon-font"></i><a href="index.php">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">菜单管理</span></div>
        </div>
        <div class="result-wrap">
                <div class="result-title">
                    <div class="result-list">
                        餐厅名称：<select name="hotel" id="hotel">
                        <?php 
                        $hotel = db_find("select * from hotel order by addtime desc");
                        foreach ($hotel as $key => $value) {
                            ?>
                                    <option value="<?php echo $value["id"];?>"><?php echo $value["name"];?></option>
                                    <?php }?>
                                </select><span style="width:10px; display:inline-block;"></span>
                        菜品名称：<input class="common-text" id="name" name="name" value="" type="text"><span style="width:10px; display:inline-block;"></span>
                        菜品价格：<input class="common-text" id="price" name="price" value="" type="text"><span style="width:10px; display:inline-block;"></span>
                        是否启用：<input id="isuse" name="isuse" value="" type="checkbox" checked=checked><span style="width:10px; display:inline-block;"></span>
                                <a href="javascript:void(0)" id="but"><i class="icon-font"></i>新增菜品</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th width="5%">标签ID</th>
                            <th width="20%">餐厅名称</th>
                            <th width="20%">菜品名称</th>
                            <th width="20%">菜品价格</th>
                            <th width="10%">是否启用</th>
                            <th width="10%">创建时间</th>
                            <th width="15%">操作</th>
                        </tr>
                        <?php
                        $arr = db_find("select * from " . $table . " where isdelete=0 order by addtime desc limit " . ($page - 1) * $pagesize . "," . $pagesize);
                        $num = 0;
                        foreach ($arr as $key => $value) {
                            $num++;
                            ?>
                        <tr>
                            <td data-id="<?php echo $value["id"];?>"><?php echo $num;?></td>  
                            <td data-id="<?php echo $value["hotel_id"];?>"><?php 
                                $hotelid = $value["hotel_id"];
                                $hotelname = db_find_one("select name from hotel where id=$hotelid");
                                echo $hotelname["name"];
                                ?>
                            </td> 
                            <td><?php echo $value["name"];?></td> 
                            <td><?php echo $value["price"];?></td> 
                            <td><input name="isuse" value="" type="checkbox" <?php if($value["isuse"]) echo "checked=checked";?> disabled=disabled></td> 
                            <td><?php echo $value["addtime"];?></td>
                            <td>
                                <a class="link-update" href="javascript:void(0);" data-id="<?php echo $value['id'];?>">修改</a>
                                <a class="link-del" href="javascript:void(0);" data-id="<?php echo $value['id'];?>">删除</a>
                            </td>
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
    <script type="text/javascript">
    $(".link-del").click(function(){
        var obj = $(this);
        $.post("main.php?param=del<?php echo $table;?>",
          {
            id:obj.attr("data-id")
          },
          function(data){
            var data = JSON.parse(data);
            if(data.isSuccess)
            {
                var item = obj.closest("tr");
                item.html("<td colspan='" + item.children("td").length + "'>删除成功</td>");
                    setTimeout(function(){location.reload();},1000);
            }
            else
            {
                alert(data.mes);
            }
          });
    });
    $("#but").click(function(){
        $.post("main.php?param=add<?php echo $table;?>",
          {
            id:0,
            name:$("#name").val(),
            price:$("#price").val(),
            hotel:$("#hotel").val(),
            isuse:($("#isuse").is(':checked') ? 1 : 0)
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
    $(".link-update").click(function(){
        var obj = $(this).closest("tr");
        var objtd = $(this).closest("tr").children("td");
        if($(this).text() == "保存")
        {
            $.post("main.php?param=add<?php echo $table;?>",
              {
                id : objtd.eq(0).attr("data-id"),
                name : objtd.eq(2).children("input").val(),
                price : objtd.eq(3).children("input").val(),
                hotel : objtd.eq(1).children("select").val(),
                isuse:(objtd.eq(4).children("input").is(':checked') ? 1 : 0)
              },
              function(data){
                var data = JSON.parse(data);
                if(data.isSuccess)
                {
                    obj.html("<td colspan='" + obj.children("td").length + "'>修改成功</td>");
                    setTimeout(function(){location.reload();},1000);
                    
                }
                else
                {
                    alert(data.mes);
                }
              });
        }
        else
        {
            objtd.eq(1).text("");
            $("#hotel").clone().prependTo(objtd.eq(1));
            objtd.eq(1).children("select").removeAttr("id");
            objtd.eq(1).children("select").val(objtd.eq(1).attr("data-id"));
            objtd.eq(2).html('<input class="common-text" name="name" size="20" value="' + objtd.eq(2).text() + '" type="text">');
            objtd.eq(3).html('<input class="common-text" name="price" size="20" value="' + objtd.eq(3).text() + '" type="text">');
            objtd.eq(4).children("input").removeAttr("disabled");
            $(this).text("保存");
        }
    });
    </script>
</div>
</body>
</html>