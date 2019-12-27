<?php

require_once "../../conf.inc.php";
if(empty($_SESSION['aid'])){
    header("location:../index.php");
}

$act = $_GET['act'];
$act();

//激活和禁用会员
function active(){
    $id = $_GET['id'];
    $active = $_GET['active']==1 ? 2 : 1;
    $cat = $active==1 ? '激活' : '禁用';
    if(update("update member set active=$active where id=$id")){
        echo "<script>alert('会员{$cat}成功');location = 'list.php'</script>";
    }else{
        echo "<script>alert('会员{$cat}失败');history.back()</script>";
    }
}

//批量禁用会员
function act2(){
    $arr = $_POST['chk'];
    $join = join(',',$arr);
//    echo $join;
    $sql = "update member set active=2 where id in($join)";
    if(update($sql)){
        echo "<script>alert('会员禁用成功');location = 'list.php'</script>";
    }else{
        echo "<script>alert('会员禁用失败');history.back()</script>";
    }
}
//批量激活会员
function act1(){
    $arr = $_POST['chk'];
    $join = join(',',$arr);
//    echo $join;
//    exit;
    $sql = "update member set active=1 where id in($join)";
    if(update($sql)){
        echo "<script>alert('会员激活成功');location = 'list.php'</script>";
    }else{
        echo "<script>alert('会员激活失败');history.back()</script>";
    }
}
