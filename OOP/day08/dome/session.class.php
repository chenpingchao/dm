<?php
//面向对象,将session信息写入数据库
class Session{
    public static $pdo;
    public static $liftmtime;
    public static function start(PDO $pdo){
        self::$pdo = $pdo;
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
       $stmt = self::$pdo -> prepare("select data from session where sid=?");
       $stmt -> execute([$sessionId]);
       if($rel = $stmt->fetch(PDO::FETCH_ASSOC) ){
           return $rel['data'];
       }else{
           return '';
       }
    }
    //写
    public static function write($sessionId,$data){
        $stmt = self::$pdo -> prepare("select * from session where sid=?");
        $stmt -> execute([$sessionId]);
        //判断数据库中是否有改session的信息
        if($rel =$stmt -> fetch(PDO::FETCH_ASSOC)){
            //如果有
            $stmt = self::$pdo-> prepare('update session set data=? where sid=? ');
            $stmt -> execute([$data,$sessionId]);
        }else{
            //如果没有
            $stmt = self::$pdo -> prepare("insert into session(sid,mtime,data) values (?,?,?)");
            $stmt -> execute([$sessionId,time(),$data]);
        }
        return true;
    }
    //销毁
    public static function destroy($sessionId){
        $stmt = self::$pdo -> prepare("delete from session where sid = ?");
        $stmt -> execute([$sessionId]);
        return true;
    }
    //过期时间
    public static function gc($filemtime){
        $time = time() - $filemtime;
        $stmt = self::$pdo -> prepare("delete from session where mtime<?");
        $stmt -> execute([$time]);
        return true;
    }
}






