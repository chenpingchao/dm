<?php

//面向对象，session存在共享文件夹中
class Session{
    //设置共享文件夹路径
    public static $sessionPath ;
    //注入六大生命周期函数
    public static function start($file_path = '\\\10.50.0.160\session'){
        //共享文件夹
        self::$sessionPath = $file_path;
        //注入六个生命周期函数
        session_set_save_handler(
            [__CLASS__,'open'],
            [__CLASS__,'close'],
            [__CLASS__,'read'],
            [__CLASS__,'write'],
            [__CLASS__,'destroy'],
            [__CLASS__,'gc']
        );
        //开启session
        session_start();
    }
    public static function open($sessionPath,$sessionName){
        if(file_exists($sessionPath)){
            return true;
        }else{
            return false;
        }
    }
    public static function close(){
        return true;
    }
    public static function read($sessionId){
        //拼接文件的地址
        $file = self::$sessionPath.'\\'.$sessionId;
        //判断文件是否存在
        if(file_exists($file)){
            $data = file_get_contents($file);
            return $data?$data:'';
        }else{
            return '';
        }
    }
    public static function write($sessionId,$data){
        //拼接文件的地址
        $file = self::$sessionPath.'\\'.$sessionId;
        file_put_contents($file,$data);
        return true;
    }
    //销毁
    public static function destroy($sessionId){
        //拼接文件的地址
        $file = self::$sessionPath.'\\'.$sessionId;
        if(file_exists($file)){
            unlink($file);
        }
        return true;
    }
    //垃圾回收
    public static function gc($sessionId,$lifetime){
        //判断文件是否过期
        foreach(glob(self::$sessionPath."\\*") as $v){
            if(filemtime($v)+$lifetime < time()){
                self::destroy($sessionId);
            }
        }
    }
}