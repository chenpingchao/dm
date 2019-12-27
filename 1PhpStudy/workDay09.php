<?php
header("Content-Type:text/html;charset:utf-8;");
//一、举例说明正则表达式的匹配函数、替换函数、分割函数的应用
//匹配函数
/*//preg_match($pattern, $str,[&$array])
$str1 = "ak123 a123 aklwef afdsl akh1";
$regex = '/a\w+/';
preg_match($regex,$str1,$arr);
echo "<pre>";
print_r($arr);*/
/*//preg_match_all($pattern, $str,[&$array])
$str2 = "ak123 a123 aklwef afdsl akh1";
$regex2 = '/a\w+/';
preg_match_all($regex2,$str2,$arr2);
echo "<pre>";
print_r($arr2);*/
/*//array preg_grep ($pattern , $array [, $flags = 0 ] )
$arr3 = [212,3.123,'daa','12.23','12.3b',.32];
$regex3 = '/^(\d+)?\.\d+/';
$a = preg_grep($regex3,$arr3,PREG_GREP_INVERT);
echo"<pre>";
print_r($a);*/
//替换函数
/*//preg_replace($redex4,$replace,$str4
$str4 = "abc cde afg zhi aji";
$redex4 = array('/zhi/','/(a\w+)+/e');
$replace = array('AOE','ucfirst("\1")');
echo preg_replace($redex4,$replace,$str4 );
//mixed preg_filter ($pattern , $replace ,  $str , [$limit = -1])
$arr3 = ['abc' ,'cde' ,'afg' ,'zhi' ,'aji'];
echo"<pre>";
print_r( preg_filter('/a\w+/','5678',$arr3));
//preg_replace_callback($pattern , $replace ,  $str , [$limit = -1])
$str6 = "10个苹果,5个梨";
$regex6 = '/(\d{2})\w(\d{1})/';

function add($a){
    $a[1] = $a[1]+10   ;
    $a[2]= $a[2]+5;
    return $a[1].$a[2];
}
echo preg_replace_callback($regex6,"add",$str6);
*/
//分割函数
/*$str1 = "sajf ksalf kj klj lk 0";
$reg = '/ /';
echo"<pre>";
print_r(preg_split($reg,$str1));*/
//二、举例说明JS中regex.test(string)方法的使用

?>
<!doctype html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
<script>
    var str = "13276669800";
    var reg = /^1[35789]\d{9}$/;
    console.log(reg.test(str));
</script>
</html>
