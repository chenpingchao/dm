<?php
require_once "session.class.php";
try{
$pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=yhshop','root','root',[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8'
]);
}catch(PDOException $e){
    $e -> getMessage();
}
Session::start($pdo);