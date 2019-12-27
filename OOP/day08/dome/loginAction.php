<?php
require_once "conf.inc.php";

$username = $_GET['username'];
$pwd = $_GET['pwd'];

$result = $pdo -> query("select * from member where username='$username' and password='$pwd' limit 1");
if($rel = $result ->fetch(PDO::FETCH_ASSOC)){
    //将已登录人员顶掉
    $pdo -> exec("delete from session where mid={$rel['id']} limit 1");

    $_SESSION['user'] = $rel['username'];
    $_SESSION['mid'] = $rel['id'];

    //将登录信系写入session表中
    $sess = session_id();
    echo $sess;
    var_dump($pdo -> exec("update session set mid={$rel['id']} where sid='$sess' "));
//    echo "<script>alert('登录成功');location='list.php';</script>";
}else{
    echo "<script>alert('登录失败');history.back();</script>";
}