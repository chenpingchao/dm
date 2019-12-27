<?php
//session存入数据库中，面向对象
class Session{
    //存储数据库对象
    public static $pdo;
    //过期时间
    public static $lifetime;

    //静态方法，注入生命周期函数
    public static function start(PDO $pdo){
        //设置session为自定义
//        ini_set("session.serialize_handler",'use');
        self::$pdo = $pdo;
        self::$lifetime = ini_get("session.gc_maxlifetime");
        session_set_save_handler(
          [__CLASS__,"open"],
          [__CLASS__,"close"],
          [__CLASS__,"read"],
          [__CLASS__,"write"],
          [__CLASS__,"destroy"],
          [__CLASS__,"gc"]
        );
        session_start();
    }

    public static function open($sessionId,$sessionName){
        return true;
    }
    public static function close(){
        return true;
    }
    public static function read($sessionId){
        $data = '';
        //判断是否执行成功
        $stmt = self::$pdo -> prepare("select * from session where sid=? limit 1");
        if($stmt -> execute([$sessionId])){
           //判断是否查询到结果
            if($result = $stmt -> fetch(PDO::FETCH_ASSOC)){
                //判断session是否过期
                if($result["mtime"] + self::$lifetime >time() ){
                    $data = $result['data'];
                }
            }
        }
        return $data ;
    }
    public static function write($sessionId,$data){
        //查询数据库中是否有信息
        $stmt = self::$pdo -> prepare("select * from session where sid=? limit 1");
        //判断是否执行成功
        if($stmt -> execute([$sessionId])){
            //判断是否存在数据
            if($result = $stmt ->fetch(PDO::FETCH_ASSOC) ){
                //数据库存在数据  更改
                $time = time();
                $stmt = self::$pdo -> prepare("update session set data=?,mtime=$time where sid=? limit 1");
                $stmt -> execute([$data,$sessionId]);
            }else{
                //数据库不存在数据  添加
                $time = time();
                $stmt = self::$pdo -> prepare("insert into session(sid,data,mtime) values('$sessionId','$data',$time)");
                $stmt -> execute([$sessionId,$data]);
            }

        }
        return true;
    }
    public static function destroy($sessionId){
        $stmt = self::$pdo -> prepare("delete from session where sid=? limit 1");
        $stmt -> execute([$sessionId]);
        return true;
    }
    public static function gc($lifetime){
        //过期时间
        $time = time() - $lifetime;
        //垃圾回收
        $stmt = self::$pdo -> prepare("delete from session where mtime<? ");
        $stmt -> execute([$time]);
        return true;
    }
}