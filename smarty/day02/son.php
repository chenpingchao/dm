<?php

require_once "config.php";

$smarty -> assign("content","这是子代的内容");

$smarty -> display("extend/son.html");