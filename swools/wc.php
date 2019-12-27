<?php

$server = new swoole_websocket_server('192.168.91.128',9502);

//设定人员的信息表
$file = __DIR__.'/member.txt';

//进入
$server -> on('open',function(swoole_websocket_server $server,$request){
    global $file;
    //判断以前是否有用户
    if(file_exists($file)){
       $member = file_get_contents($file);
       if($member){
           $member = json_decode($member,true);
       }else{
           $member = [] ;
       }
    }else{
        $member = [];
    }
    //储存用户的标识
    $member[$request -> fd] = $request -> fd;
    file_put_contents($file,json_encode($member));
    //给用户起随机名
    $server ->nickname = '聊天群员'.$request -> fd;
    $msg['type'] = 'enter';
    $msg['msg'] = $server->nickname.'进入聊天室';
    broadcast( $server,json_encode($msg) );
});

//向所有人广播
$server -> on('message',function(swoole_websocket_server $server,$frame){
    $msg['type'] = 'message';
    $msg['msg'] = $server->nickname.'说：'.$frame-> data;
    broadcast($server,json_encode($msg));
});
//离开
$server -> on('close',function (swoole_websocket_server $server,$fd){
    global $file;
    $json = file_get_contents($file);
    $member = json_decode($json,true);
    unset($member[$fd]);
    $json = json_encode($member);
    file_put_contents($file,$json);
    $msg['type'] = 'close';
    $msg['msg'] = $server-> nickname.'离开了聊天室';
    broadcast($server,json_encode($msg));
});

function broadcast($server,$msg){
    global $file;
    //获取所有聊天室人员的信息
    $json = file_get_contents($file);
    $arr = json_decode($json,true);
    foreach($arr as $v){
        $server -> push($v,$msg);
    }
}
//开始
$server -> start();