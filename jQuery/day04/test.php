<?php

$username = trim($_REQUEST['username']);

if($username){
    print_r(json_encode(["stats"=>"ok","msg"=>"验证成功"]));
}else{
    print_r(json_encode(["stats"=>"error","msg"=>"信息验证失败"]));
}