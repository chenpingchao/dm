<?php
//面向过程
//打开
function open($sessionPath ,$sessionName){
    global $sessionPath ;
    $sessionPath = '\\\10.50.0.160\session';
    if(file_exists($sessionPath)){
        return true;
    }else{
        return false;
    }
}
//关闭
function close(){
    return true;
}
//读
function read($sessionId){
    global $sessionPath;
    $sessionFile = $sessionPath . '\\sess_'.$sessionId;
    if(file_exists($sessionFile)){
        $data = file_get_contents($sessionFile);
        return $data?$data:'';
    }else{
        return '';
    }
}
//写
function write($sessionId,$data){
    global $sessionPath;
    $sessionFile = $sessionPath.'\\sess_'.$sessionId;

    file_put_contents($sessionFile,$data);
    return true;
}
//销毁
function destroy($sessionId){
    global $sessionPath;
    $sessionFile = $sessionPath.'\\sess_'.$sessionId;
    if(file_exists($sessionFile)){
        unlink($sessionFile);
    }
    return true;
}
//过期时间
function gc($filemtime){
    global $sessionPath;
    foreach (glob($sessionPath.'\\sess_*') as $v){
        if(filemtime($v)+$filemtime < time() ){
            unlink($v);
        }
    }
    return true;
}

//存储方式设为自定义
ini_set('session.save_handler','user');
//注入生命周期函数
session_set_save_handler('open','close','read','write','destroy','gc');
//开启session
session_start();


