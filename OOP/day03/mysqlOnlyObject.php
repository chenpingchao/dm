<?php
class MySQL{
//定义常规属性
    public static $ip;  //数据库ip
    public static $server_port;  //数据库端口
    public static $username;  //用户名
    public static $password;  //密码
    public static $database;  //数据库名称
    public static $charset;  //数据库的汉字编码
    public static $connect;  //数据库的链接资源
    public static $result;  //操作产生资源结果集

//单例模式开始
    //定义一个静态属性用来存放对象
    private static $sql;
    //克隆魔术常量设为私有,防止克隆
    private function __clone(){}
   //构造构造方法设为私有
    private function __construct($ip,$server_port,$username,$password,$database,$charset){
        //接受并对属性赋值
        self::$ip = $ip;
        self::$server_port = $server_port;
        self::$username = $username;
        self::$password = $password;
        self::$database = $database;
        self::$charset = $charset;
        //链接数据库
        self::MysqlContent();
    }
    //设置静态方法
    public static function mysql($ip='127.0.0.1',$server_port='3306',$username='root',$password='root',$database='zhengke',$charset='utf8'){
        if(!self::$sql){
            self::$sql = new self($ip,$server_port,$username,$password,$database,$charset);
        }
        return self::$sql;
    }


//单例模式结束

    //链接数据库
    private static function MysqlContent(){
        self::$connect = mysql_connect(self::$ip.':'.self::$server_port ,self::$username, self::$password );
        mysql_select_db(self::$database);
        mysql_set_charset(self::$charset);
    }

    //添加语句
    public function insert($sql)
    {
        if (mysql_query($sql)) {
            return mysql_insert_id();
        } else {
            return false;
        }
    }

    //删除语句
    public function delete($sql)
    {
        if (mysql_query($sql)) {
            $num = mysql_affected_rows();
            return $num;
        } else {
            return false;
        }
    }

    //更新语句
    public function update($sql)
    {
        if (mysql_query($sql)) {
            $num = mysql_affected_rows();
            return $num;
        } else {
            return false;
        }
    }

   //单条查询语句   要查询的字段，表，where条件，group分组，having，排序，条数
   /* public function oneSelect($sle,$table,$cond,$limit='',$order='',$group='',$having='')
    {
//        $sle = join(',',$sle);
//        $table = join(',',$table);
        $cond = empty($cond)?"":"where $cond";
        $limit = empty($limit)?"":"limit $limit";
        $having = empty($having)?"":"having $having";
        $order = empty($order)?"":"order by $order";
        $group = empty($group)?"":"order by $group";

        $sql = "select $sle from $table $cond $group $having $order $limit";
        $resoult = mysql_query($sql);
        if ($resoult && mysql_num_rows($resoult) > 0) {
            $arr = mysql_fetch_assoc($resoult);
            return $arr;
        } else {
            return false;
        }
    }*/
    //单条查询语句   要查询的字段，表，where条件，group分组，having，排序，条数
    public function oneSelect($sql)
    {
        $resoult = mysql_query($sql);
        if ($resoult && mysql_num_rows($resoult) > 0) {
            $arr = mysql_fetch_assoc($resoult);
            return $arr;
        } else {
            return false;
        }
    }
    //多条查询语句
    public function moreSelect($sql){
        $resoult = mysql_query($sql);
        if ($resoult && mysql_num_rows($resoult) > 0) {
            while ($rows = mysql_fetch_assoc($resoult)) {
                $arr[] = $rows;
            }
            return $arr;
        } else {
            return false;
        }

    }

    //析构方法
    function __destruct()
    {
        //断开数据库的链接
        mysql_close(self::$connect);
    }
}
$sql = Mysql::mysql();
echo "<pre>";
//var_dump($sql);
var_dump($sql->oneSelect("select * from zk_member where id=1"));
