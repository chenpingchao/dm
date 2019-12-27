<?php
//    链接数据库
@$connect = mysql_connect('127.0.0.1:3306','root','root');
//
mysql_select_db("hyb");
//    汉字编码
mysql_set_charset("utf-8");

//获取表单信息
$act=trim($_GET['zxc']);

//判断执行什么操作
switch($act){
    case "add" : add() ; break;
    case "delete" : delete() ; break;
    case "new" : newpassword() ; break;
}


//添加
function add(){
//获取表单信息
    $username = trim($_POST['username']);
    $password = md5(trim($_POST['password']));
    $password1 = md5(trim($_POST['password1']));
    echo $password;
    echo $password1;
//判断两次密码是否一样
    if ($password == $password1) {
//        添加会员的时间
        $addTime = time();
        //插入sql语句
        $sql = "insert into member(usename,password,addTime) values('$username','$password','$addTime')";
//    执行sql语句
//        判断sql语句是否执行
        if (mysql_query($sql)) {
            echo "<script> alert('注册成功');location = 'deleteMumber.php';</script>";
        }
    } else {
        echo "<script>alert('两次密码不一样') ;history.back()</script>";
    }
}

//删除会员
function delete(){
    //获取要删除的ID
    $id = trim($_GET['id']);
    //删除sql语句
//    $sql = "delete from member where id= $id";
    $sql = "delete from member where id=$id";
    //执行sql语句
    if(mysql_query($sql) && mysql_affected_rows()>0){
        echo "<script>alert('会员删除成功');location = 'deleteMumber.php';</script>";
    }else{
        echo "<script>alert('会员删除失败');//history.back()</script>";
    }
}

//更改密码
function newpassword(){
//    接受更改密码页面传来的表单
    $id = $_POST['id'];
    $oldpassword = md5(trim($_POST['oldpassword']));
    $newpassword = trim($_POST['newpassword']);
    $newpassword1 = trim($_POST['newpassword1']);
//    查询数据库的对应的原密码
    $result = mysql_query("select password from member where id=$id");
    //抽取资源信息
    $pass = mysql_fetch_assoc($result);
//    判断原密码和输入密码是否相等
    if($oldpassword == $pass['password']){
//        判断新密码是否一致
        if($newpassword == $newpassword1){
//            加密
            $newpassword = md5($newpassword1);
//            更改密码的sql语句
            echo $id;
            $sql = "update member set password='$newpassword' where id=$id";
//            判断是否执行sql语句
            if(mysql_query($sql) && mysql_affected_rows()>0){
                echo "<script>alert('密码更新成功')</script>";
            }else{
                echo "<script>alert('密码更新失败')</script>";
            }
        }else{
            echo "<script>alert('两次新密码不一致')</script>";
        }
    }else{
        echo"<script>alert('原密码错误');history.back()</script>";
    }
}

//    断开服务器
mysql_close($connect);