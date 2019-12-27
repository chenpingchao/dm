<?php
header("Content-Type:text/html;charset=utf-8");

require_once "mysqlObject.php";

//创建一个新的对象
$sql1 = new Mysql();
echo "<pre>";
//var_dump($sql1);
print_r($sql1->oneSelect("select * from goods where id=3 limit 1"));
//print_r($sql1->oneSelect('*','goods','id=1'));

/*//类的声明
class Moblie{
    //类的属性
    public $username = '张三';
    public $home = '中国';
    public $time = '三';
    //构造方法
    public function __construct($username,$home,$time){
        $this->username = $username;
        $this->home = $home;
        $this->time = $time;
        echo $this->username.'已生成';
        echo "<br>";
    }

    //类的方法
    public function message(){
        echo "这个手机号用户为".$this->username."，归属地为".$this->username.",使用时间".$this->time;
    }

    //析构方法
    public function __destruct()
    {
        echo $this->username."被注销";
        echo "<br>";
    }
}
//生成对象
echo "<br>";
$moblie1 = new Moblie('李四','河南','5个月');
unset($moblie1);
$moblie2 = new Moblie('王五','河南','5个月');*/
////调用对象中的属性
//echo "<br>";
//echo $moblie1->username;
//echo $moblie1->home;
//echo "<br>";
////调用对象中的方法
//echo $moblie1->message();

