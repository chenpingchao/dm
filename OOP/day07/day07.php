<?php
//var_dump(extension_loaded('memcache'));
//$mem -> addServer('127.0.0.1','11211');
//$mem -> addServer('10.50.0.159','11211');
/*//实例化一个memcache类
$mem = new Memcache;
//连接memcache服务器
$mem -> connect('127.0.0.1',11211);

//增加
//$mem -> add('a','aaaaaaaaa',0,100);

//修改
//$mem -> set('a','bbbbbbbbbbb',0,100);

//删除
$mem -> delete('a');
//查询
var_dump($mem -> get('a'));

//关闭服务器连接
$mem -> close();*/


/*$mem -> addServer('127.0.0.1','11211');
$mem -> addServer('10.50.0.159','11211');
$mem -> addServer('10.50.0.157','11211');*/

/*$mem ->set('a',1,0,1000);
$mem ->set('b',2,0,1000);
$mem ->set('c',3,0,1000);
$mem ->set('4',4,0,1000);
$mem ->set('e',5,0,1000);
$mem ->set('f',6,0,1000);
$mem ->set('g',7,0,1000);
$mem ->set('h',8,0,1000);
$mem ->set('i',9,0,1000);
$mem ->set('j',10,0,1000);
$mem ->set('k',11,0,1000);
$mem ->set('l',12,0,1000);
$mem ->set('m',13,0,1000);*/
$mem = new Memcache;
$mem -> connect('10.50.0.159','11211');
var_dump($mem -> get('age'));
