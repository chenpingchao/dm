<?php


//面向对象
class Session{
    public static $sessionPath;
    public static function start($sessionPath = '\\\127.0.0.1\session'){
        self::$sessionPath = $sessionPath;
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
        if(file_exists(self::$sessionPath)){
            return true;
        }else{
            return false;
        }
    }
    //关闭
    public static function close(){
        return true;
    }
    //读
    public static function read($sessionId){
        $sessionFile = self::$sessionPath . '\\sess_'.$sessionId;
        if(file_exists($sessionFile)){
            $data = file_get_contents($sessionFile);
            return $data?$data:'';
        }
    }
    //写
    public static function write($sessionId,$data){
        $sessionFile = self::$sessionPath . '\\sess_'.$sessionId;
        file_put_contents($sessionFile,$data);
        return true;
    }
    //销毁
    public static function destroy($sessionId){
        $sessionFile = self::$sessionPath . '\\sess_'.$sessionId;
        if(file_exists($sessionFile)){
//            echo $sessionFile;
            unlink($sessionFile);
        }
        return true;
    }
    //过期时间
    public static function gc($filemtime){
        foreach (glob(self::$sessionPath.'\\sess_*') as $v){
            if(filemtime($v)+$filemtime < time() ){
                unlink($v);
            }else{
                echo '没过期';
            }
        }

        return true;
    }
}


/*$new = new Session();
var_dump($new);

Session::start();

$_SESSION['name'] = "kfdalkjfdlkj";*/

