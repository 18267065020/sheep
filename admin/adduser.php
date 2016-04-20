<?php  
include './header.php';
//$arr = db_find_one('SELECT * FROM ecs_goods'); 
?>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">公告发布</a><span class="crumb-step">&gt;</span><span>新增公告</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <!-- <form action="main?param=adduser" method="post" id="myform" name="myform" enctype="multipart/form-data"> -->
                    <table class="insert-tab" width="100%">
                        <tbody>
                        <tr>
                            <th><i class="require-red">*</i>用户名：</th>
                            <td>
                                <input class="common-text required" id="name" name="name" size="50" value="" type="text">
                            </td>
                        </tr>
                        <tr>
                            <th><i class="require-red">*</i>密码：</th>
                            <td>
                                <input class="common-text required" id="pw" name="pw" size="50" value="" type="password">
                            </td>
                        </tr>
                        <tr>
                            <th width="120">权限：</th>
                            <td>
                                <select name="role" id="role" class="required">
                                    <option value="1">管理员</option>
                                    <option value="2">用户</option>
                                </select>
                            </td>
                        </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input id="but" class="btn btn-primary btn6 mr10" value="保存" type="button">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                <!-- </form> -->
            </div>
        </div>

    </div>
    <!--/main-->
    <script type="text/javascript">
    $("#but").click(function(){
        $.post("main?param=adduser",
          {
            name:$("#name").val(),
            pw:$("#pw").val(),
            role:$("#role").val()
          },
          function(data){
            //var data = JSON.parse(data)
            console.log(data);
          });
    });
    </script>
</div>
</body>
</html>