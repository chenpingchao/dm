<?php

require_once "../conf.inc.php";
if(empty($_SESSION['mid'])){
    header("location:../index.php");
}

//接受要处理的函数
$act = $_GET['act'];
$act();


//添加用户
function add(){
//    dd($_POST);
    $username = trim($_POST['username']);
    $password =trim( $_POST['password']);
    $repwd = trim($_POST['repwd']);
    $captcha =trim( $_POST['captcha']);
    //判段用户名是否符合要求
    if( !preg_match('/\w{4,10}/',$username,$arr)){
        echo "<script>alert('用户名必须由4-10位字母、数字、下划线组成');history.back();</script>";
        //判段密码是否符合要求
    }else if(!preg_match('/\S{6,10}/',$username,$arr)){
        echo "<script>alert('密码必须由6-10位非空白字符组成');history.back();</script>";
    }else{
        //验证验证码是否正确
        if($_SESSION['captcha'] == $captcha){
            //验证两次密码是否相等
            if($repwd == $password){
                //验证用户名是否被占用
                if(oneSelect("select id from zk_member where username='$username' limit 1")){
                    echo "<script>alert('该用户名已被占用');history.back();</script>";
                }else{
                    //将信息插入表中
                    $password = md5($password);
                    if($id = insert("insert into zk_member(username,password) value ('$username','$password')")){
                        unset($_SESSION['captcha']);
                        $_SESSION['mid'] = $id;
                        $_SESSION['mname'] = $username;
                        setcookie(session_name(),session_id(),time()+7*24*3600,'/');
                        echo "<script>alert('用户添加成功');location = 'list.php' ;</script>";
                    }else{
                        echo "<script>alert('用户添加失败');history.back();</script>";
                    }
                }
            }else{
                echo "<script>alert('两次密码不相等');history.back();</script>";
            }
        }else{
            echo "<script>alert('验证码不正确');history.back();</script>";
        }
    }
}

//登录功能
function login(){
//    dd($_POST);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $captcha = trim($_POST['captcha']);

    //验证用户名不能为空
    if(empty($username)){
        echo "<script>alert('用户名不能为空');history.back();</script>";
        //验证密码不能为空
    }else if(empty($username)){
        echo "<script>alert('密码不能为空');history.back();</script>";
    }else{
        //验证码是否证确
        if($_SESSION['captcha'] == $captcha){
            //判断是否登录成功
            $password = md5($password);
            if($member = oneSelect("select id,username from zk_member where username='$username' and password='$password' limit 1")){
                //将用户信息写入session
                $_SESSION['mid'] = $member['id'];
                $_SESSION['mname'] = $member['username'];
                //销毁验证码
                unset($_SESSION['captcha']);
                //更改登录次数
                update("update zk_member set login_num = login_num+1 where id={$member['id']} limit 1;");
                setcookie(session_name(),session_id(),time()+7*24*3600,'/');
                echo "<script>alert('用户登录成功');location = 'list.php' ;</script>";
            }else{
                echo "<script>alert('用户登录失败');history.back();</script>";
            }

        }else{
            echo "<script>alert('验证码不正确');history.back();</script>";
        }
    }
}


//退出
function logout(){
    unset($_SESSION['mid']);
    unset($_SESSION['mname']);
    header("location:../index.php");
}

//留言
function message(){
    $message = htmlentities($_POST['message']);
    $mid = $_SESSION['mid'];
    global $notSay;
    //判断留言不能为空
    if(empty($message)){
        echo "<script>alert('留言不能为空');history.back();</script>";
    }else{
       $msg = str_replace($notSay,'**',$message);
        //留言内容写入留言表(zk_message)，
        $add_time = time();
        if(insert("insert into zk_message(mid,message,add_time) value ($mid,'$msg',$add_time)")){
            //留言条数加1
            update("update zk_member set say_num=say_num+1 where id=$mid");

            echo "<script>alert('留言成功');location = 'list.php';</script>";
        }else{
            echo "<script>alert('留言失败');history.back();</script>";
        }
    }
}

//删除
function del(){
    $id = $_GET['id'];
    if(delete("delete from zk_message where id=$id limit 1")){
        echo "<script>alert('留言删除成功');location = 'mine.php';</script>";
    }else{
        echo "<script>alert('留言删除失败');history.back();</script>";
    }
}

//更新留言
function updated(){
    //接受留言ID
    $sid = $_GET['sid'];
    global $notSay;
    $message = htmlentities($_POST['content']);
    //屏蔽词汇
    $msg = str_replace($notSay,'**',$message);

    if(update("update zk_message set message='$msg' where id=$sid")){
        echo "<script>alert('留言更新成功');location = 'mine.php';</script>";
    }else{
        echo "<script>alert('留言更新失败');history.back();</script>";
    }
}

//添加评论
function comment(){
    //接受留言ID
    $sid = $_GET['sid'];
    global $notSay;
    $content = htmlentities($_POST['content']);
    //评论人
    $mid = $_SESSION['mid'];
    //屏蔽词汇
    $content = str_replace($notSay,'**',$content);
    $add_time = time();

    if(insert("insert into detail(sid,mid,detail,add_time) values ($sid,$mid,'$content',$add_time)")){
        echo "<script>alert('评论成功');location = 'detail.php?id=".$sid."';</script>";
    }else{
        echo "<script>alert('评论成功');history.back();</script>";
    }
}


//更改信息
function update_use(){
    $mid = $_SESSION['mid'];
    $username = trim($_POST['username']);
    $oldpwd = trim($_POST['oldpwd']);
    $password = trim($_POST['password']);
    $repwd = trim($_POST['repwd']);
    //判断判断密码是否为空
    if(empty($oldpwd)){
        echo "<script>alert('原密码不能为空');history.back()</script>";
    }elseif(empty($password)){
        echo "<script>alert('新密码不能为空');history.back()</script>";
    }else{
        //判断两次密码是否一样
        if($password != $repwd){
            echo "<script>alert('两次密码不一样');history.back()</script>";
        }else{
            $member = oneSelect("select password from zk_member where id=$mid limit 1");
            //判断原密码是否一样
            $oldpwd = md5($oldpwd);
            if ($oldpwd != $member['password']) {
                //              echo $oldpwd;
                //              print_r(oneSelect($sql));
                echo "<script>alert('用户密码不正确');history.back()</script>";
            } else {
                //更改sql语句
                $newpwd = md5($password);
                $sql = "update zk_member set password='$newpwd',username='$username' where id=$mid limit 1";
                if (update($sql)) {
                    $_SESSION['mname'] = $username;
                    echo "<script>alert('信息更改成功');location = 'list.php'</script>";
                } else {
                    echo "<script>alert('信息更改失败');history.back()</script>";
                }
            }
        }
    }
}