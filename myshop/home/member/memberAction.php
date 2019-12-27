<?php
require_once "../../conf.inc.php";
require_once "../../public/libs/upload.inc.php";
//if(empty($_SESSION['mid'])){
//    header("location:/home/member/login.php");
//}

$act = $_GET['act'];
$act();

//添加会员
function add(){
    $username =trim($_POST['username']);
    $password = trim($_POST['password']);
    $repwd = trim($_POST['repwd']);
    $captcha =trim($_POST['captcha']);
    $protocol = $_POST['protocol'];
    //验证协议
    if($protocol ==1){
        //验证验证码是否正确
        if($captcha == $_SESSION['captcha']){
            //验证密码是否为空
            if(empty($password) || empty($repwd)){
                echo "<script>alert('密码不能为空');history.back();</script>";
            }else{
                //验证用户名是否为空
                if(empty($username)){
                    echo "<script>alert('用户名不能为空');history.back();</script>";
                }else{
                    //验证两次密码是否一样
                    if($password != $repwd){
                        echo "<script>alert('两次密码不一致');history.back();</script>";
                    }else{
                        //验证用户名是否存在
                        if(oneSelect("select id from member where username='$username'")){
                            echo "<script>alert('用户名已存在');history.back();</script>";
                        }else{
                            //密码加密
                            $password = md5($password);
                            //添加注册时间
                            $add_time = time();
                            //新用户送余额
                            $money = 100;
                            //将信息写入表
                            $sql = "insert into member(username,password,add_time,money) value('$username','$password',$add_time,$money)";
                            if($id = insert($sql)){
                                //将信息写入session
                                $_SESSION['mid'] = $id;
                                $_SESSION['mname'] = $username;
                                //销毁验证码
                                unset($_SESSION['captcha]']);
                                session_cart_sql();
                                echo "<script>alert('用户注册成功');location='/';</script>";
                            }else{
                                echo "<script>alert('用户注册失败');history.back();</script>";
                            }
                        }
                    }

                }
            }
        }else{
            echo "<script>alert('验证码不正确，请重新输入');history.back();</script>";
        }
    }
}

//登录功能
function login(){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $captcha = trim($_POST['captcha']);
    //用户名不能为空
    if(empty($username)){
        echo "<script>alert('用户名不能为空');history.back();</script>";
    }else{
        //密码不能为空
        if(empty($password)){
            echo "<script>alert('密码不能为空');history.back();</script>";
        }else{
            //验证吗
            if($captcha == $_SESSION['captcha']){
                //对密码进行加密
                $password = md5($password);
                //查询账户和密码
                $member = oneSelect("select id,username,avatar from member where username='$username' and password='$password'");
                /*var_dump("select id,username,avatar from member where username='$username' and password='$password'");
                exit;*/
                if($member){
                    //将信息写入session
                    $_SESSION['mid'] = $member['id'];
                    $_SESSION['mname'] = $member['username'];
                    $_SESSION['avatar'] = $member['avatar'];
                    //销毁验正码
                    unset($_SESSION['captcha']);
                    session_cart_sql();
                  //跳转回什么地方
//                    if($_GET['url'] == 'mycart' ){
//                        echo "<script>alert('用户登录成功');location = '/home/cart/mycart.php';</script>";
//
//                    }else{
                        switch(isset($_SESSION['url'])){
                            case "myorder":
                                unset($_SESSION['url']);
                                echo "<script>alert('用户登录成功');location = '/home/order/myorder.php';</script>";
                                break;
                            default:
                                echo "<script>alert('用户登录成功');location = '/';</script>";
                        }


//                    }
                }else{
                    echo "<script>alert('用户名和密码不正确，请重新输入');history.back();</script>";
                }

            }else{
                echo "<script>alert('验证码不正确，请重新输入');history.back();</script>";
            }
        }
    }
}

//退出
function logout(){
    unset($_SESSION['mname']);
    unset($_SESSION['mid']);
    unset($_SESSION['avatar']);
    echo "<script>alert('用户退出成功');location = '/';</script>";
}

//更改用户个人信息
function upinfo(){

    $id = $_SESSION['mid'];
    $mobile = trim($_POST['mobile']);
    $email = trim($_POST['email']);
    //创建一个对象
    $upload = new upload1();
    $avatar = $upload->upload();

    if($avatar[0]['status'] != 'ok'){
        echo "<script>alert('头像上传错误');history.back();</script>";
    }else{
        //验证手机号码
        preg_match_all('/^1[35789]\d{9}/',$mobile,$arr);
//        echo "<pre>";
//        var_dump(empty($arr));
//        exit;
        if(empty($arr)){
            echo "<script>alert('手机号码错误');history.back();</script>";
        }else{
            //验证邮箱
            $regex = '/\w+@\w+(\.\w+)+/';
            preg_match_all($regex,$email,$arr);
            if(empty($arr)){
                echo "<script>alert('邮箱格式不正确');history.back();</script>";
            }else{
                //删除原头像
                unlink('/upload/'.$_SESSION['avatar']);
                //获取新头像的文件名
                $filename = $avatar[0]['filename'];
                //更新信息
                $sql = "update member set mobile=$mobile,email='$email',avatar='$filename' where id=$id";
                /*var_dump($sql);
                exit;*/
                if(update($sql)){
                    $_SESSION['avatar'] = $filename;
                    exit;
                    echo "<script>alert('用户信息更新成功');this.parent.location = '/home/usercetent/index.php';</script>";
                }else{
                    echo "<script>alert('用户信息更新失败');history.back();</script>";
                }
            }
        }
    }
}

//更改密码
function changepwd(){
    $id = $_SESSION['mid'];
    $oldpwd = trim($_POST['oldpwd']);
    $newpwd = trim($_POST['newpwd']);
    $repwd = trim($_POST['repwd']);

    //验证原密码不能为空
    if(empty($oldpwd)){
        echo "<script>alert('原密码不能为空');history.back()</script>";
    }else{
        //新密码不能为空
        if(empty($newpwd)){
            echo "<script>alert('新密码不能为空');history.back()</script>";
        }else{
            //验证两次密码是否一样
            if($newpwd == $repwd){
                //验证老密码是否正确
                $pwd = oneSelect("select password from member where id=$id");
                if(md5($oldpwd) == $pwd['password']){
                    //将新密码写入数据库
                    $newpwd = md5($newpwd);
                    $sql = "update member set password='$newpwd' where id=$id";
//                   var_dump($sql);
//                    exit;
                    if(update($sql)){
                        echo "<script>alert('密码修改成功');location = '../usercetent/main.php';</script>";
                    }else{
                       echo "<script>alert('密码修改失败');history.back()</script>";
                    }
                }else{
                    echo "<script>alert('原密码不正确');history.back()</script>";
                }
            }else{
                echo "<script>alert('两次新密码不一致');history.back()</script>";
            }
        }
    }
}

//登录或者注册时将购物车中的数据写入数据库中
function session_cart_sql(){
    $mid = $_SESSION['mid'];
    //判断session有无购物车商品
    if (isset($_SESSION['cart'])) {
        //提取session中的信息
        foreach ($_SESSION['cart'] as $k => $v) {
            $gid = $v['gid'];
            $buynum = $v['buynum'];
            $add_time = $v['add_time'];
            //判断购物车中有无该商品
            if (oneSelect("select id from cart where gid=$gid and mid=$mid limit 1")) {
                update("update cart set buynum=buynum+$buynum where gid=$gid and mid=$mid");
            } else {
                insert("insert into cart(mid,gid,buynum,add_time) value($mid,$gid,$buynum,$add_time)");
            }
        }
    }
    unset($_SESSION['cart']);
    setcookie(session_name(),session_id(),0,'/');

}


//更改支付密码功能
function update_pay(){
    $paypwd = trim($_POST['newpay']);
    $repay = trim($_POST['repay']);
    $id = $_SESSION['mid'];
    //检测支付密码是否存在
    if(oneSelect("select paypwd from member where id={$_SESSION['mid']}")){
        //检测旧密码是否正确
        $member = oneSelect("select paypwd from member where id=$id ");
        if($member['paypwd'] == md5($_POST['oldpaypwd'])){
            if($paypwd == $repay){
                //检侧密码是否为六位数字
                if(preg_match('/^\d{6}$/',$paypwd,$arr)){
                    $paypwd = md5($paypwd);
                    if(update("update member set paypwd='$paypwd' where id=$id")){
                        echo "<script>alert('支付密码设置成功');location = '../usercetent/main.php'</script>";
                    }else{
                        echo "<script>alert('支付密码设置失败');history.back()</script>";

                    }
                }else{
                    echo "<script>alert('密码必须是六位数字');history.back()</script>";
                }
            }else{
                echo "<script>alert('两次密码不一致');history.back()</script>";
            }
        }else{
            echo "<script>alert('原密码不正确');history.back()</script>";
        }

    }else{
        //没有支付密码
        if($paypwd == $repay){
            //检侧密码是否为六位数字
            if(preg_match('/^\d{6}$/',$paypwd,$arr)){
                $paypwd = md5($paypwd);
                if(update("update member set paypwd='$paypwd'where id=$id")){
                    echo "<script>alert('支付密码设置成功');location = '../usercetent/main.php'</script>";
                }else{
                    echo "<script>alert('支付密码设置失败');history.back()</script>";

                }
            }else{
                echo "<script>alert('密码必须是六位数字');history.back()</script>";
            }
        }else{
            echo "<script>alert('两次密码不一致');history.back()</script>";
        }
    }



}