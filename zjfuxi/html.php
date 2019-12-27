<?php
require_once "smarty.class.php";
$smarty = new Smarty();
$smarty -> assign("title","头部");
$smarty -> display("html.html");