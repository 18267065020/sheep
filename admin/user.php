<?php  
include './header.php';
//$arr = db_find_one('SELECT * FROM ecs_goods'); 
?>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">用户管理</span></div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="adduser"><i class="icon-font"></i>新增用户</a>
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
                        <tr>
                            <td class="tc"><input name="id[]" value="" type="checkbox"></td>
                            <td>01</td>  <!--标签ID-->
                            <th>文学艺术</th> <!--标签名称-->
                            <td><a target="_blank" href="中国传统人生智慧.html">中国传统人生智慧</a> <!--课程名称-->
                            </td>
                            <td>
                                <a class="link-update" href="#">修改</a>
                                <a class="link-del" href="#">删除</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="tc"><input name="id[]" value="" type="checkbox"></td>
                            <td>08</td>  <!--标签ID-->
                            <td>科技</td> <!--标签名称-->
                            <td><a target="_blank" href="科学究竟是什么.html">科学究竟是什么</a>
                            </td>
                            <td>
                                <a class="link-update" href="#">修改</a>
                                <a class="link-del" href="#">删除</a>
                            </td>
                        </tr>
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