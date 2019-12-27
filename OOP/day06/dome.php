<?php

try{
    if(!isset($a)){
        $a ='';
        throw new EchoException('变量不存在','1001');
    }elseif(!is_string($a) && !is_numeric($a)){
        throw new EchoException('变量不是字符串或数字',1002);
    }
    echo $a;
}catch (EchoException $e){
    $e ->getMessage();
}
