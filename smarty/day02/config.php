<?php
session_start();
//设置时区
date_default_timezone_set("PRC");

//设置网站根目录
define("ROOT",str_replace('\\','/',dirname(__FILE__)).'/');

//链接数据库
try{
$pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=yhshop","root","root",[
   PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
   PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"
]);
}catch(PDOException $e){
    $e -> getMessage();
}

//引用模板文件
require_once "libs/Smarty.class.php";
//打开模板引擎
$smarty = new Smarty();
//设置模板路径和编译文件路径
$smarty -> setTemplateDir(ROOT.'templates/')
        -> setCacheDir(ROOT.'templates_c/');
//建立缓存
$smarty -> caching = true;
//设置缓存目录
$smarty -> setCacheDir(ROOT.'cache');
//设置缓存时间
$smarty -> cache_lifetime = 5;