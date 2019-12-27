<?php
//phpinfo();
echo "<pre>";
//二、mysqli数据库服务器连接，以及选择要操作的数据库
$mysqli = new mysqli('127.0.0.1:3306','root','root','zhengke');
echo "<pre>";
//print_r($mysqli);

//三、mysqli设置客户端的汉字编码
$mysqli -> set_charset('utf8');

//四、mysqli的CURD操作;
/*//数据库记录增加
$mysqli -> query("insert into zk_member(username,password) value ('飞上天','123')");
//获取影响记录的条数
$num = $mysqli->affected_rows;
//echo $num."<br>";
//获取最后插入的记录的主键的id
$id = $mysqli -> insert_id;
//echo $id."<br>";

//数据库记录的更改
$mysqli -> query("update zk_member set username='和太阳肩并肩' where id =15");
//获取影响记录的条数
$num = $mysqli->affected_rows;
//echo $num."<br>";

//数据库记录的删除
$mysqli -> query("delete from zk_member where id=14");
//获取影响记录的条数
$num = $mysqli->affected_rows;
//echo $num."<br>";

//查询数据库的记录
$result = $mysqli -> query("select * from zk_member ");
//print_r($result);*/

//五、mysqli的结果集对象的处理(记录条数获取、单条记录、所有记录的获取)
/*//查询数据库的记录
$result = $mysqli -> query("select * from zk_member where id <= 3");
//结果集对象 记录条数的获取
//echo $result -> num_rows;
//单条记录的获取
    //索引数组
        $message = $result -> fetch_row();
        print_r($message);
    //关联数组
        $message = $result -> fetch_assoc();
       print_r($message);
//所有记录的获取
        $message = $result -> fetch_all(MYSQLI_ASSOC);
        print_r($message);
*/

//六、mysqli的增删改操作的受影响记录条数获取、最后插入记录的主键id的获取
//七、结果集的释放、服务器连接关闭
/*//释放资源结果集
var_dump($result ->free_result());
//关闭连接
var_dump($mysqli -> close());*/

//八、mysqli的CURD的预处理操作
/*//链接数据库
$mysqli = new mysqli('127.0.0.1:3306' ,'root','root','yhshop');
//预处理对象初始化
$stmt = $mysqli ->stmt_init();
//sql语句的准备
$sql = "insert into member(username,password) values (?,?)";
$stmt -> prepare($sql);
//绑定变量
$stmt ->bind_param('ss',$into_user,$into_pass);
//给变量赋值
$into_user = '你咋不上天类';
$into_pass = '我已升天，感觉良好';
//执行sql语句
$stmt -> execute();echo "<br>";
//返回插入的ID
$stmt ->insert_id;echo "<br>";
//返回影像记录的行数
$stmt ->affected_rows;*/

/*//链接数据库   修改数据库
$mysqli = new mysqli('127.0.0.1:3306' ,'root','root','zhengke');
//sql语句的准备
$sql = "update zk_member set username=?,password=? where id=2";
//预处理对象
$stmt = $mysqli ->prepare($sql);
//绑定变量
$stmt ->bind_param('ss',$update_user,$update_pass);
//给变量赋值
$update_user = '脸滚键盘';
$update_pass = 'asfduwoirey9pwyhfcapf6';
//执行sql语句
$stmt -> execute();echo "<br>";
//返回影像记录的行数
echo $stmt ->affected_rows;*/

/*//链接数据库   删除数据库
$mysqli = new mysqli('127.0.0.1:3306' ,'root','root','zhengke');
//sql语句的准备
$sql = "delete from zk_member where id>?";
//预处理对象
$stmt = $mysqli ->prepare($sql);
//绑定变量
$stmt ->bind_param('i',$del_id);
//给变量赋值
$del_id = 10;
//执行sql语句
$stmt -> execute();echo "<br>";
//返回影像记录的行数
echo $stmt ->affected_rows;*/

//链接数据库   查询数据库
/*$mysqli = new mysqli('127.0.0.1:3306' ,'root','root','zhengke');
//sql语句的准备
$sql = "select * from zk_member where id<?";
//预处理对象
$stmt = $mysqli ->prepare($sql);
//绑定变量
$stmt ->bind_param('i',$sel_id);
//给变量赋值
$sel_id = 10;
//执行sql语句
$stmt -> execute();echo "<br>";
//资源结果集对象
$result = $stmt -> get_result();
print_r($result);
//处理资源结果集
$arr = $result->fetch_all(MYSQLI_ASSOC);
print_r($arr);*/

//九、mysqli的多条语句的执行
/*//增删改的多条语句执行
$sql = "insert into zk_member(username,password) values ('张三','123');";
$sql .= "update zk_member set username='你好啊';";
$sql .= "delete from zk_member where id = 3";
var_dump($mysqli -> multi_query($sql));*/

//查询多条语句执行
$sql = "select * from zk_member where id=1;";
$sql .= "select * from zk_member where id=4;";
$sql .= "select * from zk_member where id=2;";
var_dump($mysqli ->multi_query($sql));
//抽取资源结果集
$result = $mysqli -> store_result();
print_r($result -> fetch_assoc());
$mysqli -> next_result();
//第二条
$result = $mysqli -> store_result();
print_r($result -> fetch_assoc());
$mysqli -> next_result();
//第三条
$result = $mysqli -> store_result();
print_r($result -> fetch_assoc());

//十、mysqli的事务处理的流程x
/*//数据库存储引擎设为InnoDB
//关闭自动提交
$mysqli -> autocommit(0);
//开启事务处理
$mysqli ->begin_transaction();
//执行要操作的sql语句
$rel1 = $mysqli ->query("update zk_member set say_num=say_num+20 where id = 1");
$rel2 = $mysqli -> affected_rows;
$rel3 = $mysqli ->query("update zk_member set say_num=say_num-20 where id = 2");
$rel4 = $mysqli -> affected_rows;

var_dump($rel1);
var_dump($rel2);
var_dump($rel3);
var_dump($rel4);
//出现错误进行回滚
if($rel1 && $rel2 && $rel3 && $rel4 ){
    $mysqli->commit();
}else{
    $mysqli -> rollback();
}
//开启自动提交
$mysqli -> autocommit(1);*/


//mysqlimprove
/*$mysqli = new mysqli();
$mysqli -> connect_errno;
$mysqli -> connect_error;
$mysqli -> set_charset('utf8');
$mysqli -> query('');
$mysqli -> insert_id;
$mysqli -> affected_rows;
$result -> num_rows;
$result -> fetch_array();
$result -> fetch_assoc();
$result -> fetch_row();
$result -> fetch_all(MYSQL_ASSOC||MYSQLI_NUM);
$result -> free_result();
$mysqli -> close();
$mysqli -> multi_query('');
$mysqli -> store_result();
$mysqli -> next_result();
$mysqli ->*/