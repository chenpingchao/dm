<?php
//设置时区
date_default_timezone_set("PRC");
//打开session
session_start();
//定义网站根目录
define("ROOT",str_replace("\\","/",dirname(__FILE__)).'/');

//引用smarty文件
require_once ROOT."libs/Smarty.class.php";
//实例化一个smarty对象
$smarty = new Smarty();
//设置模板文件夹 和生成页面文件夹
$smarty -> setTemplateDir(ROOT."templates/")
        -> setCompileDir(ROOT."templates_c/")
        -> auto_literal = false;

/*//自定义边界符
$smarty -> left_delimiter = "({";
$smarty -> right_delimiter = "})";*/

//链接数据库
$pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=yhshop",'root','root',[
   PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"
]);