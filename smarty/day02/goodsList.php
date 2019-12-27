<?php
require_once "config.php";

//判断缓存实例是否被缓存
if(!$smarty->isCached("goods/goodsList.html")){
    echo "来自数据库";
    $result = $pdo -> query("select * from goods");
    $smarty-> assign("goods",$result -> fetchAll(PDO::FETCH_ASSOC));
}
//输出并保存文件
$smarty -> display("goods/goodsList.html");



