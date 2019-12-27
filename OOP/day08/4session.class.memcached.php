<?php
//面向对象,将session信息写入数据库
class Session{
    public static $mem;
    public static $liftmtime;
    public static function start(Memcache $mem){
        self::$mem = $mem;
        //获取过期时间
        self::$liftmtime = ini_get('session.gc_maxlifetime');
        //存储方式设为自定义
        ini_set('session.save_handler','user');
        //注入生命周期函数
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
    //打开
    public static function open($sessionPath,$sessionName){
            return true;
    }
    //关闭
    public static function close(){
        return true;
    }
    //读
    public static function read($sessionId){
        return true;
    }
    //写
    public static function write($sessionId,$data){
        return true;
    }
    //销毁
    public static function destroy($sessionId){
        return true;
    }
    //过期时间
    public static function gc($filemtime){
        return true;
    }
}






