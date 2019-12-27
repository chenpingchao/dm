<?php
require_once "../../conf.inc.php";

$act = $_GET['act'];
$act();


//发货
function delGoods(){
    $oid  = $_GET['oid'];
    if(update("update orders set status=3 where id=$oid")){
        echo "<script>alert('订单发货成功');location = 'list.php'</script>";
    }else{
        echo "<script>alert('订单发货失败');location = 'list.php'</script>";
    }
}
