<?php

//链接数据库
try{
$pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=yhshop",'root','root',[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"
]);
}catch(PDOException $e){
    $e ->getMessage();
}


$act = $_GET['act'];
$act();
function select_car(){
    global $pdo;
    //获取ID
    $id = $_GET['id'];
    //多表联合查询
    $rel = $pdo -> query("select c.id,buynum,image,deatil,goodsname,price from cart c,goods g 
    where c.gid=g.id and c.mid=$id and c.active=1 and g.active=1");

    print_r(json_encode($rel-> fetchAll()));
}

function del(){
    global $pdo;
    $id = $_POST['id'];

    //删除
    $stmt = $pdo -> prepare("delete from cart where id=?");
    $result = $stmt -> execute([$id]);
    if($stmt-> rowCount() && $result){
        print_r(json_encode(["ok",$id]));
    }else{
        print_r(["error"]);
    }
}