<?php
$conf = include '../conf.php'; 
include '../xiunophp/xiunophp.php';   
//$arr = db_find_one('SELECT * FROM ecs_goods'); 
$param = param('param');
$json = array('mes'=>"操作成功",'isSuccess'=>true,'data'=>array());
if($param == "adduser")
{
    adduser();
}
function adduser()
{
    $name = $_POST["name"];
    $pw = $_POST["pw"];
    $role = $_POST["role"];
    if($name == "")
    {
        $json["isSuccess"] = false;
        $json["mes"] = "请输入用户名";
        echo json_encode($json);
    }
    else if($name == "")
    {
        $json["isSuccess"] = false;
        $json["mes"] = "请输入密码";
        echo json_encode($json);
    }
    else
    {
        
        $arr = db_exec("insert into user values(null,$name,$pw,$role,now())");
        $json["data"] = $arr;
        echo json_encode($json);
    }
}
?>