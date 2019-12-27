<?php
require_once "config.inc.php";
//替换
/*//索引数组
$smarty -> assign("p2",['牛逼','我操']);
//关联数组
$smarty -> assign("p3",['username' => '汤姆','age'=>'???']);
//对象
$smarty -> assign("p4",new yang());



class yang{
    public $username = "灰太狼";
    public function msg(){
        echo $this->username."拥有不死之身";
    }
}*/
/*//整数
$smarty -> assign("p1","12387");
$smarty -> assign("p2","盘他");
$smarty -> assign("p3","上");*/
//setcookie("age","是一个未知数",0,'/');
//$_SESSION['say'] = "混子";
try{
$rel = $pdo -> query("select * from goods");
$smarty -> assign("arr",$rel->fetchAll(PDO::FETCH_ASSOC));
}catch (PDOException $e){
    $e -> getMessage();
}
//显示页面
$smarty -> display("test2.html");
