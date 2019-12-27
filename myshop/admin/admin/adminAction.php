<?php
header("Content-Type:text/html;charset=utf-8");
//调用conf文件
require_once "../../conf.inc.php";
if(empty($_SESSION['aid'])){
    header("location:../index.php");
}

//接受get请求
$act = $_GET['act'];
//调用相应的函数
$act();


//添加管理员
function add()
{
    //获取表单信息
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $repwd = trim($_POST['repwd']);
    //验证用户名是否为空
    if (empty($username)) {
        echo "<script>alert('用户名不能为空');history.back()</script>";
    }else {
        //验证密码是否为空
        if (empty($password)) {
            echo "<script>alert('密码不能为空');history.back()</script>";
        } else {
            //验证两次密码是否一致
            if ($password != $repwd) {
                echo "<script>alert('两次密码不一致');history.back()</script>";
            } else {
                //验证用户名是否存在
                $sql = "select id from admin where username='$username'";
                if (oneSelect($sql)) {
                    echo "<script>alert('用户名已存在，请更改用户名');history.back()</script>";
                } else {
                    //时间戳
                    $add_time = time();
                    //添加用户信息
                    $password = md5($password);
                    $sql = "insert into admin(username,password,add_time) value ('$username','$password',$add_time)";
                    if (insert($sql)) {
                        echo "<script>alert('管理员注册成功');location ='list.php'</script>";
                    } else {
                        echo "<script>alert('管理员注册失败');history.back()</script>";
                    }
                }
            }
        }
    }
}

//激活和禁用管理员
function active(){
    $id = $_GET['id'];
    $active = ($_GET['active']==1)? 2 : 1 ;
    $a = $active==1?'激活':'禁用';
    $sql= "update admin set active=$active where id=$id limit 1";
    if(update($sql)){
        echo "<script>alert('{$a}成功');location = 'list.php'</script>";
    }else{
        echo "<script>alert('{$a}失败');history.back()</script>";
    }
}

//更改管理员密码
function updatepwd(){
    $id = $_GET['id'];
    $oldpwd = trim($_POST['oldpwd']);
    $newpwd = trim($_POST['newpwd']);
    $repwd = trim($_POST['repwd']);
    //判断判断密码是否为空
    if(empty($oldpwd)){
        echo "<script>alert('原密码不能为空');history.back()</script>";
    }elseif(empty($newpwd)){
        echo "<script>alert('新密码不能为空');history.back()</script>";
    }else{
        //判断两次密码是否一样
        if($newpwd != $repwd){
            echo "<script>alert('两次密码不一样');history.back()</script>";
        }else{
            //判断原密码是否一样
            $sql = "select password from admin where id=$id limit 1";
            $oldpwd = md5($oldpwd);
            if($oldpwd != oneSelect($sql)['password']){
//              echo $oldpwd;
//              print_r(oneSelect($sql));
                echo "<script>alert('管理员密码不正确');history.back()</script>";
            }else{
                //更改sql语句
                $newpwd = md5($newpwd);
                $sql = "update admin set password='$newpwd' where id=$id limit 1";
                if(update($sql)){
                    echo "<script>alert('密码更改成功');location = 'list.php'</script>";
                }else{
                    echo "<script>alert('密码更改失败');history.back()</script>";
                }
            }
        }
    }
}

//删除单个管理员
function del(){
    $id = $_GET['id'];
//    echo $id;
    $sql = "delete from admin where id=$id limit 1";
    if(delete($sql)){
        echo "<script>alert('管理员删除成功');location = 'list.php'</script>";
    }else{
        echo "<script>alert('管理员删除失败');history.back()</script>";
    }
}
//批量删除管理员
function dels(){
    $arr = $_POST['chk'];
    $join = join(',',$arr);
//    echo $join;
    $sql = "delete from admin where id in($join)";
    if(delete($sql)){
        echo "<script>alert('管理员批量删除成功');history.back()</script>";
    }else{
        echo "<script>alert('管理员批量删除失败');history.back()</script>";
    }
}
