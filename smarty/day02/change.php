<?php

require_once "config.php";

$id = $_GET['id'];

//预处理
$stmt = $pdo -> prepare("update goods set price=price-1000 where id=? limit 1");
$stmt -> execute([$id]);
//清理缓存
if($stmt -> rowCount()>0){
    $smarty -> clearCache("goods/detail.html",$id);
}
header("location:goodsList.php");
