<?php
/*$var = 123;
$_var = 123;
$numberName = 1;
$ kljf = 123;*/

//字符串
/*/*$vargin = "1231231";
    //单引号型 只认识\\和\'两个转义字符  不能解析变量
        $stri1 = 'i\'m name is no \\  \$ $vargin';
        echo "$stri1";
        echo "<br>";
    //双引号  除\'不认识其他的转义字符都认识，能解析变量
        $stri2 = "i'm name is no \\ \$  \^ {$vargin}";
        echo "$stri2";
        echo "<br>";
    //hereDoc定界符 可以解析变量 转义字符都认识  除了\' \"
      $stri3 = <<<AAAAAAA
        123123123  \' \$ \% \&;
        $vargin;
    AAAAAAA;
    echo "$stri3";*/

//数据类型的转换
    //字符串型
/*var_dump((string)123123123);//数字转换
var_dump((string)true);//布尔值转换
var_dump((string)false);//布尔值转换
var_dump((string)[1,2,3,4,]);//数组转换
var_dump((string)null);//空字符串转换*/
    //转为布尔型
/*var_dump((bool)'');//空字符串‘’
var_dump((bool)"");//空字符串“”
var_dump((bool)0);//整型数字0
var_dump((bool)0.0);//浮点数字0.0
var_dump((bool)'0');//字符串0
var_dump((bool)'0.0');//字符串0.0
var_dump((bool)null);//空值null
var_dump((bool)[]);//没有成员的数组
echo "<hr>";
var_dump((bool)1823);//其他值*/

/*//转为整数或浮点数
var_dump((int)'123213');//全为数字整型
var_dump((float)'123.213');//全为数字浮点型
var_dump((float)'123.213e5');//包含E字母的浮点型
var_dump((int)'qweqw');//全为字母的整型
var_dump((int)true);//布尔true
var_dump((int)false);//布尔false
var_dump((int)null);//空值*/

/*//临时转换
$transform = 123123;
var_dump((bool)$transform);
echo "$transform";
echo "<hr>";
//永久转换
$transform = 123123;
settype($transform,"boolean");
var_dump($transform);*/

//变量相关的函数
//isset函数
/*$trans1;
$trans2 = null;
$trans3 = '';
$trans4 = '23';
var_dump(isset($trans0));
var_dump(isset($trans1));
var_dump(isset($trans2));
var_dump(isset($trans3));
var_dump(isset($trans4));*/

//is_null函数
/*
$trans1;
$trans2 = null;
var_dump(is_null($trans0));
var_dump(is_null($trans1));
var_dump(is_null($trans2));*/


//empty函数  变量不存在、变量存在但是没有赋值、
/*//变量的值为null、''、""、0、"0"、false、array()都将被认为是空的返回true
$trans1;                   echo "<br>";
$trans2 = null;            echo "<br>";
$trans3 = '';              echo "<br>";
$trans4 = "";              echo "<br>";
$trans5 = 0 ;              echo "<br>";
$trans6 = 0.0 ;            echo "<br>";
$trans7 = '0' ;            echo "<br>";
$trans8 = '0.0' ;          echo "<br>";
$trans9 = false ;          echo "<br>";
$trans10 = array() ;       echo "<br>";
$trans11 = '12.wroawafioj'; echo "<br>";
var_dump(empty($trans0));   echo "<br>";
var_dump(empty($trans1));   echo "<br>";
var_dump(empty($trans2));   echo "<br>";
var_dump(empty($trans3));   echo "<br>";
var_dump(empty($trans4));   echo "<br>";
var_dump(empty($trans5));   echo "<br>";
var_dump(empty($trans6));   echo "<br>";
var_dump(empty($trans7));   echo "<br>";
var_dump(empty($trans8));   echo "<br>";
var_dump(empty($trans9));   echo "<br>";
var_dump(empty($trans10));  echo "<br>";
var_dump(empty($trans11));*/

/*//可变变量
$a = 'nihao';
$$a = '天气真热';
echo $nihao;*/

/*//引用变量
$a = 50;
$b = 100;
echo $a;
echo $b;
echo "<hr>";
$b =&$a;
echo $a;
echo $b;
echo "<hr>";
$b = 1000;
echo $a;
echo $b;*/

//全局变量和局部变量的作用域
/*function text(){
    $a = 100;
    $a++;
    echo $a;
}
text();echo "<br>";
text();echo "<br>";
echo $a;*/

//静态变量static的作用域
/*function te(){
    static $a = 0;
    $a++;
    echo $a;
}
echo $a;
te();  echo "<br>";
te(); echo "<br>";
te();echo "<br>";
te();  echo "<br>";*/


//定义一个常量
define("CHANGLIANG",123123);
$aaa = 4538845;
$bbb;
function text(){
    global $aaa;
    global $bbb;
    $bbb = $aaa + CHANGLIANG;
}
text();
var_dump($bbb);
var_dump( $aaa);
echo CHANGLIANG;
