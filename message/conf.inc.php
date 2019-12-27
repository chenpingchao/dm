<?php
//打开session、
session_start();
//设置汉字编码
header("Content-Type:text/html;Charset= utf-8;");
//设置时区
date_default_timezone_set('PRC');

//sql常量设置
define('SERVER_IP','127.0.0.1');
define('SERVER_PORT','3306');
define('SERVER_USER','root');
define('SERVER_PWD','root');
define('DATABASE','zhengke');
define('CHARSET','utf8');


define('ROOT',str_replace('\\','/',dirname(__FILE__)));
//包含数据库分装函数
include_once ROOT."/libs/sql.inc.php";
sqlbeign();

function dd($a){
    echo "<pre>";
    print_r($a);
    echo "</pre>";
}

//声明一个memcached对象
$mem = new Memcache;
$mem -> connect('127.0.0.1',11211);

$notSay= [
    '妈的',
    '我操',
    '狗屎',
];
