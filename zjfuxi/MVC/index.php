<?php
//phpinfo();
session_start();
date_default_timezone_set("PRC");
//设置网站根目录
define("ROOT",str_replace("\\","/",dirname(__FILE__)).'/');

//设置自动加载时检索的目录
set_include_path(get_include_path()
    .PATH_SEPARATOR.ROOT."Controller"
    .PATH_SEPARATOR.ROOT."Model"
    .PATH_SEPARATOR.ROOT."libs"
    .PATH_SEPARATOR.ROOT."libs/plugins"
    .PATH_SEPARATOR.ROOT."libs/sysplugins"
);

//当new一个不存在的类时  ，自动寻找并加载文件
function autoload($classname){
    //判断文件的后缀名是什么(plugins和sysplugins两个目录中后缀为.php)
    if(file_exists(ROOT."libs/plugins/".$classname.".php") || file_exists(ROOT."libs/sysplugins/".$classname.".php") ){
        include_once $classname.'.php';
    }else{
        include_once $classname.'.class.php';
    }
}
spl_autoload_register("autoload");
//获得用户提交请求的控制器
$c = isset($_GET['c']) ? $_GET['c']."Controller" : "indexController";

//判断该控制器是否存在
if(file_exists(ROOT."Controller/".$c.".class.php")) {
    //如果该控制器存在
    $contro = new $c();
}else{
    //如果该控制器不存在
    exit("你要的控制器不存在");
}

echo ROOT;
echo "<br>";
echo strtotime(date('Y-m-01', strtotime(date("Y-m-d"))));
echo "<br>";
echo strtotime("2019-10-01");
echo "<br>";
echo date('Y-m-d',strtotime("-1 years"));
echo "<br>";
echo strtotime(date('Y-m-01',time()));

