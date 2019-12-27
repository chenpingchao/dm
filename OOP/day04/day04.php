<?php

//命名空间时要将命名空间的代码写在所有代码的最前面
//命名空间时要写空间名称，上下级空间用\链接
namespace php\class2;
class a{
    public function say(){
        echo "风雨中爆肝";
    }
}

function d(){
    echo "这是一个函数d";
}

const AB = '这是一个常量';
const AC = '这是又一个常量';


/*//非限定名称是当前空间的类，函数，方法
$a = new a();
$a->say();echo "<br>";

//限定名称 只能是当前空间的下级空间中的类，函数，方法 才能用
$b = new aaa\b();
$b->say();echo "<br>";*/

//完全限定名称 是其他空间中的类，函数，方法或者动态函数，动态常量使用的方法
//其他空间
//$c = new \php\class1\c();
//$c->say();echo "<br>";

//完全限定名称 动态函数，动态常量使用的方法
//动态函数
/*$act = '\php\class2\d';
$act();echo "<br>";*/

//动态常量
/*$consts = '\php\class2\AB';
$consts2 = '\php\class2\AC';
echo constant($consts)."<br>";
echo constant($consts2)."<br>";*/

//php\class2 的下级空间
namespace php\class2\aaa;
class b{
    public function say(){
        echo "你来打我呀";
    }
}
//其他空间
namespace php\class1 ;
use php\class2\aaa\b;   //导入php\class2\aaa\空间中的b类

$abc = new b();
$abc->say();


//给命名空间起别名
/*namespace it\php\web\class1;
use \it\php\web\class1 as nb;        //起别名
use \it\php\web\class1;              //起别名第二种方式
class aaa{
    public function aaa(){
        echo "绰号大聪明";
    }
}
class bbb{
    public function aaa(){
        echo "秀与不秀皆在一念之间";
    }
}

$aaa = new nb\aaa();
$aaa ->aaa();
echo "<br>";
$bbb = new class1\bbb();
$bbb->aaa();*/


