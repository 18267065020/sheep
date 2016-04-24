<?php
$conf = include '../conf.php'; 
include '../xiunophp/xiunophp.php';   
//$arr = db_find_one('SELECT * FROM ecs_goods'); 
$param = param('param');
if($param == "login")
{
    login();
}
else if($param == "adduser")
{
    adduser();
}
else if($param == "deluser")
{
    deluser();
}
else if($param == "addhotel")
{
    addhotel();
}
else if($param == "delhotel")
{
    delhotel();
}
function login()
{
    $json = array('mes'=>"操作成功",'isSuccess'=>true,'data'=>array());
    $name = $_POST["name"];
    $pw = $_POST["pw"];
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
        $user = db_find_one("select role_id from user where name='$name' and password='$pw'");
        if($user)
        {
            $json["isSuccess"] = true;
            $json["mes"] = "登录成功";
            //$json["data"] = $user["role_id"];
            //$_SESSION['role'] = $user["role_id"];
        }
        else
        {
            $json["isSuccess"] = false;
            $json["mes"] = "账号或密码错误";
        }
        echo json_encode($json);
    }
}
function adduser()
{
    $json = array('mes'=>"操作成功",'isSuccess'=>true,'data'=>array());
    $id = $_POST["id"];
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
        if(!$id)
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
        }
        else
        {
            if(db_find_one("select * from user where name='$name' and id<>$id"))
            {
                $json["isSuccess"] = false;
                $json["mes"] = "用户名已存在";
            }
            else
            {
                $arr = db_exec("update user set name='$name',password='$pw',role_id=$role where id=$id");
                $json["data"] = $arr;
            }
        }
        echo json_encode($json);
    }
}
function deluser()
{
    $json = array('mes'=>"操作成功",'isSuccess'=>true,'data'=>array());
    $id = $_POST["id"];
    if(!$id)
    {
        $json["isSuccess"] = false;
        $json["mes"] = "参数错误";
    }
    else
    {
        $arr = db_exec("delete from user where id=$id");
        $json["data"] = $arr;
    }
    echo json_encode($json);
}
function addhotel()
{
    $json = array('mes'=>"操作成功",'isSuccess'=>true,'data'=>array());
    $id = $_POST["id"];
    $name = $_POST["name"];
    $isdefault = $_POST["isdefault"];
    if(!$name)
    {
        $json["isSuccess"] = false;
        $json["mes"] = "请输入饭店名";
        echo json_encode($json);
    }
    else
    {
        if(!$id)
        {
            if(db_find_one("select * from hotel where name='$name'"))
            {
                $json["isSuccess"] = false;
                $json["mes"] = "饭店名已存在";
            }
            else
            {
                $default = db_find_one("select count(1) num from hotel where isdefault=1");
                if(!$default['num'])
                {
                    $isdefault = 1;
                }
                if($isdefault)
                {
                    db_exec("update hotel set isdefault=0");
                }
                $arr = db_exec("insert into hotel values(null,'$name',$isdefault,now())");
                $json["data"] = $arr;
            }
        }
        else
        {
            if(db_find_one("select * from hotel where name='$name' and id<>$id"))
            {
                $json["isSuccess"] = false;
                $json["mes"] = "饭店名已存在";
            }
            else
            {
                if($isdefault)
                {
                    db_exec("update hotel set isdefault=0");
                }
                $default = db_find_one("select count(1) num from hotel where isdefault=1");
                if(!$default['num'])
                {
                    $isdefault = 1;
                }
                $arr = db_exec("update hotel set name='$name',isdefault=$isdefault where id=$id");
                $json["data"] = $arr;
            }
        }
        echo json_encode($json);
    }
}
function delhotel()
{
    $json = array('mes'=>"操作成功",'isSuccess'=>true,'data'=>array());
    $id = $_POST["id"];
    if(!$id)
    {
        $json["isSuccess"] = false;
        $json["mes"] = "参数错误";
    }
    else
    {
        $default = db_find_one("select isdefault from hotel where id=$id");
        if($default["isdefault"])
        {
            db_exec("update hotel set isdefault=1 where id in (select a.id from (select id from hotel where id<>$id order by addtime desc limit 0,1)a)");
        }
        $arr = db_exec("delete from hotel where id=$id");
        $json["data"] = $arr;
    }
    echo json_encode($json);
}
?>