<?php  
include './header.php';
//$arr = db_find_one('SELECT * FROM ecs_goods'); 
$arr = array("name"=>"","password"=>"","role_id"=>1,"id"=>"");
$uid = param('id', 0);
if($uid)
{
    $arr = db_find_one("select * from user where id=$uid");
}
?>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.php">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="user.php">用户管理</a><span class="crumb-step">&gt;</span><span>添加用户</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
            <input type="hidden" name="uid" id="uid" value="<?php echo $arr['id'];?>" />
                <!-- <form action="main?param=adduser" method="post" id="myform" name="myform" enctype="multipart/form-data"> -->
                    <table class="insert-tab" width="100%">
                        <tbody>
                        <tr>
                            <th><i class="require-red">*</i>用户名：</th>
                            <td>
                                <input class="common-text required" id="name" name="name" size="50" value="<?php echo $arr['name'];?>" type="text">
                            </td>
                        </tr>
                        <tr>
                            <th><i class="require-red">*</i>密码：</th>
                            <td>
                                <input class="common-text required" id="pw" name="pw" size="50" value="<?php echo $arr['password'];?>" type="password">
                            </td>
                        </tr>
                        <tr>
                            <th width="120">权限：</th>
                            <td>
                                <select name="role" id="role" class="required">
                                    <option value="1" <?php if($arr['role_id'] == 1) echo "selected"; ?>>管理员</option>
                                    <option value="2"<?php if($arr['role_id'] == 2) echo "selected"; ?>>用户</option>
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
        $.post("main.php?param=adduser",
          {
            id:$("#uid").val(),
            name:$("#name").val(),
            pw:$("#pw").val(),
            role:$("#role").val()
          },
          function(data){
            var data = JSON.parse(data);
            if(data.isSuccess)
            {
                location.href = "user.php";
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