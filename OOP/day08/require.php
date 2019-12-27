<?php
require_once '3session.class.sql.php';
//phpinfo();
//ini_set('session.gc_maxlifetime','10');
//ini_set('session.gc_divisor','1');
//try{
//    $mem = new Memcache();
//    $mem ->connect('127.0.0.1','11211');
//    var_dump($mem);
//    $mem -> set('user','jack',false,0);
//    $mem -> get('user');
//}catch(PDOException $e){
//    $e ->getMessage();
//}

//session_start();
//$_SESSION['sess'] = 1;
//echo $_SESSION['sess'];

try{
$pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=yhshop','root','root',[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8'
]);
}catch(PDOException $e){
    $e -> getMessage();
}
Session::start($pdo);

$_SESSION['sess'] = 1;
echo $_SESSION['sess'];