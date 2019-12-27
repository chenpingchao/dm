<?php
//七、pdo的事务处理的流程
$pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=yhshop",'root',"root",[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"
]);
//设置存储引擎为innoDB
$pdo -> exec("alter table member engine=InnoDB");
//关闭自动提交
$pdo -> setAttribute(PDO::ATTR_AUTOCOMMIT,0);
//开启事务处理
$pdo -> beginTransaction();
//执行sql语句
$rel1 = $pdo -> exec("insert into member(username,password) values ('aaaa',123123)");
$rel3 = $pdo -> lastInsertId();
$rel2 = $pdo -> exec("update member set username='事务处理' where id=$rel3");
////判断执行的情况
if($rel1 ){
    echo "执行成功";
    $pdo ->commit();
}else{
    echo "失败";
    $pdo ->rollBack();
}
//开启自动提交
$pdo ->setAttribute(PDO::ATTR_AUTOCOMMIT,1);
