<?php
require_once "config.php";

//接受id
$id = $_GET['id'];

//判断缓存文件是否存在
if(!$smarty->isCached("goods/detail.html",$id)){
    //预处理
    $stmt = $pdo -> prepare("select * from goods where id=? limit 1");
    $stmt -> execute([$id]);
    $smarty -> assign('detail',$stmt->fetch(PDO::FETCH_ASSOC));
}
//显示并保存
$smarty -> display("goods/detail.html",$id);
