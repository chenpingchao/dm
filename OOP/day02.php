<?php
header('Content-Type:text/html;charset=utf-8');
//Public：公共属性，可以在内部，子类和外部所引用；
//
//protected：受保护的属性 ，内部和子类可以引用，外部不能引用
//Private：私有的，只能在内部使用，子类和外部不能引用

class a{
    public $name = 'zs';
    protected $money = 100000;
    public $age = 30;
    public function say(){
        echo $this->name.'<br>';
        echo $this->money.'<br>';
        echo $this->age.'<br>';
    }
}
class b extends a{
    //子类的拓展和重写
    public $age = 40;
    public function say(){
        parent::say();
        echo $this->long = 170 .'<br>';
        echo $this->preson = 3 .'<br>';
    }
}
//b创建一个对象
$s = new b();

//子类访问
$s->say();

//a创建一个对象
$p = new a();
//内部访问
$p->say();
//外部访问



/*
//创建一个抽象类
abstract class ChouX{
    //创建一个抽象方法
    public abstract function message();
}
//创建一个子类
class child extends ChouX{
    //重写一个抽象方法
    public function message()
    {
        echo "我的个人信息不方便说<br>";
    }
}
//再创建一个子类
class child2 extends ChouX{
    //重写一个抽象方法
   public function message()
    {
        echo "个人信息是隐私<br>";
    }
    public function family();


}
//创建对象
$child = new child();
$child->message();
//创建第二个对象
$child2 = new child2();
$child2->message();*/

//抽象类
/*abstract class ChouX2{
    //抽象方法
    public abstract function family();
    //其他方法
    public function car(){
        echo "五菱神车";
    }
}*/

//trait 冲突的问题
/*trait a{
    public function message(){
        echo "个人信息是隐私<br>";
    }
}
trait b{
    public function message(){
        echo "我的个人信息不方便说<br>";
    }
}

class ab{
    use a,b{
        //解决方法
        a::message insteadof b;//设a的优先级高于b
        b::message as message2;//给B类中的message方法设置别名
    }
}
//创建一个对象
$AandB = new ab();
$AandB->message();
$AandB->message2();*/



/*//优先级的问题
trait a{
    public function message(){
        echo "个人信息是隐私<br>";
    }
}
//父类
class b{
    public function message(){
        echo "我不是我没有别瞎说<br>";
    }
}
//子类
class c extends b{
    //引用trait
    use a;
    //类
    public function message(){
        echo "武功再高，也怕菜刀<br>";
    }
}
//创建一个对象
$child = new c();
$child->message();*/

/*class a{
    public $name = '牛栏山二锅头';
    public static $price = 100;
}
class b extends a{
    const  M = 1213;
    public function aaa(){
       echo  self::M;

    }
}
echo "<pre>";
 a::$price = 100000;
echo a::$price;
echo   b::M.'<br>';

$aa = new a();
$aa::$price = 100000;
//复制对象
$aaa = clone $aa;

print_r($aaa);
echo "<br>";echo "<br>";echo "<br>";
print_r($aa);
echo $aa::$price."<br>";
//子类
$bb = new b();
echo $bb->name."<br>";
print_r($bb);

echo $bb->aaa()."<br>";
b:M;
echo M;*/