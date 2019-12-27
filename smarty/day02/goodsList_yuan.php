<?php
require_once "config.php";

//静态页面的路径
$static_file = ROOT."cache/goodsList.html";
//过期时间
$filetime = 10;
//判断静态页面是否存在，有没有过期
if(!file_exists($static_file)|| filemtime($static_file)+10 < time() ){
    echo "数据来自数据库";
    //打开缓存
    ob_start();
    //查询数据库
    $result = $pdo -> query("select * from goods");
//var_dump($result->fetchAll(PDO::FETCH_ASSOC));
    $smarty -> assign("arr",$result->fetchAll(PDO::FETCH_ASSOC));
    $smarty -> display("goods/goodsList.html");
    //从缓存中获取内容
    $str = ob_get_contents();
    //将获取的内容写入静态文件中
    file_put_contents($static_file,$str);
    //清空并关闭缓存,输出内容
    ob_end_flush();
}else{
    //应用静态文件
    echo "来自静态文件";
    require_once $static_file;
}

