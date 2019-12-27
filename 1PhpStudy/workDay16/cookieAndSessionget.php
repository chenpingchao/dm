<?php
/*//开启session
session_start();*/
//coolie操作
//获取
print_r($_COOKIE['username']);
print_r($_COOKIE['erthor']);
print_r(unserialize($_COOKIE['erthor']));

//删除操作
setcookie('username',null,time()-1,'/');
setcookie('erthor',null,time()-1,'/');

//session操作
/*echo "<pre>";
print_r($_SESSION['username']);
print_r($_SESSION['aihao']);

//销毁
unset($_SESSION['username']);
unset($_SESSION['aihao']);*/