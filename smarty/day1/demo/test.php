<?php
require_once "smarty.class.php";
$smarty = new Smarty();
//替换数据
$smarty -> assign("title","这是一个标题");
$smarty -> assign("p","这是一个段落");
$smarty -> assign("p1","这是另外的段落");

//进行显示
$smarty -> display("test.html");