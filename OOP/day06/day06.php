<?php
//phpinfo();
//二、pdo数据库服务器连接，以及选择要操作的数据库,设置错误模式，设置汉字编码
try{
    $pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=yhshop','root','root',[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8'
        ]);
    //三、pdo的CURD操作
    //增加数据库记录
        var_dump( $pdo -> exec("insert into member(username,password) values('刘辟','123123') ") );
        echo $pdo -> lastInsertId();
    //更改数据数据记录
        var_dump( $pdo -> exec( "update member set username='777' where id=4 " ) );
    //删除数据记录
        var_dump( $pdo -> exec("delete from member where id=4") );
    //查询数据记录
        $rel = $pdo -> query("select * from member ");
    //四、pdo的结果集对象的处理(记录条数获取、单条记录、所有记录的获取)
    $rel = $pdo -> query("select username,password from member ");
    echo "<pre>";
    //记录条数获取
    echo $rel -> rowCount();
//    抽取单条记录
    $data = $rel -> fetch(MYSQLI_ASSOC);
    print_r($data);
    //所有记录获取
    $data1 = $rel -> fetchAll(PDO::FETCH_ASSOC);
    print_r($data1);

    //六、pdo的CURD的预处理操作
    //七、pdo的事务处理的流程
}catch(PDOException $e){
    $e ->getMessage();
}
