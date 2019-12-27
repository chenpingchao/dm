<?php
echo "<pre>";

//一、举例说明final方法和final类的特点
/*//使用final关键字标识的类不能被继承,即不可能有子类
final class preson{
    public final function say(){
        echo "这是父类";
    }
}
class son extends preson {
//使用final关键字标识的方法不能被子类覆盖（重写）；
    public function say(){
        echo "子类";
    }
}*/
//二、举例说明静态属性和静态方法的特点
/*
class boy{
    //常量
    const GRILFRIEND = '空';
    //静态属性
    public static $sex='男';
    //静态方法
    public static function message(){
        //静态方法内只能使用静态属性和常量
        echo "我是".self::$sex."的，女朋友为".self::GRILFRIEND."<br>";
    }
}
//静态属性可以通过类来访问
 echo boy::$sex;
//静态方法也可以通过类来访问
 boy::message();
 //静态属性时共享的
$boy1 = new boy();
$boy2 = new boy();
$boy3 = new boy();*/

//三、举例说明const关键字的作用

/*class aa{
    //声明常量
    const SAY = 'nb';
    public function speak(){
        //在类内部引用常量
        echo "你经常说".self::SAY."<br>";
    }
}
//在类外部引用常量
 echo aa::SAY;
$a  = new aa();
$a->speak();*/

//四、举例说明clone关键字以及__clone()魔术方法的作用

/*class member {
    public $username = "zs";
    public $password = "123123";
    public $moliber = "131111111";

    //__clone魔术常量当clone执行时自动调用
    public function __clone(){
        echo "<br>完成克隆,目标克隆成功<br>";
    }
}
$one = new member();
//clone可以克隆出一摸一样的对像
$two = clone $one;
echo "<pre>";
var_dump($one);
var_dump($two);*/
//五、举例说明instanceof关键字的作用

/*class a{
    public $name = 'zs';
}
class b extends a {
    public $age = 10;
}
class c{
    public $name = 'ls';
}
$a = new a;
$b = new b;
$c = new c;
//instanceof 检测当前对象是否属于某一类
var_dump($a instanceof a );echo '<br>';
var_dump($b instanceof a );echo '<br>';
var_dump($c instanceof a );echo '<br>';
*/

//六、举例说明__toString魔术方法的作用

/*class a{
    public $name = 'nb';
    //将对象转为字符串时自动调用此魔术方法
    public function __toString()
    {
        return '傻X你在打印对象';
    }
}
$a =new a();
echo "<pre>";
echo $a."<br>";
print_r($a);echo '<br>';
var_dump($a);echo '<br>';*/

//七、举例说明__call魔术方法的作用

/*class a{
    protected function aa(){
        echo "aa";
    }
    //调用不存在或者不可见的方法时自动调用
    public function __call($name,$age){
        echo "你调用的方法不可见，你需要氪金才行<br>";
    }
}
$a = new a();
$a->aa($name,$age);
$a->bb($name,$age);*/

//八、举例说明__sleep() ,wakeup()魔术方法的作用

/*class a{
    public $message = "脸滚键盘";

    //执行串行化自动调用
    public function __sleep(){
        echo "开始执行串行化<br>";
        return ['message'];
    }
    //执行反串行化
    public function __wakeup(){
        echo "反串行化,更改值<br>";
        $this->message = "erfweqrywertyujey";
    }
}
$a = new a ;
$a = serialize($a);
echo $a."<br>";
$a = unserialize($a);
var_dump($a);*/

//九、举例说明__autoload()自动加载方法的使用

function __autoload($name){
    include_once $name.'.class.php';
}
$a = new a();
var_dump($a);
$b = new b();
var_dump($b);

//十、单例模式

/*class onlyOne{
    private static $object;
    //__construct 设为私有，这个类不能创建对象
    private function __construct(){}
    //__clone 设为私有，产生的对象不能克隆
    private function __clone(){}
    //设置公共的方法
    public static function NewObject(){
        if(!self::$object){
            self::$object = new self;
        }
        return self::$object;
    }
}
$a = onlyOne::NewObject();
$b = onlyOne::NewObject();
var_dump($a);
var_dump($b);*/

//十一、工厂模式
/*
class a{
    public $message = "这是A类";
}
class b{
    public $message = "这是B类";
}
class c{
    public $message = "这是C类";
}
//工厂类
class GC{
    public static function NewObject($classname){
        $object = new $classname();
        return $object;
    }
}
$a = GC::NewObject('b');
$b = GC::NewObject('c');
var_dump($a);
var_dump($b);*/
