<?php
/*$mysqli = new MySQLi("127.0.0.1:3306",'root','root','yhshop');
echo "<pre>";
//print_r($mysqli);
//var_dump($mysqli ->connect_errno);

//设置汉字编码
$mysqli -> set_charset("utf8");
/*$result = $mysqli -> query("select * from goods");
print_r($result);
echo $result -> num_rows;
//返回索引数组
//print_r($result -> fetch_assoc());
//返回关联数组
//print_r($result -> fetch_row());
//抽取全部记录
//print_r($result -> fetch_all(MYSQLI_ASSOC));
var_dump($mysqli -> query("update goods set goodsname='你好' where id=4"));
var_dump($mysqli -> affected_rows );
var_dump($mysqli -> query("insert into goods(goodsname,price) values('nb','11')"));
var_dump($mysqli -> affected_rows );
var_dump($mysqli -> insert_id );

$result -> free_result();
var_dump($mysqli -> close());*/

/*// 预处理
$id = 10;
$stmt = $mysqli -> prepare("select * from goods where id=?");
//绑定参数
$stmt -> bind_param('i',$id);
$stmt -> execute();
//echo $stmt -> affected_rows;
$result = $stmt -> get_result();//返回资源结果集对象
echo $result -> num_rows;
//抽出资源结果集
$arr = $result -> fetch_all(MYSQLI_ASSOC);
print_r($arr);

//预处理增
$stmt = $mysqli -> prepare("insert into goods(goodsname,price) values(?,?)");
//绑定参数
$stmt -> bind_param("sd",$goodsname,$price);
$goodsname = "三星炸弹";
$price = 12;
//执行
$stmt -> execute();
echo $stmt -> affected_rows."<br>";
echo $i = $stmt -> insert_id."<br>";

//预处理增删改
$stmt = $mysqli -> prepare("delete from goods where id=?");
//绑定参数
$stmt -> bind_param("i",$id);
$id = $i;
//执行
$stmt -> execute();
echo $stmt -> affected_rows;*/


/*//事务处理
//关闭自动提交
$mysqli -> autocommit(false);
//开启事务处理
$mysqli -> begin_transaction();
//回滚操作
$mysqli -> rollback();
//手动提交
$mysqli -> commit();
//开启自动提交
$mysqli -> autocommit(true);*/

//PDO

/*$pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=yhshop",'root','root',[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ,
    PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"
] );*/


/*//事务处理
//设置存储引擎为Innodb
var_dump($pdo -> query("alter table goods engine=InnoDB "));

//关闭自动提交
$pdo -> setAttribute(PDO::ATTR_AUTOCOMMIT,0);
//开启事物处理
$pdo -> beginTransaction();
$pdo -> commit();
$pdo -> rollBack();*/

/*$memcache = new Memcache();
$memcache -> addServer("127.0.0.1","11211");
$memcache -> addServer("10.50.0.159","11211");
//print_r($memcache);
//var_dump($memcache -> connect("127.0.0.1",11211));
$memcache -> add("asafd1423ba","1111",0,1000);
$memcache -> add("awefsf52gaa","1112",0,1000);
$memcache -> add("aaefhe234rtgaa","1113",0,1000);
$memcache -> add("awewf24hsaa","1114",0,1000);
$memcache -> add("ahaff24haa","1115",0,1000);
$memcache -> add("asfaag242aera","1116",0,1000);
$memcache -> add("aweeras451hertaa","1117",0,1000);
$memcache -> add("aawrwraewfhrtthra","1118",0,1000);
$memcache -> add("aa23werwaeerrssfat651hsrtha","1119",0,1000);
$memcache -> add("ahwrwerw1rs71rethaa","110",0,1000);
$memcache -> add("asmaswerjri23reta","11",0,1000);
var_dump($memcache -> add("31467347aaa","1",0,1000));
//ini_set("session.save_handler",'user');
 var_dump($memcache -> set("name","123",0 , 1000));
// var_dump($memcache -> delete("name"));
//phpinfo();

echo $memcache -> get("qq");*/



//高级session


?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="../jQuery/jquery-1.8.2.js"></script>
    <style>
        div{
            width:300px;
            height:300px;
            background: #0f9ae0;
        }
    </style>
</head>
<body>
<div>

</div>
<button></button>
<input type="button" value="切换" name="button">
<input type="text" name="username"><span></span>
</body>
<script>
    $("[name=username]").focus(function(){
        $("span").text("请输入用户名").css("color","#555")
    })
    $("input:text").blur(function(){
        $("span").text("用户名不正确").css("color","red")
    })
    // $("input:last").change(function(){
    //     alert($(this).val());
    // })
    // $("input:first").click(function(){
    //     $("div").toggle();
    // })

    /*$("input:first").click(function(){
        $("div").slideDown(3000);
    })
    $("button").click(function(){
        $("div").slideUp(5000);
    })*/
    $("input:first").click(function(){
        $("div").fadeIn(3000);
    })
    $("button").click(function(){
        $("div").fadeOut(5000);
    })
</script>
</html>
