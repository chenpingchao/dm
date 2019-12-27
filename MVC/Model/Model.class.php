<?php
//声明一个模型的基础类
class model{
    protected static $db;
    //构造方法（链接数据库）
    public function __construct()
    {
        try{
            $pdo = new PDO("mysql:host=127.0.0.1;prot=3306;dbname=yhshop","root","root",[
               PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
               PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"
            ]);
            self::$db = $pdo;
        }catch(PDOException $e){
            $e -> getMessage();
        }
    }
}