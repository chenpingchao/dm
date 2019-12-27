<?php
//六、pdo的CURD的预处理操作
//链接数据库，设置异常处理模式，设置汉字编码
/*$pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=yhshop",'root',"root",[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"
]);

//准备要执行的sql语句
//数据库数据的增加
$stmt = $pdo -> prepare("insert into member(username,password) values(:username,:password)");

//绑定sql语句
$stmt -> bindParam(':username',$username,PDO::PARAM_STR);
$stmt -> bindParam(':password',$password,PDO::PARAM_INT);
//赋值
$username = '你好aaa啊';
$password = 123123;
//执行sql语句
$stmt -> execute(['username'=>$username,'password'=>$password]);*/

/*$pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=yhshop",'root',"root",[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"
]);
//更改数据库信息
$stmt = $pdo -> prepare("update member set username='发烧为生' where id=?");
$stmt -> bindParam(':id',$id,PDO::PARAM_INT);
$id = 2;
//执行语句并 绑定数据
$stmt -> execute([$id]);*/

/*ini_set("display_errors","On");
error_reporting(E_ALL & ~E_NOTICE);*/

echo $a;