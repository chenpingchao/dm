<?php
header("Content-Type:text/html;charset:utf-8;");

//链接到服务器
@$connect = mysql_connect("127.0.0.1:3306",'root','root');
//链接到数据库
mysql_select_db('hyb');
//设置数据库的字符编码；
mysql_set_charset('utf8');


//添加会员
function add(){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $password1 = md5($_POST['password1']);
    $email = $_POST['email'];
    $sex = $_POST['sex'];
    $meble = $_POST['meble'];

    if($username){
        //判断两此密码输入是否一致
        if($password == $password1){
            //判断邮箱的格式,调用email函数

        }else{
            echo "<script>alert('两次密码不一样');history.back();</script>";
        }
    }else{
        echo "            
            <script>alert('用户名不能为空');history.back();
        </script>";
    }

}
function email($email){
    $email = '/\w+\.@\w+\.\w+/';
}
$moTH = $_GET['act'];
$moTH();
//断开数据库的链接
mysql_close($connect);