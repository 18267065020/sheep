<?php
$conf = include '../conf.php'; 
include '../xiunophp/xiunophp.php';   
//$arr = db_find_one('SELECT * FROM ecs_goods'); 
$param = param('param');
if($param == "adduser")
{
    adduser();
}
if($param == "edituser")
{
    edituser();
}
function adduser()
{
    $json = array('mes'=>"操作成功",'isSuccess'=>true,'data'=>array());
    $name = $_POST["name"];
    $pw = $_POST["pw"];
    $role = $_POST["role"];
    if(!$name)
    {
        $json["isSuccess"] = false;
        $json["mes"] = "请输入用户名";
        echo json_encode($json);
    }
    else if(!$pw)
    {
        $json["isSuccess"] = false;
        $json["mes"] = "请输入密码";
        echo json_encode($json);
    }
    else
    {
        if(db_find_one("select * from user where name='$name'"))
        {
            $json["isSuccess"] = false;
            $json["mes"] = "用户名已存在";
        }
        else
        {
            $arr = db_exec("insert into user values(null,'$name','$pw',$role,now())");
            $json["data"] = $arr;
        }
        echo json_encode($json);
    }
}
function edituser()
{
    $json = array('mes'=>"操作成功",'isSuccess'=>true,'data'=>array());
    $id = $_POST["id"];
    $name = $_POST["name"];
    $pw = $_POST["pw"];
    $role = $_POST["role"];
    if(!$id)
    {
        $json["isSuccess"] = false;
        $json["mes"] = "请输入用户名";
        echo json_encode($json);
    }
    else if(!$name)
    {
        $json["isSuccess"] = false;
        $json["mes"] = "请输入用户名";
        echo json_encode($json);
    }
    else if(!$pw)
    {
        $json["isSuccess"] = false;
        $json["mes"] = "请输入密码";
        echo json_encode($json);
    }
    else
    {
        if(db_find_one("select * from user where name='$name'"))
        {
            $json["isSuccess"] = false;
            $json["mes"] = "用户名已存在";
        }
        else
        {
            $arr = db_exec("insert into user values(null,'$name','$pw',$role,now())");
            $json["data"] = $arr;
        }
        echo json_encode($json);
    }
}
?>