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
define('DATABASE','yhshop');
define('CHARSET','utf8');

//定义前端和后端的根路径
//定义前端的路径    / 代表服务器的根路径
//定义后台的根目录
define('ROOT',str_replace('\\','/',dirname(__FILE__)));
//echo ROOT;

//前端静态文件路径
define('HOME_SKIN','/public/home/default/');
//后台静态文件路径
define('ADMIN_SKIN','/public/admin/default/');
//上传图片的路径
define('UPLOAD',ROOT.'/upload/');
//包含数据库分装函数
include_once ROOT."/public/libs/sql.inc.php";
sqlbeign();


//订单状态
$member_orders = [
  1 => '待付款',
  2 => '待发货',
  3 => '待收货',
  4 => '已完成',
];

function dd($a){
    echo "<pre>";
    print_r($a);
    echo "</pre>";
}
