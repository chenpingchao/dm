<?php
mysql_connect('127.0.0.1:3306' ,'root','root' );
mysql_select_db('hyb');
mysql_set_charset('utf8');
//打开session
session_start();
//echo $_SESSION['captcha'];
$act = $_GET['act'];
$act();

//登录
function logoin(){
    $username = trim($_POST['username']);
    $password = md5(trim($_POST['password']));
    $captcha = $_POST['captcha'];
//    echo $captcha;
    //验证验码是否输入正确
    if($captcha == $_SESSION['captcha']){
        //验证用户名和密码是否正确
        $resoult = mysql_query("select id,usename,avter from member where usename='$username'and password='$password' limit 1");
//        var_dump($resoult);
//        exit;
        if($resoult && mysql_num_rows($resoult)>0){
            $user_pass = mysql_fetch_assoc($resoult);
            //写入cookie中
            setcookie('mid',$user_pass['id']);
            setcookie('username',$user_pass['usename']);
            setcookie('avter',$user_pass['avter']);
            //销毁验证码
            unset($_SESSION['captcha']);
            echo "<script>alert('登录成功，欢迎回来');location = 'index.php';</script>";

        }else{
            echo "<script>alert('账户密码不正确');history.back();</script>";
        }

    }else{
        echo "<script>alert('验证码不正确');history.back();</script>";
    }
}

//登出
function delete(){
    setcookie('mid',null,time()-1);
    setcookie('username',null,time()-1);
    setcookie('avter',null,time()-1);
    echo "<script>alert('退出成功，请下次登录');location = 'index.php'</script>";
}