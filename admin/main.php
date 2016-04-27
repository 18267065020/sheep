<?php
$conf = include '../conf.php'; 
include '../xiunophp/xiunophp.php';   
//$arr = db_find_one('SELECT * FROM ecs_goods'); 
$param = param('param');
if($param == "login")
{
    login();
}
else if($param == "loginout")
{
    $_SESSION["role"] = 0;
    echo "<script>location.href='login.php';</script>";
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
else if($param == "addmenu")
{
    addmenu();
}
else if($param == "delmenu")
{
    delmenu();
}
else if($param == "order")
{
    order();
}
else if($param == "orderdel")
{
    orderdel();
}
else if($param == "over")
{
    over();
}
else if($param == "next")
{
    isnext();
}
else if($param == "updatepw")
{
    updatepw();
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
        $user = db_find_one("select id,role_id,password from user where name='$name' and password='$pw'");
        if($user)
        {
            $_SESSION["role"] = $user["role_id"];
            $_SESSION["user"] = $user["id"];
            $_SESSION["userpw"] = $user["password"];
            $json["isSuccess"] = true;
            $json["mes"] = "登录成功";
            $count = db_find_one("select count(1) count from choicemenu where daydate=CURDATE()");
            $countvalue = $count["count"];
            if(!$countvalue)
            {
                $users = db_find("select * from user where isnext=1");
                foreach ($users as $k1 => $v1) {
                    $item_userid = $v1["id"];
                    $item = db_find_one("select * from choicemenu where user_id=$item_userid order by daydate limit 0,1");
                    $itemmenu = $item["menu_id"];
                    db_exec("insert into choicemenu values(null,$itemmenu,$item_userid,CURDATE(),0)");
                }
            }
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
                $arr = db_exec("insert into user values(null,'$name','$pw',$role,now(),0)");
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
function addmenu()
{
    $json = array('mes'=>"操作成功",'isSuccess'=>true,'data'=>array());
    $id = $_POST["id"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $hotel = $_POST["hotel"];
    $isuse = $_POST["isuse"];
    if(!$name)
    {
        $json["isSuccess"] = false;
        $json["mes"] = "请输入菜品名称";
        echo json_encode($json);
    }
    else if(!$price)
    {
        $json["isSuccess"] = false;
        $json["mes"] = "请输入价格";
        echo json_encode($json);
    }
    else if(!$hotel)
    {
        $json["isSuccess"] = false;
        $json["mes"] = "请选择餐厅";
        echo json_encode($json);
    }
    else
    {
        if(!$id)
        {
            if(db_find_one("select * from menu where name='$name'"))
            {
                $json["isSuccess"] = false;
                $json["mes"] = "菜品名称已存在";
            }
            else
            {
                $arr = db_exec("insert into menu values(null,'$name','$price',$hotel,$isuse,0,now())");
                $json["data"] = $arr;
            }
        }
        else
        {
            if(db_find_one("select * from menu where name='$name' and id<>$id"))
            {
                $json["isSuccess"] = false;
                $json["mes"] = "菜品名称已存在";
            }
            else
            {
                $arr = db_exec("update menu set name='$name',price='$price',hotel_id=$hotel,isuse=$isuse where id=$id");
                $json["data"] = $arr;
            }
        }
        echo json_encode($json);
    }
}
function delmenu()
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
        $arr = db_exec("update menu set isdelete=1 where id=$id");
        $json["data"] = $arr;
    }
    echo json_encode($json);
}
function order()
{
    $json = array('mes'=>"操作成功",'isSuccess'=>true,'data'=>array());
    $menu = $_POST["menu"];
    if(!$menu)
    {
        $json["isSuccess"] = false;
        $json["mes"] = "请选择菜品";
        echo json_encode($json);
    }
    else
    {
        $userid = $_SESSION["user"];
        if(db_find_one("select * from choicemenu where menu_id=$menu and user_id=$userid and daydate=CURDATE()"))
        {
            $json["isSuccess"] = false;
            $json["mes"] = "您已点过餐了";
        }
        if(db_find_one("select * from choicemenu where isover=1 and daydate=CURDATE()"))
        {
            $json["isSuccess"] = false;
            $json["mes"] = "今日点餐已结束";
        }
        $arr = db_exec("insert into choicemenu values(null,$menu,$userid,CURDATE(),0)");
        $json["data"] = $arr;
    }
    echo json_encode($json);
}
function orderdel()
{
    $json = array('mes'=>"操作成功",'isSuccess'=>true,'data'=>array());
    $userid = $_SESSION["user"];
    $arr = db_exec("delete from choicemenu where user_id=$userid and daydate=CURDATE()");
    $json["data"] = $arr;
    echo json_encode($json);
}
function over()
{
    $json = array('mes'=>"操作成功",'isSuccess'=>true,'data'=>array());
    $arr = db_exec("update choicemenu set isover=1 where daydate=CURDATE()");
    $json["data"] = $arr;
    echo json_encode($json);
}
function isnext()
{
    $json = array('mes'=>"操作成功",'isSuccess'=>true,'data'=>array());
    $isnext = $_POST["next"];
    $userid = $_SESSION["user"];
    $arr = db_exec("update user set isnext=$isnext where id=$userid");
    $json["data"] = $arr;
    echo json_encode($json);
}
function updatepw()
{
    $json = array('mes'=>"操作成功",'isSuccess'=>true,'data'=>array());
    $pw = $_POST["pw"];
    if(!$pw)
    {
        $json["isSuccess"] = false;
        $json["mes"] = "修改密码不能为空";
        echo json_encode($json);
    }
    else
    {
        $userid = $_SESSION["user"];
        $arr = db_exec("update user set password='$pw' where id=$userid");
        $_SESSION["userpw"] = $pw;
        $json["data"] = $arr;
    }
    echo json_encode($json);
}
?>