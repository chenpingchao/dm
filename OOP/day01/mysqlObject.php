<?php
class Mysql{
    public $ip;  //数据库ip
    public $server_port;  //数据库端口
    public $username;  //用户名
    public $password;  //密码
    public $database;  //数据库名称
    public $charset;  //数据库的汉字编码
    public $connect;  //数据库的链接资源
    public $result;  //操作产生资源结果集
    //sql语句
    //构造方法
    public function __construct($ip='127.0.0.1',$server_port='3306',$username='root',$password='root',$database='yhshop',$charset='utf8'){
        //接受并对属性赋值
        $this->ip = $ip;
        $this->server_port = $server_port;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->charset = $charset;
        //链接数据库
        $this->MysqlContent();
    }
        //链接数据库
    public function MysqlContent(){
        $this->connect = mysql_connect($this->ip.':'.$this->server_port , $this->username, $this->password);
        mysql_select_db($this->database);
        mysql_set_charset($this->charset);
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
        mysql_close($this->connect);
    }
}