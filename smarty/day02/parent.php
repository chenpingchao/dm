<?php

require_once "config.php";

$smarty -> assign("content","这是内容");

//显示页面
$smarty -> display('extend/parent.html');