<?php
header("Content-Type:text/html;charset=utf-8");
require_once "../../conf.inc.php";

$act = $_GET['act'];
$act();


//管理员登陆

function login(){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $captcha = trim($_POST['captcha']);
    //判断密码和用户名是否为空
    if(empty($username)){
        echo "<script>alert('用户名不能为空');history.back()</script>";
    }else if(empty($password)){
        echo "<script>alert('密码不能为空');history.back()</script>";
    }else if($captcha != $_SESSION['captcha']){
        unset($_SESSION['captcha']);
        echo "<script>alert('验证码不正确');history.back()</script>";
    }else{
        unset($_SESSION['captcha']);
        $password = md5($password);
        $arr = oneSelect("select id,username,active from admin where username='$username'and password='$password' limit 1");
       //判断管理员状态
        if($arr['active']==1){
            //判断账户和密码的正确
            if($arr){
                //将信息写入session
                $_SESSION['aid'] = $arr['id'];
                $_SESSION['aname'] = $arr['username'];
               //将登陆信息写入数据库
                $login_time = time();
                $login_ip = $_SERVER['REMOTE_ADDR'];
                $sql = "update admin set login_time=$login_time,login_ip='$login_ip',login_num=login_num+1 where id=".$arr['id'];
                update($sql);
                //跳转到后台的首页
                echo "<script>alert('管理员登陆成功');location = '../index/index.php'</script>";
            }else{
                echo "<script>alert('管理员登录失败');history.back()</script>";
            }
        }else{
            echo "<script>alert('该管理员已被禁用');history.back()</script>";
        }
    }
}

//管理员退出
function logout(){
    unset($_SESSION['aid']);
    unset($_SESSION['aname']);
    header("location:../index.php");
}