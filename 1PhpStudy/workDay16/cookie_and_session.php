<?php

header("Content-Type:text/html;charset:utf-8;");
//cookie设置
setcookie('username','三三',time()+30,'/' );
$arr = ['四四','五五','六六六'];
setcookie('erthor',serialize($arr),time()+30,'/');


print_r($_COOKIE);
//session设置
/*//开启session
session_start();
//设置session
$_SESSION['username'] = 'cxk';
$_SESSION['aihao'][] = '唱';
$_SESSION['aihao'][] = '跳';
$_SESSION['aihao'][] = 'ripe';
$_SESSION['aihao'][] = '篮球';*/
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="cookieAndSessionget.php">获得cookie值</a>
</body>
</html>

